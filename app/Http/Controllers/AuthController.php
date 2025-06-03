<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginFrom(){
        return view('auth.login');

    }

    public function login(Request $request)
{
    $credensial = $request ->validate(
        [
            'email' => 'required|email',
            'password'=> 'required|min:3',
        ]
     );
     if(Auth::attempt($credensial)){
        $request->session()->regenerate();
        return redirect('/')->with('success','Login Successfully','welcome'.Auth::user()->name);
     }

     return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');

}

public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login')->with('success', 'Berhasil logout!');
}



}
