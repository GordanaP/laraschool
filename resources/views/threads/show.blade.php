@extends('layouts.app')

@section('title', '| '.$thread->title)

@section('content')

    @include('errors._list')
    @include('flash::message')

    <div class="panel panel-default thread__panel">

        <!-- Single Thread -->
        @include('threads.partials._thread')

        <!-- Action buttons -->
        @can('access', $thread)
            <div class="panel-footer">
                <a href="{{ $thread->path('edit') }}" class="btn btn-warning pull-left">
                    Edit
                </a>

                @include('threads.partials._formDelete')
            </div>
        @endcan

    </div>

    <!-- Replies list -->
    @forelse ($replies as $reply)

        @include('replies.partials._reply')

        <!-- Replies pagination -->
        <div class="pull-right">
            {{ $replies->links() }}
        </div>

    @empty
        The thread has no replies.
    @endforelse

    <!-- New reply form -->
    @include('replies.create')

    <!-- Flash message -->
    <flash message="{{ session('flash') }}"></flash>

@endsection