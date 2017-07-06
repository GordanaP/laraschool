@component('profiles.activities._activity')

    @slot('date')

        {{ $activity->created }}

    @endslot

    @slot('activity')

        {{ '@'.Auth::user()->name }} left a reply on

        <a href="{{ $activity->subject->thread->path('show') }}#reply-{{ $activity->subject->id }}">
            {{ $activity->subject->thread->title }}  <!-- reply->thread->title -->
        </a>

    @endslot

@endcomponent
