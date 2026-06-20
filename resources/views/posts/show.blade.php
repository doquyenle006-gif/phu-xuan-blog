<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>{{ $post['title'] }} - Phú Xuân Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">
    <div class="mb-4">
        <a href="/posts" class="btn btn-outline-secondary btn-sm">← Quay lại danh sách</a>
    </div>
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="card-title">{{ $post['title'] }}</h1>
            <p class="text-muted mb-3">
                👤 {{ $post['author'] }}<br>
                📅 {{ $post['date'] }}
            </p>
            <p>{{ $post['excerpt'] }}</p>
            <div class="mt-4">
                <a href="/posts" class="btn btn-primary">Về danh sách bài viết</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
