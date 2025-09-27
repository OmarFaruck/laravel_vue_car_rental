<?php

namespace App\Http\Controllers\Fontend;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;

class FontendController extends Controller
{
       public function home()
    {
        return Inertia::render("Fontend/Home");
    }
}
