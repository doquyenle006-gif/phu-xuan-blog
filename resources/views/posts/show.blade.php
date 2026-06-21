@extends('layouts.app')

@section('title', $post->title . ' | Phú Xuân Blog')

@section('content')

@php use Illuminate\Support\Str; @endphp

{{-- Breadcrumb --}}
<nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Bài viết</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($post->title, 40) }}</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-body">
                <h1 class="h3">{{ $post->title }}</h1>

                <div class="mb-3 text-muted">
                    👤 {{ $post->author }} · 📅 {{ $post->created_at->format('d/m/Y H:i') }}
                    <x-badge :status="$post->status" class="ms-2" />
                </div>

                <div class="mt-4">
                    {{ $post->content }}
                </div>
            </div>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">← Quay lại danh sách</a>
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-primary">✏ Sửa bài</a>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirmDelete('{{ $post->title }}');">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">🗑 Xóa</button>
            </form>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5>📋 Thông tin bài viết</h5>
                <ul class="list-unstyled">
                    <li><strong>ID:</strong> {{ $post->id }}</li>
                    <li><strong>Tác giả:</strong> {{ $post->author }}</li>
                    <li><strong>Ngày đăng:</strong> {{ $post->created_at->format('d/m/Y') }} ({{ $post->created_at->diffForHumans() }})</li>
                    <li><strong>Trạng thái:</strong>
                        <x-badge :status="$post->status" />
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
