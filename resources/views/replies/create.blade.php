@if (! Request::is('threads'))
    @if (Auth::check())
        <form action="{{ $thread->path_to_reply('store') }}" method="post">

            {{ csrf_field() }}

            <div class="form-group">
                <textarea name="body" id="body" class="form-control" rows="4" placeholder="Have your say here">{{ old('body') }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">
                <i class="fa fa-paper-plane" aria-hidden="true"></i> Post a reply
            </button>
        </form>
    @else
        <p class="text-center">
            Please <a href="{{ route('login') }}">sign in</a> to participate in the forum.
        </p>
    @endif
@endif