<!DOCTYPE html>
<html>
<head>
    <title>Articles</title>
</head>
<body>

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