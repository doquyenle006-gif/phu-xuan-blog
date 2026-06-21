{{-- resources/views/components/alert.blade.php --}}

@props([
    'type' => 'info',
    'dismissible' => false,
])

@php
    $colorClass = match($type) {
        'success' => 'alert-success',
        'danger'  => 'alert-danger',
        'warning' => 'alert-warning',
        default   => 'alert-info',
    };
@endphp

<div {{ $attributes->merge(['class' => 'alert ' . $colorClass]) }} role="alert">
    @if(isset($title) && trim($title) !== '')
        <h4 class="alert-heading">{{ $title }}</h4>
        <hr>
    @endif

    {{ $slot }}

    @if ($dismissible)
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @endif
</div>
