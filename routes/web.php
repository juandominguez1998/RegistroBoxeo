<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoxeadoresController;
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
    return view('auth.login');
});

//uso de clases
/*
Route::get('/boxeadores', function () {
    return view('boxeadores.index');
});

Route::get('/boxeadores/create',[BoxeadoresController::class,'create']);
*/
Route::resource('boxeadores', BoxeadoresController::class)->middleware('auth');

Auth::routes(['register'=>false,'reset'=>false]);


Route::get('/home', [BoxeadoresController::class, 'index'])->name('home');


 Route::group(['middleware'=>'auth'], function () {
    Route::get('/', [ BoxeadoresController::class, 'index'])->name('home');
 });

 
