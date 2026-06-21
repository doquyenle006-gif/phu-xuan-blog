<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Hiển thị danh sách bài viết
     */
    public function index(): View
    {
        $posts = Post::latest()->paginate(10);
        $totalPosts = Post::count();

        return view('posts.index', compact('posts', 'totalPosts'));
    }

    /**
     * Hiển thị form tạo bài viết
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Lưu bài viết
     */
    public function store(StorePostRequest $request): RedirectResponse
    {
        $post = Post::create($request->validated() + [
            'user_id' => 1,
            'author'  => 'Admin',
            'status'  => 'draft',
        ]);

        return redirect()->route('posts.show', $post)
            ->with('success', 'Tạo bài viết thành công!');
    }

    /**
     * Hiển thị form chỉnh sửa bài viết
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Cập nhật bài viết
     */
    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $post->update($request->validated());

        return redirect()->route('posts.show', $post)
            ->with('success', 'Cập nhật bài viết thành công!');
    }

    /**
     * Hiển thị chi tiết 1 bài viết
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Xóa bài viết
     */
    public function destroy(Post $post): RedirectResponse
    {
        $title = $post->title;
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Đã xóa bài viết: ' . $title);
    }
}
