<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{

    //Login Page
    public function loginpage(){

        return view('/auth');
    }


    //Login logic
    public function login(Request $request){

        $credentials = $request->only(['username', 'password']);
        if(Auth::attempt($credentials)){

           return redirect('/home');
        }

        return redirect('/');
        
    }

    //Logout Page
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/auth');
    }

    //register view
    public function registerpage(){
        return view('/Register');
    }

    //register logic
    public function register(Request $request){
        $registerakun = User::create([
            'name'=>$request->name,
            'email' =>$request->email,
            'username' =>$request->username, 
            'password'=>Hash::make($request->password)
            
        ]);

        return redirect('/auth');

    }

}
