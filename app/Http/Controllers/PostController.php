<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Return a collection of fake posts (as objects)
     */
    protected function getFakePosts()
    {
        return collect([
            (object)[
                'id'         => 1,
                'title'      => 'Giới thiệu Laravel Framework',
                'body'       => 'Laravel là PHP framework theo kiến trúc MVC, được Taylor Otwell tạo ra năm 2011. Nó cung cấp công cụ giúp xây dựng ứng dụng web nhanh chóng và bảo mật.',
                'author'     => 'Nguyễn Văn An',
                'status'     => 'published',
                'created_at' => now()->subDays(5),
            ],
            (object)[
                'id'         => 2,
                'title'      => 'Blade Template Engine là gì?',
                'body'       => 'Blade là template engine của Laravel, cho phép viết giao diện HTML với cú pháp ngắn gọn. Blade tự động escape dữ liệu để chống tấn công XSS.',
                'author'     => 'Trần Thị Bình',
                'status'     => 'published',
                'created_at' => now()->subDays(2),
            ],
            (object)[
                'id'         => 3,
                'title'      => 'Eloquent ORM – làm việc với database',
                'body'       => 'Eloquent là Object-Relational Mapping (ORM) của Laravel. Mỗi bảng trong database tương ứng với một Model class trong PHP.',
                'author'     => 'Lê Văn Cường',
                'status'     => 'draft',
                'created_at' => now()->subDay(),
            ],
            (object)[
                'id'         => 4,
                'title'      => 'RESTful API với Laravel Sanctum',
                'body'       => 'Xây dựng API chuẩn REST, bảo vệ bằng Sanctum token. API trả về JSON, phân tách hoàn toàn frontend và backend.',
                'author'     => 'Phạm Thị Dung',
                'status'     => 'published',
                'created_at' => now(),
            ],
            (object)[
                'id'         => 5,
                'title'      => 'Bảo trì: Lưu trữ bài viết',
                'body'       => 'Bài viết đã được lưu trữ trong kho lưu trữ nội dung.',
                'author'     => 'Admin',
                'status'     => 'archived',
                'created_at' => now()->subDays(10),
            ],
            (object)[
                'id'         => 6,
                'title'      => 'Trạng thái lạ',
                'body'       => 'Bài viết với trạng thái không xác định để test component.',
                'author'     => 'Tester',
                'status'     => 'unknown',
                'created_at' => now()->subDays(3),
            ],
        ]);
    }

    /**
     * Hiển thị danh sách bài viết
     */
    public function index()
    {
        $posts = $this->getFakePosts();
        $totalPosts = $posts->count();

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
     * Lưu bài viết (fake) — chỉ redirect
     */
    public function store(Request $request)
    {
        // Không lưu thực tế (chưa có DB) — mô phỏng
        return redirect()->route('posts.index')->with('success', 'Bài viết đã được tạo (giả)!');
    }

    /**
     * Hiển thị chi tiết 1 bài viết
     */
    public function show($id)
    {
        $post = $this->getFakePosts()->firstWhere('id', (int) $id);

        if (! $post) {
            abort(404, 'Bài viết không tồn tại');
        }

        return view('posts.show', compact('post'));
    }

    /**
     * Xóa bài (fake) — chỉ redirect
     */
    public function destroy($id)
    {
        return redirect()->route('posts.index')->with('success', 'Bài viết đã bị xóa (giả).');
    }
}
