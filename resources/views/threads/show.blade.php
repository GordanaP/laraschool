@extends('layouts.app')

@section('title', '| '.$thread->title)

@section('content')

    @include('errors._list')
    @include('flash::message')

    <!-- Thread -->
    @include('threads.partials._thread')

@endsection