@extends('layouts.app')

@section('title', '| '.$thread->title)

@section('content')

    <!-- Thread -->
    @include('threads.partials._thread')

@endsection