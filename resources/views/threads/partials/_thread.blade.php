<div class="panel panel-default thread__panel">
    <div class="panel-heading">
        <a href="{{ $thread->path('show') }}">
            <h4>{{ $thread->title }}</h4>
        </a>
        <p>
            <a href="#">
                {{ $thread->user_name }}
            </a>
            {{ $thread->created_format }}
        </p>
    </div>

    <div class="panel-body">
        <article class="thread">
            <div class="thread__body">
                {{ $thread->body }}
            </div>
        </article>
    </div>
</div>

<!-- Replies list-->
@include('replies.index')

<!-- Reply form -->
@include('replies.create')
