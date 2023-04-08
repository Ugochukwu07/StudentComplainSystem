<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;

Route::middleware(['guest'])->group(function () {
    Route::controller(AuthController::class)->group(function () {;
        Route::get('/register', 'register')->name('register');
        Route::post('/register/save', 'registerSave')->name('register.save');

        Route::get('/login', 'login')->name('login');
        Route::post('/login/save', 'loginSave')->name('login.save');
    });
    Route::controller(ForgotPasswordController::class)->prefix('forget')->name('forget.')->group(function(){
        Route::get('password', 'password')->name('password');
        Route::post('password', 'passwordSave')->name('password.save');
        Route::get('reset/{token}', 'reset')->name('password.reset');
        Route::post('reset-password', 'resetSave')->name('password.reset.save');

    });

});

Route::middleware('auth')->group(function(){
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});


