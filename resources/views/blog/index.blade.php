<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Phú Xuân Blog</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">

    <h2 class="text-center mb-4">📘 Phú Xuân Blog</h2>

    <p class="text-center">
        Tổng số bài viết: <b>{{ count($posts) }}</b>
    </p>

    <div class="row">

        @foreach ($posts as $post)
            <div class="col-md-4 mb-3">

                <div class="card shadow-sm">
                    <div class="card-body">

                        <h5>{{ $post['title'] }}</h5>

                        <p class="text-muted">
                            👤 {{ $post['author'] }} <br>
                            📅 {{ $post['date'] }}
                        </p>

                        <a href="/posts/{{ $post['id'] }}" class="btn btn-primary btn-sm">
                            Xem chi tiết
                        </a>

                    </div>
                </div>

            </div>
        @endforeach

    </div>

</div>

</body>
</html>
@extends('layouts.master')

@section('title', 'Danh sách bài viết')

@section('content')

<h1 class="mb-4">Danh sách bài viết</h1>

@foreach($posts as $post)
<div class="card mb-3">
    <div class="card-body">
        <h3>{{ $post['title'] }}</h3>

        <small>
            Tác giả: {{ $post['author'] }}
            |
            Ngày đăng: {{ $post['date'] }}
        </small>

        <p class="mt-2">
            {{ $post['excerpt'] }}
        </p>
    </div>
</div>
@endforeach

@endsection