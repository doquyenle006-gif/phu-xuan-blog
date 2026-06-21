{{-- resources/views/components/badge.blade.php --}}

@props([
    'status' => 'draft',
])

@php
    $config = match($status) {
        'published' => ['class' => 'bg-success text-white', 'label' => '✅ Đã xuất bản'],
        'draft'     => ['class' => 'bg-warning text-dark',  'label' => '📝 Bản nháp'],
        'archived'  => ['class' => 'bg-secondary text-white', 'label' => '📦 Lưu trữ'],
        default     => ['class' => 'bg-light text-dark',    'label' => '❓ ' . $status],
    };
@endphp

<span {{ $attributes->merge(['class' => 'badge ' . $config['class']]) }}>{{ $config['label'] }}</span>
