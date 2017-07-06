@component('profiles.activities._activity')

    @slot('date')

        {{ $activity->created }}

    @endslot

    @slot('activity')

        {{ '@'.Auth::user()->name }} published the thread

        <a href="{{ $activity->subject->path('show') }}">
            {{ $activity->subject->title }}  <!-- thread->title -->
        </a>

    @endslot

@endcomponent