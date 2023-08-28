<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Unit;
use Illuminate\Support\Facades\Hash;
use App\Traits\RoleValidationTrait;

class ManageUserController extends Controller
{
    use RoleValidationTrait;

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
}
