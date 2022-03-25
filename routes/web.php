<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\ContactController;
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
    return view('welcome');
});

Auth::routes();

Route::post('searchResult', [ContactController::class, 'searchResult'])->name('contacts.search');
Route::post('searchResult', [ResidentController::class, 'searchResult'])->name('residents.search');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('residents', ResidentController::class)->names("residents");
Route::resource('contacts', ContactController::class)->names("contacts");

