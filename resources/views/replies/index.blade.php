@if (!Request::is('threads'))
    @forelse ($thread->replies as $reply)
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="#">
                    {{ $reply->user_name }}
                </a>
                {{ $reply->created }}
            </div>
            <div class="panel-body">
                {{ $reply->body }}
            </div>
        </div>
    @empty
        The thread has no replies.
    @endforelse
@endif
