<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
      public function login_page(Request $request)
    {
          $email=$request->session()->get('email','default'); //dd($email);

        if($email != 'default') {
            return redirect()->route('DashboardPage');
        }
        
        return Inertia::render('Admin/User/Login');
    }


      public function login(Request $request)
    {
        // Retrieving the user by email
         $user = User::where('email', $request->input('email'))->first();

        // Checking if user exists and verify password
        if ($user && Hash::check($request->input('password'), $user->password)) {

            // Regenerate session for security
            $request->session()->regenerate();
            
            $email=$request->input('email');
            $request->session()->put('email',$email);
            $request->session()->put('user_id',$user->id);
            $request->session()->put('name',$user->name);
            $request->session()->put('role',$user->role);

            session()->flash('message', 'Login Successful');
            session()->flash('status', true);
            session()->flash('error', '');

            // return redirect()->route('DashboardPage');
            return redirect()->route('/');
        }

        // Login failed
        return back()->with([
            'message' => 'Login Failed',
            'status' => false,
            'error' => 'Invalid email or password'
        ]);

    }    

    public function logOut(Request $request){
 
        $request->session()->invalidate();
        $request->session()->regenerateToken(); 
        return redirect()->route('login_page');

    }    
    }
 
