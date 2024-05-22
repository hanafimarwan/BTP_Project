<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usersController;
use Illuminate\Http\Request;


$request=Request();
$userName = $request->cookie('name');

if($userName==null){
    Route::get('/',[usersController::class,'login'])->name('homes');
    Route::get('/singup',[usersController::class,'singup'])->name('singup');
    Route::post('/signup', [usersController::class, 'store'])->name('signup.post');
    Route::post('/', [usersController::class, 'log'])->name('usrer.login');
}else{
    Route::get('/',[usersController::class,'homes'])->name('homes');
    Route::post('/', [usersController::class, 'com'])->name('usrer.comment');
    Route::get('/logout', [usersController::class, 'logout'])->name('usrer.logout');
}