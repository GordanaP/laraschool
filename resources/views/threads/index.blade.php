@extends('layouts.app')

@section('title', '| Threads')

@section('content')

    <h2>Threads</h2>

    <!-- Threads list-->
    @forelse ($threads as $thread)

        <!-- Single thread -->
        @include('threads.partials._thread')

    @empty
        There are no threads at present.
    @endforelse

@endsection