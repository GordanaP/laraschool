<form action="{{ $thread->path_to_reply('store') }}" method="POST">

    {{ csrf_field() }}

    <!-- Body -->
    <div class="form-group">
        <textarea name="body" id="body" class="form-control" rows="4" placeholder="Have your say here">{{ old('body') }}</textarea>
    </div>

    <!-- Button -->
    <button type="submit" class="btn btn-success">
        <i class="fa fa-paper-plane" aria-hidden="true"></i> Post a reply
    </button>

</form>