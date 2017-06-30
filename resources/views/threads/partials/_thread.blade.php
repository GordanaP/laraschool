<div class="panel panel-default thread__panel">
    <div class="panel-heading">
        <a href="{{ $thread->path('show') }}">
            <h4>{{ $thread->title }}</h4>
        </a>
    </div>

    <div class="panel-body">
        <article class="thread">
            <div class="thread__body">
                {{ $thread->body }}
            </div>
        </article>
    </div>
</div>