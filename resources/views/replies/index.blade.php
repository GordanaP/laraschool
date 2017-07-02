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

{{ $replies->links() }}