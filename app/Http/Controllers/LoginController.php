<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'g-recaptcha-response' => 'required|recaptcha'
        ]);

        if ($validator->fails()) {
            return redirect('/login')->with([
                'loginError' => 'Pastikan anda memilih Recaptcha',
            ]);
        }

        $loginField = $request->input('email');
        $password = $request->input('password');


        if (filter_var($loginField, FILTER_VALIDATE_EMAIL)) {
            $user = User::where('email', $loginField)->first();
        } else {
            $user = User::where('username', $loginField)->first();
        }
        if ($user) {
            if ($user->password === null) {
                Auth::login($user);
            } elseif (Hash::check($password, $user->password)) {
                Auth::login($user);
            }
            $user->update(['last_login' => date('Y-m-d H:i:s')]);
        }

        if (Auth::check()) {
            if (auth()->user()->ban === "ban") {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/login')->with([
                    'loginError' => 'Akun anda diban! Hubungi admin!'
                ]);
            }

            if (auth()->user()->unit !== null) {
                //Login Berhasil 

                $userData = [
                    'user_id' => auth()->user()->id,
                    'username' => auth()->user()->username,
                    // Add other user data as needed
                ];

                $request->session()->put('data', $userData);
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
