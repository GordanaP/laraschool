@extends('layouts.app')

@section('title', '| My activities')

@section('content')

    @if (count($activities))
        <table class="table table-striped">
            <thead>
                <th>Date</th>
                <th>Activity</th>
            </thead>
            <tbody>
                @foreach ($activities as $activity)
                    @if (view()->exists('profiles.activities.'.$activity->type))
                        @include('profiles.activities.'.$activity->type, [
                                'activity' => $activity
                            ])
                    @endif
                @endforeach
            </tbody>
        </table>
    @else
        {{ '@'.Auth::user()->name }} has no activities at this time.
    @endif

@endsection