<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name("homepage");



Route::middleware("is-logged-in")->group(function() {

    Route::post("/logout",[LoginController::class, "logout"])->name("logout");

   
    Route::middleware("is-user")->group(function() {

        Route::get("/vehiclemenu/create",[VehicleController::class, "showcreate"])->name('vehicle.create');
        Route::get("/vehiclemenu",[VehicleController::class, "index"])->name('vehicle.menu');
        Route::get("/vehiclemenu/{vehicle}", [VehicleController::class, "display"])->name('vehicle.show');
        Route::get("/vehiclemenu/{vehicle}/edit",[VehicleController::class,"edit"])->name('vehicle.edit');
        Route::delete("/vehiclemenu/{vehicle}",[VehicleController::class,"destroy"])->name('vehicle.delete');
        
                
    });

    Route::middleware("is-admin")->group(function() {

        Route::get("/dashboard",[AdminController::class, "dashboard"])->name('admin.dashboard');
        Route::get("/dashboard/{vehicle}/edit",[AdminController::class,"adminEdit"])->name('admin.edit');
        Route::delete("/dashboard/{vehicle}",[AdminController::class,"adminDestroy"])->name('admin.delete');
                
    });
  
});






Route::middleware("is-guest")->group(function() {

    Route::get("/loginform",[LoginController::class, "showlogin"])->name('auth.loginform');
    Route::get("/registrationform",[LoginController::class, "showregister"])->name('auth.registrationform');
    Route::get("/resetpassword",[LoginController::class, "showreset"])->name('auth.reset');
  
});

require __DIR__.'/auth.php';
