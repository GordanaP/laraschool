@component('profiles.activities._activity')

    @slot('date')

        {{ $activity->created }}

    @endslot

    @slot('activity')

        {{ '@'.Auth::user()->name }} favorited a reply

        <a href="{{ $activity->subject->favorited->thread->path('show') }}#reply-{{ $activity->subject->favorited->id }}">
            {{ $activity->subject->favorited->body }}  <!-- reply->favorited->body -->
        </a>

    @endslot

@endcomponent