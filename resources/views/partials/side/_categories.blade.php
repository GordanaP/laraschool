<div class="list-group">
    <a href="#" class="list-group-item">
        <h4>Categories</h4>
    </a>

    @foreach ($categories as $category)
        <a href="{{ route('threads.index', append('category', $category->slug)) }}" class="list-group-item">
            {{ $category->name }}
        </a>
    @endforeach

</div>