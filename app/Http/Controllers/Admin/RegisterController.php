<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    
    public function register_page(Request $request)
    {
          $email=$request->session()->get('email','default'); //dd($email);

        if($email != 'default') {
            return redirect()->route('DashboardPage');
        }

        return Inertia::render('Admin/User/Register');
    }
   
   function registration(Request $request){
            try {
                        $email=$request->input('email');
                        $name=$request->input('name');
                        $role='user';
                        $password=$request->input('password');

                        User::create([
                            'name'=>$name,
                            'email'=>$email,
                            'role'=>$role,
                            'password'=>Hash::make($password)
                        ]);

                        session()->flash('message', 'Registration Successful');
                        session()->flash('status', true);
                        session()->flash('error', '');

                        // return  redirect()->route('/');
                        return  redirect()->route('registerPage');
                    }
                    catch (\Exception $e) {
                        session()->flash('message', 'Registration Fail');
                        session()->flash('status', false);
                        session()->flash('error', $e->getMessage());
                    }

            }

    } 
 