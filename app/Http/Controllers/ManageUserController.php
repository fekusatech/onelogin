<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Unit;
use Illuminate\Support\Facades\Hash;

class ManageUserController extends Controller
{
    //
    public function index()
    {
        $user = User::all();
        $unit = Unit::where('status', '1')->get();
        $user_role = DB::table('users_role')->where('status_role', '1')->get();
        return view('portal.managementuser', [
            'title' => 'Management User',
            'active' => 'Profile',
            'userlist'  => $user,
            'unitlist' => $unit,
            'rolelist' => $user_role
        ]);
    }
    public function update(Request $request, $id)
    {
        if ($request->pk == "ban") {
            User::where('id', $request->id)
                ->update(['ban' => $request->value]);
        }
        if ($request->pk == "email") {
            User::where('id', $request->id)
                ->update(['email' => $request->value]);
        }
        if ($request->pk == "unit") {
            User::where('id', $request->id)
                ->update(['unit' => implode(",", $request->value)]);
        }
        if ($request->pk == "firstname") {
            User::where('id', $request->id)
                ->update(['name' => $request->value]);
        }
        if ($request->pk == "rolelist") {
            User::where('id', $request->id)
                ->update(['role' => $request->value]);
        }
        if ($request->pk == "password") {
            if ($request->value == NULL) {
                $password = $request->value;
            } else {
                $password = Hash::make($request->value);
            }
            User::where('id', $request->id)
                ->update(['password' => $password]);
        }
    }
}
