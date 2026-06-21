@extends('layouts.app')

@section('title', 'Danh sách bài viết | Phú Xuân Blog')

@section('content')

@php use Illuminate\Support\Str; @endphp

{{-- Header: title + total count + create button --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="mb-0">📰 Danh sách bài viết</h1>
        <div class="text-muted">Tổng cộng {{ $totalPosts }} bài viết</div>
    </div>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">✏ Viết bài mới</a>
</div>

@forelse ($posts as $post)
    <div class="card mb-3">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <strong>#{{ $loop->iteration }}</strong>
                    <a href="{{ route('posts.show', $post->id) }}" class="ms-2 h5">{{ $post->title }}</a>
                    <div class="text-muted">{{ Str::limit($post->body, 100) }}</div>
                    <div class="mt-2 text-muted">👤 {{ $post->author }} · 📅 {{ $post->created_at->diffForHumans() }}</div>
                </div>

                <div class="text-end">
                    <x-badge :status="$post->status" />

                    <div class="mt-3">
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-outline-primary">👁 Xem</a>
                        <a href="#" class="btn btn-sm btn-outline-secondary">✏ Sửa</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Xác nhận xóa?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">🗑 Xóa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($loop->last)
        <div class="text-center text-muted my-4">— Đã hiển thị tất cả {{ $loop->count }} bài viết —</div>
    @endif

@empty
    <div class="alert alert-info">
        📭 Chưa có bài viết nào. <a href="{{ route('posts.create') }}">✏ Viết bài đầu tiên</a>
    </div>
@endforelse

@endsection