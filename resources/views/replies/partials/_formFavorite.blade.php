<form action="{{ route('favorites.replies.store', $reply->id) }}" method="POST">

    {{ csrf_field() }}

    <button type="submit" class="btn btn-default btn-sm"

    {{ $reply->isFavoritedBy(Auth::user()) ? 'disabled' : ''}}
    >
        <i class="icon_heart"></i> {{ $reply->favorites_count }}
    </button>

</form>