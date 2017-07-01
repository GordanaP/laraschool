@extends('layouts.app')

@section('title', '| New Thread')

@section('content')

    @include('errors._list')
    @include('flash::message')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>
                <b><i class="fa fa-pencil"></i> New thread</b>
            </h4>
        </div>
        <div class="panel-body">
            <form action="{{ route('threads.store') }}" method="post">

                {{ csrf_field() }}

                @include('threads.partials._formCreate', [
                    'title' => old('title'),
                    'body' => old('body'),
                    'category_id' => old('category_id'),
                    'button' => 'Publish',
                ])

            </form>
        </div>
    </div>
@endsection