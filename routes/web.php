<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Trang chủ
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

/*
|--------------------------------------------------------------------------
| Giới thiệu
|--------------------------------------------------------------------------
*/
Route::get('/about', function () {
    return view('about');
})->name('about');

/*
|--------------------------------------------------------------------------
| Liên hệ
|--------------------------------------------------------------------------
*/
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

/*
|--------------------------------------------------------------------------
| Dữ liệu mẫu bài viết
|--------------------------------------------------------------------------
*/
$articles = [
    [
        'id' => 1,
        'title' => 'Giới thiệu Laravel',
        'author' => 'Phú Xuân',
        'date' => '20/06/2026',
        'content' => 'Laravel là framework PHP phổ biến nhất hiện nay.'
    ],
    [
        'id' => 2,
        'title' => 'Blade Template Engine',
        'author' => 'Nguyễn Văn A',
        'date' => '21/06/2026',
        'content' => 'Blade giúp xây dựng giao diện nhanh và gọn gàng.'
    ],
];

/*
|--------------------------------------------------------------------------
| Danh sách bài viết
|--------------------------------------------------------------------------
*/
Route::get('/articles', function () use ($articles) {
    return view('articles.index', compact('articles'));
})->name('articles.index');

/*
|--------------------------------------------------------------------------
| Chi tiết bài viết
|--------------------------------------------------------------------------
*/
Route::get('/articles/{id}', function ($id) use ($articles) {

    $article = collect($articles)->firstWhere('id', $id);

    if (!$article) {
        abort(404);
    }

    return view('articles.show', compact('article'));

})->name('articles.show');

/*
|--------------------------------------------------------------------------
| Form tạo bài viết
|--------------------------------------------------------------------------
*/
Route::get('/articles/create', function () {
    return view('articles.create');
})->name('articles.create');

/*
|--------------------------------------------------------------------------
| Shop
|--------------------------------------------------------------------------
*/
Route::get('/shop/products', function () {

    $products = [
        'Laptop Dell',
        'Bàn phím cơ',
        'Chuột Gaming',
        'Tai nghe Bluetooth'
    ];

    return view('shop.products', compact('products'));

})->name('shop.products');