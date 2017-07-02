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

<!-- Category -->
<div class="form-group">
    <label for="category_id">Category</label>
    <select name="category_id" id="category_id" class="form-control">
        <option selected="" disabled="">Select a category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                {{ $category->id == $category_id ? "selected" : ""}}
            >
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>

<!-- Button -->
<div class="form-group">
    <button class="btn btn-success">{{ $button }}</button>
</div>