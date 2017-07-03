@extends('layouts.app')

@section('title', '| @'.$user->name)

@section('content')

    <h1>{{ $user->name }} <small>Memeber since {{ $user->created }}</small></h1>

    <hr>

    <!-- Threads list filtered by user -->
    @foreach ($threads as $thread)

        <div class="panel panel-default">
            @include('threads.partials._thread')
        </div>

    @endforeach

    <!-- Pagination -->
    <div class="text-center">
        {{ $threads->links() }}
    </div>

@endsection