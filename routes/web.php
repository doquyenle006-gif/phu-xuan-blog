<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

/*
|--------------------------------------------------------------------------
| ABOUT
|--------------------------------------------------------------------------
*/
Route::get('/about', function () {
    return view('about');
})->name('about');

/*
|--------------------------------------------------------------------------
| CONTACT
|--------------------------------------------------------------------------
*/
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

/*
|--------------------------------------------------------------------------
| ARTICLES
|--------------------------------------------------------------------------
*/
Route::get('/articles', function (Request $request) {

    $articles = [
        ['title' => 'AI phát triển', 'category' => 'Công nghệ'],
        ['title' => 'Vũ trụ mới', 'category' => 'Khoa học'],
        ['title' => 'Kinh tế 2026', 'category' => 'Kinh doanh'],
    ];

    $category = $request->query('category');

    if ($category) {
        $articles = array_filter($articles, function ($item) use ($category) {
            return $item['category'] === $category;
        });
    }

    return view('articles.index', compact('articles', 'category'));

})->name('articles.index');

/*
|--------------------------------------------------------------------------
| CATEGORIES (CRUD)
|--------------------------------------------------------------------------
*/
Route::resource('categories', CategoryController::class);

/*
|--------------------------------------------------------------------------
| SHOP
|--------------------------------------------------------------------------
*/
Route::get('/products', function () {

    $products = [
        'Laptop Dell',
        'iPhone 15',
        'Tai nghe Bluetooth',
        'Chuột Logitech',
    ];

    return view('shop.products', compact('products'));

})->name('shop.products');

/*
|--------------------------------------------------------------------------
| POSTS (Controller-based)
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\PostController;

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');