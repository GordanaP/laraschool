<div class="panel panel-default thread__panel">
    <div class="panel-heading">
        <a href="{{ $thread->path('show') }}">
            <h4>{{ $thread->title }}</h4>
        </a>
        <p>
            <a href="#">
                {{ $thread->user_name }}
            </a>
            {{ $thread->created_format }}
        </p>
    </div>

    <div class="panel-body">
        <article class="thread">
            <div class="thread__body">
                {{ $thread->body }}
            </div>
        </article>
    </div>

    <div class="panel-footer">
        <a href="{{ $thread->path('edit') }}" class="btn btn-warning pull-left">
            Edit
        </a>

        <form action="{{ $thread->path('destroy') }}" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete the thread?')">
                Delete
            </button>
        </form>
    </div>
</div>

<!-- Replies list-->
@include('replies.index')

<!-- Reply form -->
@include('replies.create')
