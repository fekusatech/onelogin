<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Unit;
use Illuminate\Support\Facades\Hash;
use App\Traits\RoleValidationTrait;

class ManageUnitController extends Controller
{
    use RoleValidationTrait;

    public function index()
    {
        $userrole = auth()->user();
        if ($this->validateUserRole($userrole)) {
            $user = User::all();
            $unit = Unit::where('status', '1')->get();
            if (auth()->user()->role == 3) {
                $unit = Unit::where('status', '1')->where('id', auth()->user()->unit_control)->get();
            }
            if($unit->count() == 0){
                return redirect('/')->with([
                    'error' => 'Anda tidak punya control unit, Hubungi admin anda!'
                ]);
            }

            $user_role = DB::table('users_role')->where('status_role', '1')->get();
            return view('portal.managementunit', [
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
        if ($request->pk == "password") {
            $password = $request->value == NULL ? $request->value : Hash::make($request->value);
            User::where('id', $request->id)->update(['password' => $password]);
        }
    }
}
