<?php
use Laravel\Jetstream\Features;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class, 'index']);
Route::get('/product/creates',[UserController::class,'create']);
Route::post('/product/store',[UserController::class,'store']);
Route::delete('/product/{id}/destroy', [UserController::class, 'destroy'])->name('ravi.destroy');



Route::delete('/product/{id}/destroy', [UserController::class, 'destroy'])->name('ravi.destroy');


Auth::routes();

Route::get('/home', [Controller::class, 'index1'])->name('home');




