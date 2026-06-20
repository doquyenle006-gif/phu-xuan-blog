<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

// Trang chủ
Route::get('/', [BlogController::class, 'index']);

// Trang about
Route::get('/about', function () {
    return '<h1>Về chúng tôi</h1><p>Đại học Phú Xuân</p>';
});

// Danh sách bài viết
Route::get('/posts', [BlogController::class, 'index']);

// Chi tiết bài viết
Route::get('/posts/{id}', [BlogController::class, 'show']);