@component('profiles.activities._activity')
    @slot('date')
        {{ $activity->subject->created_format }}
    @endslot

    @slot('activity')
        {{ '@'.Auth::user()->name }} published the thread
        <a href="{{ $activity->subject->path('show') }}">
            {{ $activity->subject->title }}
        </a>
    @endslot
@endcomponent