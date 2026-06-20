<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>{{ $article['title'] }}</title>
</head>
<body>
    <h1>{{ $article['title'] }}</h1>

    <p>Tác giả: {{ $article['author'] }}</p>
    <p>Ngày đăng: {{ $article['date'] }}</p>

    <p>{{ $article['content'] }}</p>

    <a href="{{ route('articles.index') }}">
        Quay lại
    </a>
</body>
</html>