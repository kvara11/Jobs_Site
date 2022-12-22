<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'name'=> ['required', 'max:255'],
            'email'=>['required', 'max:255', 'email', Rule::unique('users', 'email')],
            'password'=>'required|confirmed|min:6|max:255'
        ]);

        //hash password
        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        //login with auth
        auth()->login($user);

        return redirect('/')->with('message', 'User created and Logged In');
    }

    //log out
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'User logged out!');
    }

    public function login(){
        return view('users.login');
    }

    public function authenicate(Request $request){
        $formFields = $request->validate([
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required','max:255']
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            
            return redirect('/')->with('message', 'User Logged In');
        }

        return back()->withErrors(['email'=>'Wrong Credentials'])->onlyInput('email');
    }
}
