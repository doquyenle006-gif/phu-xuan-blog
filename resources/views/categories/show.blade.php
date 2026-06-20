<h1>Category Detail</h1>

@if($category)
    <p>ID: {{ $category['id'] }}</p>
    <p>Name: {{ $category['name'] }}</p>
@else
    <p>Not found</p>
@endif

<a href="{{ route('categories.index') }}">Back</a>