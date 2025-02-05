<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware('role:super admin')->name('dashboard');
    Route::resource('/user', App\Http\Controllers\UserController::class)->middleware('role:super admin')->except(['destroy']);    
    Route::post('/user/delete', [App\Http\Controllers\UserController::class,'delete'])->middleware('role:super admin')->name('user.delete');    


    // Route::get('/role-permission', [App\Http\Controllers\RolePermissionController::class, 'index'])->middleware('role:super admin')->name('role-permission.index');
    // Route::get('/role-permission/{id}', [App\Http\Controllers\RolePermissionController::class, 'edit'])->middleware('role:super admin')->name('role-permission.edit');
    // Route::get('/role-permission/role/{id}', [App\Http\Controllers\RolePermissionController::class, 'role_delete'])->middleware('role:super admin')->name('role-permission.role.delete');
    //  Route::post('/role-permission/store', [App\Http\Controllers\RolePermissionController::class, 'store'])->middleware('role:super admin')->name('role-permission.store');
    // Route::post('/role-permission/role/store', [App\Http\Controllers\RolePermissionController::class, 'storerole'])->middleware('role:super admin')->name('role-permission.role.store');
    // Route::post('/role-permission/permission/store', [App\Http\Controllers\RolePermissionController::class, 'storepermission'])->middleware('role:super admin')->name('role-permission.permission.store');

    
    Route::resource('/kategori', App\Http\Controllers\KategoriController::class)->middleware('role:super admin')->except(['destroy']);    
    Route::post('/kategori/delete', [App\Http\Controllers\KategoriController::class,'delete'])->middleware('role:super admin')->name('kategori.delete');    
    
    Route::resource('/menu', App\Http\Controllers\MenuController::class)->middleware('role:super admin')->except(['destroy','show']);    
    Route::post('/menu/delete', [App\Http\Controllers\MenuController::class,'delete'])->middleware('role:super admin')->name('menu.delete');    

    
});


// KASIR
Route::prefix('kasir')->middleware(['auth', 'verified','role:kasir'])->group(function () {
    Route::get('/order',App\Livewire\Order::class)->name('kasir.order');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
