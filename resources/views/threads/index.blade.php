@extends('layouts.app')

@section('title', '| Threads')

@section('content')

    <!-- Threads list-->
    @forelse ($threads as $thread)

        <div class="panel panel-default">
            @include('threads.partials._thread')
        </div>

    @empty
        There are no threads at this time.
    @endforelse

    <!-- Pagination -->
    <div class="text-center">
        {{ $threads->appends(Request::input())->links() }}
    </div>

@endsection