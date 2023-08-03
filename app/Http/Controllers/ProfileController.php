<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


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
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ], [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'username.required' => 'The username field is required.',
            'username.string' => 'The username must be a string.',
            'username.max' => 'The username may not be greater than :max characters.',
            'username.unique' => 'The username has already been taken.',
        ]);

        $user->update($validatedData);

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
    public function store(Request $request){

    }
}
