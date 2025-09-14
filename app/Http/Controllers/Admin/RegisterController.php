<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    
    public function register_page()
    {
        return Inertia::render('Admin/User/Register');
    }
   
   function registration(Request $request){

        try {
           
            $name=$request->input('name');
             $email=$request->input('email');
            // $role='user';
            $password=$request->input('password');
            $confirm_password=$request->input('confirm_password');

            User::create([
                'name'=>$name,
                'email'=>$email,
                // 'role'=>$role,
                'password'=>Hash::make($password),
                'confirm_password'=>Hash::make($confirm_password)
            ]);

            session()->flash('message', 'Registration Successful');
            session()->flash('status', true);
            session()->flash('error', '');

            return  redirect()->route('register_page');
        }
        catch (\Exception $e) {
            session()->flash('message', 'Registration Fail');
            session()->flash('status', false);
            session()->flash('error', $e->getMessage());
        }

    } 
}
