<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;


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

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'sometimes|string|min:5|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'username' => [
                'sometimes',
                'required',
                'string',
                'max:255',
            ],
        ], [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'username.required' => 'The username field is required.',
            'username.string' => 'The username must be a string.',
            'username.max' => 'The username may not be greater than :max characters.',
        ]);
        $validatedData['password'] =  Hash::make($validatedData['password']);
        $user->update($validatedData);

        return redirect()->route('profile')->with([
            'success' => 'Berhasil update data!'
        ]);
    }
    public function store(Request $request)
    {
    }
}
