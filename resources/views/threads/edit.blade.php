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

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title"  class="form-control" placeholder="Thread title" value="{{ old('title') ?? $thread->title }}" autofocus="">
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea name="body" id="body" class="form-control" rows="5" placeholder="Thread body">{{ old('body') ?? $thread->body }}</textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-success">
                        Save changes
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection