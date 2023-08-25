<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }
    public function authenticate(Request $request)
    {
        $loginField = $request->input('email'); // Input login field (bisa username atau email)
        $password = $request->input('password');

        // Cek apakah input adalah email
        if (filter_var($loginField, FILTER_VALIDATE_EMAIL)) {
            $user = User::where('email', $loginField)->first();
        } else {
            $user = User::where('username', $loginField)->first();
        }
        if ($user) {
            // Jika ada pengguna dengan username atau email yang sesuai
            if ($user->password === null) {
                // Jika password di database adalah null, izinkan login tanpa password
                Auth::login($user);
            } elseif (Hash::check($password, $user->password)) {
                // Jika password tidak null, verifikasi password
                Auth::login($user);
            }
            // Update kolom last_login
            $user->update(['last_login' => date('Y-m-d H:i:s')]);
        }

        if (Auth::check()) {
            // Pengguna berhasil login
            if (auth()->user()->ban === "ban") {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/login')->with([
                    'loginError' => 'Akun anda diban! Hubungi admin!'
                ]);
            }

            if (auth()->user()->unit !== null) {

                $request->session()->regenerate();
                return redirect()->intended('/portal');
            } else {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect('/login')->with([
                    'loginError' => 'Hubungi admin untuk menambahkan unit!'
                ]);
            }
        }

        return back()->with(
            'loginError',
            'Login failed!'
        );
    }


    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
