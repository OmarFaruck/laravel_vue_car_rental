<?php

namespace App\Http\Controllers\Fontend;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FontendController extends Controller
{
       public function home()
    {
        return Inertia::render("Fontend/Home");
    }
}
