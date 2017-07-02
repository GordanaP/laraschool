<div class="panel panel-default thread__panel">
    <div class="panel-heading">

        <!-- Title -->
        <a href="{{ $thread->path('show') }}">
            <h4>{{ $thread->title }}</h4>
        </a>
        <p>
            <div style="display: flex">
                <div style="flex: 1">
                    <!-- Author -->
                    <a href="{{ route('threads.index', append('author', $thread->user->name)) }}">
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
                    {{ $thread->replies_count }} {{ str_plural('reply', $thread->replies()->count()) }}
                </a>
            </div>
        </p>
    </div>

    <div class="panel-body">
        <article class="thread">
            <div class="thread__body">
                {{ $thread->body }}
            </div>
        </article>
    </div>

    <!-- Action buttons -->
    @if (! Request::is('threads'))
        <div class="panel-footer">
            <a href="{{ $thread->path('edit') }}" class="btn btn-warning pull-left">
                Edit
            </a>

            @include('threads.partials._formDelete')
        </div>
    @endif
</div>

<!-- Replies list with pagination -->
@if (! Request::is('threads'))
    @forelse ($replies as $reply)
        @include('replies.index')
    @empty
        The thread has no replies.
    @endforelse
@endif

<!-- Reply form -->
@include('replies.create')
