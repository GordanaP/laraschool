<div class="panel panel-default">
    <div class="panel-heading">
        <a href="#">
            {{ $reply->user->name }}
        </a>
        {{ $reply->created_at->diffForHumans() }}
    </div>
    <div class="panel-body">
        {{ $reply->body }}
    </div>
</div>