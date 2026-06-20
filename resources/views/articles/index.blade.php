<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách bài viết</title>
</head>
<body>

<h1>Danh sách bài viết</h1>

@foreach($articles as $article)
    <p>
        <a href="{{ route('articles.show', $article['id']) }}">
            {{ $article['title'] }}
        </a>
    </p>
@endforeach

</body>
</html>