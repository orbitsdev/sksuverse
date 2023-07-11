<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});




Route::get('/test', function () {
    return view('test');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');    

    // admin
    Route::prefix('admin')->name('admin.')->group(function(){
        Route::get('/', function () {return view('admin.index');})->name('index');
    });

    // instructor
    Route::prefix('instructor')->name('instructor.')->group(function(){
        Route::get('/', function () {return view('instructor.index');})->name('index');
    });
    
    // student
    Route::prefix('student')->name('student.')->group(function(){
        Route::get('/', function () {return view('student.index');})->name('index');
    });

});
