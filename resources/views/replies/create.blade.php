@if (! Request::is('threads'))

    @if (Auth::check())

        <!-- Form create -->
        @include('replies.partials._formCreate')

    @else

        <p class="text-center">
            Please <a href="{{ route('login') }}">sign in</a> to participate in the forum.
        </p>

    @endif

@endif