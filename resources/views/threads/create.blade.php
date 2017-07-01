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

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title"  class="form-control" placeholder="Thread title" value="{{ old('title') }}" autofocus="">
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea name="body" id="body" class="form-control" rows="5" placeholder="Thread body">{{ old('body') }}</textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Publish</button>
                </div>
            </form>
        </div>
    </div>
@endsection