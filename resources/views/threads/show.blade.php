@extends('layouts.app')

@section('title', '| '.$thread->title)

@section('content')

    @include('errors._list')
    @include('flash::message')

    <div class="panel panel-default thread__panel">

        <!-- Single Thread -->
        @include('threads.partials._thread')

        <!-- Action buttons -->
        @can('update', $thread)
        <div class="panel-footer">
            <a href="{{ $thread->path('edit') }}" class="btn btn-warning pull-left">
                Edit
            </a>
        @endcan

        @can('delete', $thread)
            @include('threads.partials._formDelete')
        </div>
        @endcan

    </div>

    <!-- Replies list -->
    @forelse ($replies as $reply)

        @include('replies.partials._reply')

        <!-- Pagination -->
        <div class="pull-right">
            {{ $replies->links() }}
        </div>

    @empty
        The thread has no replies.
    @endforelse

    <!-- New reply form -->
    @include('replies.create')

@endsection