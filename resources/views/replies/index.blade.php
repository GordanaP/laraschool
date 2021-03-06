<div class="panel panel-default">
    <div class="panel-heading" style="display: flex">

        <!-- Replier & date-->
        <div style="flex: 1">
            <a href="{{ route('profiles.show', $reply->user->name) }}">
                {{ $reply->user_name }}
            </a>

            {{ $reply->created }}
        </div>

        <!-- Favorites -->
        <div class="div">
            @include('replies.partials._formFavorite')
        </div>
    </div>

    <!-- Reply body -->
    <div class="panel-body">
        {{ $reply->body }}
    </div>
</div>