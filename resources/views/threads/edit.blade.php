@extends('layouts.app')

@section('title', '| '.$thread->title)

@section('content')

    @include('errors._list')
    @include('flash::message')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>
                <b><i class="fa fa-pencil-square-o"></i> Edit thread</b>
            </h4>
        </div>
        <div class="panel-body">
            <form action="{{ $thread->path('update') }}" method="post">

                {{ csrf_field() }}
                {{ method_field('PUT') }}

                @include('threads.partials._formCreate', [
                    'title' => old('title') ?? $thread->title,
                    'body' => old('body') ?? $thread->body,
                    'category_id' => old('category_id') ?? $thread->category_id,
                    'button' => 'Publish',
                ])

            </form>
        </div>
    </div>
@endsection