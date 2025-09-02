<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\DashboardController;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Redirect root → login page
Route::get('/', function () {
    return redirect()->route('login');
});

// Authenticated and Verified Routes
Route::middleware(['auth', 'verified'])->group(function () {

    // AdminLTE Dashboard (with users, roles, permissions)
    Route::get('/dashboard', function () {
        $users = User::all();
        $roles = Role::all();
        $permissions = Permission::all();

        return view('adminlte.dashboard', compact('users', 'roles', 'permissions'));
    })->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD resources
    Route::resource('notes', NoteController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('users', UserController::class);
});

/*
|--------------------------------------------------------------------------
| Role-Based Dashboards
|--------------------------------------------------------------------------
*/

// Admin-only
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard'); // Create resources/views/admin/dashboard.blade.php
    })->name('admin.dashboard');
});

// Editor-only
Route::middleware(['auth', 'role:editor'])->group(function () {
    Route::get('/editor', function () {
        return view('editor.dashboard'); // Create resources/views/editor/dashboard.blade.php
    })->name('editor.dashboard');
});

require __DIR__ . '/auth.php';
