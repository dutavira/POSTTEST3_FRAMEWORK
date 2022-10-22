<?php

use App\Http\Controllers\AuthConntroller;
use App\Models\Minuman;
use Illuminate\Support\Facades\Route;
use App\Models\Makanan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home',
        ["makanans" => Makanan::all()], 
        ["minumen" => Minuman::all()]
    );
})->middleware(['auth']);

Route::get('/register', function(){
    return view('register');
})->name("register");

Route::post('/action-register',[
    AuthConntroller::class, 'actionRegister'
]);

Route::get('/login', [
    AuthConntroller::class, 'loginView'
])->name("login");

Route::post('/action-login', [
    AuthConntroller::class, 'actionLogin'
]);

Route::get('/logout', [
    AuthConntroller::class, 'logout'
]);
