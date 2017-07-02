<div class="panel panel-default thread__panel">
    <div class="panel-heading">
        <a href="{{ $thread->path('show') }}">
            <h4>{{ $thread->title }}</h4>
        </a>
        <p>
            <a href="{{ route('threads.index', append('author', $thread->user->name)) }}">
                {{ $thread->user_name }}
            </a>
            {{ $thread->created_format }}
            <a href="{{ route('threads.index', append('category', $thread->category->slug)) }}">
                {{ $thread->category->name }}
            </a>
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

<!-- Replies list-->
@include('replies.index')

<!-- Reply form -->
@include('replies.create')
