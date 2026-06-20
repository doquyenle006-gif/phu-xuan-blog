<h1>Categories</h1>

<ul>
@foreach($categories as $cat)
    <li>
        <a href="{{ route('categories.show', $cat['id']) }}">
            {{ $cat['name'] }}
        </a>
    </li>
@endforeach
</ul>