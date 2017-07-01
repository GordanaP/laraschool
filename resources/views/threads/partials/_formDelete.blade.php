<form action="{{ $thread->path('destroy') }}" method="POST">

    {{ csrf_field() }}
    {{ method_field('DELETE') }}

    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete the thread?')">
        Delete
    </button>

</form>