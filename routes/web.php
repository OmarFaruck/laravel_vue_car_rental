<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Fontend\FontendController;

 
Route::get('/', [FontendController::class, 'home'])->name('home');
Route::get('/Admin/User/register_page', [RegisterController::class, 'register_page'])->name('registerPage');
Route::post('/Admin/User/register_page', [RegisterController::class, 'registration'])->name('user.register');
Route::get('/Admin/User/login_page', [LoginController::class, 'login_page'])->name('login_page');
Route::get('/Admin/User/login_page', [LoginController::class, 'login'])->name('user.loginPage');
Route::get('/Admin/User/logOut', [LoginController::class, 'logOut'])->name('user.log_out');

//  Route::middleware(SessionAuthenticate::class)->group(callback: function () {

// });
 




// Route::get('/', function () {
 
//     return Inertia::render('Welcome');
// })->name('home');

// Route::get('dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
