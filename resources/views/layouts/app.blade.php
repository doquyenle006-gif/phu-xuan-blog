<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'MyLaravelApp') - Đại học Phú Xuân</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

    @stack('styles')

    <style>
        .footer{
            background:#343a40;
            color:#aaa;
            padding:20px 0;
            margin-top:60px;
        }

        .footer a{
            color:#ccc;
            text-decoration:none;
        }

        .page-header{
            background:linear-gradient(135deg,#1B3F6E 0%,#2E75B6 100%);
            color:white;
            padding:40px 0;
            margin-bottom:32px;
        }
    </style>
</head>

<body>

@include('components.navbar')

@if(View::hasSection('page-header'))
<div class="page-header">
    <div class="container">
        @yield('page-header')
    </div>
</div>
@endif

<main class="container py-4">
    @yield('content')
</main>

<footer class="footer">
    <div class="container text-center">
        <p class="mb-0">
            &copy; {{ date('Y') }} MyLaravelApp
            •
            <a href="{{ route('about') }}">Giới thiệu</a>
            •
            <a href="{{ route('contact') }}">Liên hệ</a>
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')

</body>
</html>