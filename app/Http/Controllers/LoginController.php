<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        // kalo udh login, ga bs balik ke login
        if (Auth::check()) {
            return redirect()->intended('/menu');
        }
        return view('Authfolder.login');
    }

    public function signup_view()
    {
        return view('Authfolder.signup');
    }

    public function signup(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:20',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required'
        ]);

        $request->validate([
            'captcha' => 'required|captcha'
        ]);

        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email; // email harus unik
        $user->password = bcrypt($request->password);
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->role = 'user';
        $user->save();

        return redirect('/login')->with('success', 'Your account has been created!');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        $request->validate([
            'captcha' => 'required|captcha'
        ]);

        if (Auth::attempt($credentials)) {
            // regenerate biar ga kena session fixation
            $request->session()->regenerate();

            return redirect()->intended('/menu');
        }else{
            return back()->with('loginError', 'Invalid Email or Password');
        }
    }


    public function logout()
    {
        return route('login');
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }
}
