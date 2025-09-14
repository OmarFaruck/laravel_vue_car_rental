<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
      public function login_page()
    {
        return Inertia::render('Admin/User/Login');
    }
}
