@extends('layouts.app')

@section('title', 'Viết bài mới')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="mb-0">✏ Viết bài mới</h1>
    <a href="{{ route('posts.index') }}" class="btn btn-secondary">← Hủy</a>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf

                    {{-- Tiêu đề --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Tiêu đề bài viết *</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Nội dung --}}
                    <div class="mb-3">
                        <label for="body" class="form-label">Nội dung *</label>
                        <textarea id="body" name="body" class="form-control" rows="8" required>{{ old('body') }}</textarea>
                        @error('body')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Trạng thái --}}
                    <div class="mb-3">
                        <label for="status" class="form-label">Trạng thái</label>
                        <select id="status" name="status" class="form-select">
                            <option value="draft" {{ old('status', 'draft') === 'draft' ? 'selected' : '' }}>📝 Lưu nháp</option>
                            <option value="published" {{ old('status', 'draft') === 'published' ? 'selected' : '' }}>✅ Xuất bản ngay</option>
                        </select>
                    </div>

                    {{-- Nút submit --}}
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">💾 Đăng bài</button>
                        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

{{-- Nếu cần CSS riêng cho trang này, push vào stack styles:
@push('styles')
<style>
/* ... */
</style>
@endpush
--
