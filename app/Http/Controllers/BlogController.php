<?php

namespace App\Http\Controllers;

class BlogController extends Controller
{
    public function index()
    {
        $posts = [
            [
                'id' => 1,
                'title' => 'Giới thiệu Laravel',
                'author' => 'Nguyễn Văn A',
                'date' => '2025-06-01',
                'excerpt' => 'Laravel là framework PHP phổ biến nhất hiện nay.'
            ],
            [
                'id' => 2,
                'title' => 'Blade Template Engine',
                'author' => 'Trần Văn B',
                'date' => '2025-06-02',
                'excerpt' => 'Blade giúp xây dựng giao diện nhanh và dễ bảo trì.'
            ],
            [
                'id' => 3,
                'title' => 'Routing trong Laravel',
                'author' => 'Lê Văn C',
                'date' => '2025-06-03',
                'excerpt' => 'Routing định nghĩa URL và xử lý request.'
            ],
            [
                'id' => 4,
                'title' => 'Controller cơ bản',
                'author' => 'Phạm Văn D',
                'date' => '2025-06-04',
                'excerpt' => 'Controller giúp tách biệt logic xử lý.'
            ],
            [
                'id' => 5,
                'title' => 'Sử dụng Bootstrap với Laravel',
                'author' => 'Hoàng Văn E',
                'date' => '2025-06-05',
                'excerpt' => 'Bootstrap giúp thiết kế giao diện responsive.'
            ]
        ];

        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $posts = [
            [
                'id' => 1,
                'title' => 'Giới thiệu Laravel',
                'author' => 'Nguyễn Văn A',
                'date' => '2025-06-01',
                'excerpt' => 'Laravel là framework PHP phổ biến nhất hiện nay.'
            ],
            [
                'id' => 2,
                'title' => 'Blade Template Engine',
                'author' => 'Trần Văn B',
                'date' => '2025-06-02',
                'excerpt' => 'Blade giúp xây dựng giao diện nhanh và dễ bảo trì.'
            ],
            [
                'id' => 3,
                'title' => 'Routing trong Laravel',
                'author' => 'Lê Văn C',
                'date' => '2025-06-03',
                'excerpt' => 'Routing định nghĩa URL và xử lý request.'
            ],
            [
                'id' => 4,
                'title' => 'Controller cơ bản',
                'author' => 'Phạm Văn D',
                'date' => '2025-06-04',
                'excerpt' => 'Controller giúp tách biệt logic xử lý.'
            ],
            [
                'id' => 5,
                'title' => 'Sử dụng Bootstrap với Laravel',
                'author' => 'Hoàng Văn E',
                'date' => '2025-06-05',
                'excerpt' => 'Bootstrap giúp thiết kế giao diện responsive.'
            ]
        ];

        $post = null;

        foreach ($posts as $item) {
            if ($item['id'] == $id) {
                $post = $item;
                break;
            }
        }

        if (!$post) {
            abort(404);
        }

        return view('posts.show', compact('post'));
    }
}