<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // show register /create form
    public function create(){
        return view('users.register');
    }


        //create new user

    public function store(Request $request){
        $formFields = $request->validate([
            'name' => ['required','min:3'],
            'email' => ['required','email', Rule::unique('users'), ('email')],
            'password' => 'required|confirmed|min:6'

        ]);
                $formFields['password'] = bcrypt($formFields['password']);

                $user = User::create($formFields);

                //login
                auth()->login($user);
                return redirect('/')->with('message', 'User created and logged in');

        }

        public function logout(Request $request)  {
            auth()->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();
            
            return redirect('/')->with('message','you have logged out!');
             
        }  

        //show login form
        public function login(){
            return view('users.login');
        }

       //auth user
       public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required','email'],
            'password' => 'required'  
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in');
        }

        return back()->withErrors(['email' => 'invalid creditials'])->onlyInput('');
}
}
