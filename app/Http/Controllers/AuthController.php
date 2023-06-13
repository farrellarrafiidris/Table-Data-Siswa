<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
*/
    public function login()
    {
        if(!Auth::check()) {
            return redirect('/');
        }else {
            return view('index');
        }

        return view('auth.login');
        
    }

    public function authenticate(Request $request) {
        $credential = $request->only('email', 'password');
        if (Auth::attempt($credential)) {
            return redirect('table');
        } else {
            return redirect('/')->with('arrow_message','wrong email or password');
        }
        
    }

    public function logout() {
        if(!Auth::check()) {
            return redirect('/')->with('arrow_message','You are already logout');
        }

        Session::flush();
        Auth::logout();

        return redirect('/');
    }

    public function register_form() {
        return view('auth.register')->with('arrow_message','Login Success');
    }

    public function register(Request $request) {

        $request->validate([
            
            'name'      => 'min:3',
            'email'     => 'email|unique:users',
            'password'  => 'min:4|confirmed',
            
        ]);

        User::create([
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'password'  => Hash::make($request->input('password'))
        ]);

        return redirect('/');
        
    }


}