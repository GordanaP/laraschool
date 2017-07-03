<div class="panel-heading">

    <!-- Title -->
    <a href="{{ $thread->path('show') }}">
        <h4>{{ $thread->title }}</h4>
    </a>

    <div style="display: flex">
        <div style="flex: 1">

            <!-- Author -->
            <a href="{{ route('profiles.show', $thread->user->name) }}">
                {{ $thread->user_name }}
            </a>

            <!-- Date -->
            {{ $thread->created_format }}

            <!-- Category -->
            <a href="{{ route('threads.index', append('category', $thread->category->slug)) }}">
                {{ $thread->category->name }}
            </a>
        </div>

        <!-- Replies # -->
        <a href="#">
            {{ $thread->replies_count }} {{ str_plural('reply', $thread->replies_count) }}
        </a>
    </div>

</div>

<!-- Body -->
<div class="panel-body">
    {{ $thread->body }}
</div>