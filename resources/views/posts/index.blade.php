<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách bài viết - Phú Xuân Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h2 class="text-center mb-4">📘 Danh sách bài viết</h2>
    <p class="text-center">Tổng số bài viết: <b>{{ count($posts) }}</b></p>
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5>{{ $post['title'] }}</h5>
                        <p class="text-muted mb-3">
                            👤 {{ $post['author'] }}<br>
                            📅 {{ $post['date'] }}
                        </p>
                        <p>{{ $post['excerpt'] }}</p>
                        <a href="/posts/{{ $post['id'] }}" class="btn btn-primary btn-sm">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<h1>Categories</h1>

<ul>
@foreach($categories as $cat)
    <li>
        <a href="{{ route('categories.show', $cat['id']) }}">
            {{ $cat['name'] }}
        </a>
    </li>
@endforeach
</ul>
<h1>Articles</h1>

<form method="GET">
    <select name="category" onchange="this.form.submit()">
        <option value="">All</option>
        <option value="Công nghệ">Công nghệ</option>
        <option value="Khoa học">Khoa học</option>
        <option value="Kinh doanh">Kinh doanh</option>
    </select>
</form>

<ul>
@foreach($articles as $a)
    <li>{{ $a['title'] }} - {{ $a['category'] }}</li>
@endforeach
</ul>
</body>
</html>
