<?php
use Illuminate\Support\Facades\Route;
//route cho admin
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;

Route::prefix('admin')->as('admin.')->group(function(){
    Route::get('login',[LoginController::class,'index'])
    ->middleware('admin.is.logined')
    ->name('login');
    
    Route::post('handle-login',[LoginController::class,'handle'])->name('handle.login');
    Route::post('logout',[LoginController::class,'logout'])->name('logout');
    
    
});

Route::prefix('admin')
->as('admin.')
->middleware('check.admin.login')
->group(function(){
    
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    //tat ca deu bi middleware check.admin.login chi phoi
    
});
