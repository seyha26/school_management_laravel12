<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'auth_login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/admin/admin/list', function() {
    return view("admin.admin.list");
});

Route::group(['middleware'=>'admin'], function() {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });
});

Route::group(['middleware'=>'teacher'], function() {
    Route::get("/teacher/dashboard", function() {
        return view("admin.dashboard");
    });
});

Route::group(['middleware'=>'student'], function() {
    Route::get('/student/dashboard', function() {
        return view('admin.dashboard');
    });
});

Route::group(['middleware'=>'parent'], function() {
    Route::get('/parent/dashboard', function() {
        return view('admin.dashboard');
    });
});