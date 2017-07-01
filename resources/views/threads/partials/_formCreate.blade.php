<!-- Title -->
<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title"  class="form-control" placeholder="Thread title" value="{{ $title }}" autofocus="">
</div>

<!-- Body -->
<div class="form-group">
    <label for="body">Body</label>
    <textarea name="body" id="body" class="form-control" rows="5" placeholder="Thread body">{{ $body }}</textarea>
</div>

<!-- Button -->
<div class="form-group">
    <button class="btn btn-success">{{ $button }}</button>
</div>