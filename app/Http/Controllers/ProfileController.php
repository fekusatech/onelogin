<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index', [
            'title' => 'Profile',
            'active' => 'Profile'
        ]);
    }
    public function update(Request $request)
    {
        $user = Auth::user();
        if (auth()->user()->password == null) {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'password' => 'sometimes|string|min:5|max:255',
                'email' => [
                    'sometimes',
                ],
                'username' => [
                    'sometimes',
                    'required',
                    'string',
                    'max:255',
                ],
            ], [
                'name.required' => 'The name field is required.',
                'email.email' => 'Please enter a valid email address.',
                'email.unique' => 'The email has already been taken.',
                'username.required' => 'The username field is required.',
                'username.string' => 'The username must be a string.',
                'username.max' => 'The username may not be greater than :max characters.',
            ]);
            $validatedData['password'] =  Hash::make($validatedData['password']);
        } else {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => [
                    'sometimes',
                ],
                'username' => [
                    'sometimes',
                    'required',
                    'string',
                    'max:255',
                ],
            ], [
                'name.required' => 'The name field is required.',
                'email.email' => 'Please enter a valid email address.',
                'email.unique' => 'The email has already been taken.',
                'username.required' => 'The username field is required.',
                'username.string' => 'The username must be a string.',
                'username.max' => 'The username may not be greater than :max characters.',
            ]);
        }
        $user->update($validatedData);

        return redirect()->route('profile')->with([
            'success' => 'Berhasil update data!'
        ]);
    }
    public function update_nohp(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'numberphone' => 'required|string|max:255',
            'otp' => 'required|string|min:4|max:4',
        ], [
            'numberphone.required' => 'No HP wajib diisi',
            'otp.required' => 'OTP wajib diisi',
        ]);
        $cekdata = DB::table('otp_verifications')->where([
            'user_id' => auth()->user()->id,
            'number' => $validatedData['numberphone'],
            'otp_code' => $validatedData['otp']
        ])->first();
        if (!$cekdata) {
            return redirect()->route('profile')->with([
                'error' => 'OTP anda salah silahkan coba lagi'
            ]);
        }
        DB::table('otp_verifications')
            ->where('id', $cekdata->id)
            ->update(['is_verified' => 2]);
        $user->update(['number' => $validatedData['numberphone']]);
        return redirect()->route('profile')->with([
            'success' => 'Berhasil update data!'
        ]);
    }
    public function store(Request $request)
    {
    }
}
