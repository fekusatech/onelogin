<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('login.register', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|max:255',
    //         'username' => ['required', 'min:3', 'max:255', 'unique:users'],
    //         'email' => 'required|email:dns|unique:users',
    //         'password' => 'required|min:5|max:255'
    //     ]);

    //     // $validatedData['password'] = bcrypt($validatedData['password']);
    //     $validatedData['password'] = Hash::make($validatedData['password']);

    //     User::create($validatedData);

    //     // $request->session()->flash('success', 'Registration successfull! Please login');

    //     return redirect('/login')->with('success', 'Registration successfull! Please login');
    // }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        // Memeriksa apakah username sudah digunakan sebelumnya
        $existingUser = User::where('username', $validatedData['username'])->exists();

        if ($existingUser) {
            return redirect('/register')->with('loginError', 'Username sudah digunakan. Silahkan login dengan username ini.');
        }

        // Jika username belum digunakan, lanjutkan dengan membuat pengguna baru
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Registration successful! Please login');
    }
}
