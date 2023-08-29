<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Unit;
use Illuminate\Support\Facades\Hash;
use App\Traits\RoleValidationTrait;
use App\Traits\SendWhatsapp;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class ManageUserController extends Controller
{
    use RoleValidationTrait;
    use SendWhatsapp;

    public function index()
    {
        $userrole = auth()->user();
        if ($this->validateUserRole($userrole)) {
            if (auth()->user()->role == 3 && auth()->user()->unit_control == NULL) {
                return redirect('/')->with([
                    'error' => 'Akun anda admin tapi tidak punya control unit, Hubungi Superadmin!'
                ]);
            }

            $user = User::all();
            $unit = Unit::where('status', '1')->get();
            if (auth()->user()->role == 3) {
                $user = User::whereRaw("FIND_IN_SET('" . auth()->user()->unit_control . "',unit)")->get();
            }
            $user_role = DB::table('users_role')->where('status_role', '1')->get();
            return view('portal.managementuser', [
                'title' => 'Management User',
                'active' => 'Profile',
                'userlist'  => $user,
                'unitlist' => $unit,
                'rolelist' => $user_role
            ]);
        } else {
            // Pengguna tidak memiliki peran yang sesuai
            return redirect('/')->with([
                'error' => 'Anda tidak memiliki izin untuk mengakses halaman ini.'
            ]);
        }
    }
    public function update(Request $request, $id)
    {
        if ($request->pk == "ban")
            User::where('id', $request->id)->update(['ban' => $request->value]);
        if ($request->pk == "email")
            User::where('id', $request->id)->update(['email' => $request->value]);
        if ($request->pk == "number")
            User::where('id', $request->id)->update(['number' => $request->value]);
        if ($request->pk == "unit")
            User::where('id', $request->id)->update(['unit' => implode(",", $request->value)]);
        if ($request->pk == "firstname")
            User::where('id', $request->id)->update(['name' => $request->value]);
        if ($request->pk == "rolelist")
            User::where('id', $request->id)->update(['role' => $request->value]);
        if ($request->pk == "unit_control")
            User::where('id', $request->id)->update(['unit_control' => $request->value]);

        if ($request->pk == "password") {
            $password = $request->value == NULL ? $request->value : Hash::make($request->value);
            User::where('id', $request->id)->update(['password' => $password]);
        }
    }
    public function requestotp(Request $request)
    {
        $datenow = Carbon::now();
        $customExpiresAt = Carbon::now()->addMinutes(1); // Token kedaluwarsa dalam 12 menit
        $token = strval(random_int(1000, 9999));
        if ($request->number == NULL || $request->number == "") {
            $responseJson = [
                "status" => false,
                "msg" => [
                    "number" => "Pastikan anda menginput nomor HP dengan benar" // Properti "number" tidak selalu ada
                ]
            ];
            return json_encode($responseJson);
        }
        if ($request->number == $request->oldnumber) {
            $responseJson = [
                "status" => false,
                "msg" => [
                    "number" => "Nomor yang anda gunakan sama dengan sebelumnya" // Properti "number" tidak selalu ada
                ]
            ];
            return json_encode($responseJson);
        }

        $cekdata = DB::table('otp_verifications')->where([
            'user_id' => $request->id,
            'number' => $request->number,
            'is_verified' => '0'
        ])->first();
        if ($cekdata) {
            if ($datenow->greaterThan($cekdata->expired_at)) {
                //Update verified ke 3 
                DB::table('otp_verifications')
                    ->where('id', $cekdata->id)
                    ->update(['is_verified' => 3]);

                DB::table('otp_verifications')->insert([
                    'user_id' => $request->id,
                    'number' => $request->number,
                    'otp_code' => $token,
                    'expired_at' => $customExpiresAt
                ]);
                return $this->sendotp($request->number, $token, "ubah");
            } else {
                return json_encode(['status' => false, 'msg' => $datenow->diffInSeconds($cekdata->expired_at)]);
            }
        }

        DB::table('otp_verifications')->insert([
            'user_id' => $request->id,
            'number' => $request->number,
            'otp_code' => $token,
            'expired_at' => $customExpiresAt
        ]);
        return $this->sendotp($request->number, $token, "ubah");
    }
}
