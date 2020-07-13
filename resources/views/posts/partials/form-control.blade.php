<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" value="{{ old('title') ?? $post->title }}" id="title" class="form-control ">
    @error('title')
    <div class="text-danger mt-2">
        {{  $message }}
    </div>
    @enderror
</div>
<div class="form-group">
    <label for="category">category</label>
    <select  name="category"  id="category" class="form-control ">
        <Option disabled selected>Choose One</Option>
    @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
    </select>
    @error('category')
    <div class="text-danger mt-2">
        {{  $message }}
    </div>
    @enderror
</div>

<div class="form-group">
    <label for="tags">tags</label>
    <select  name="tags"  id="tags" class="form-control " multiple>
        <Option disabled selected>Choose One</Option>
    @foreach ($tags as $tag)
        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
    @endforeach
    </select>
    @error('tags')
    <div class="text-danger mt-2">
        {{  $message }}
    </div>
    @enderror
</div>

<div class="form-group">
    <label for="body">Body</label>
    <textarea name="body" id="body" class="form-control">{{ old('body') ?? $post->body }}</textarea>
    @error('body')
    <div class="text-danger mt-2">
        {{  $message }}
    </div>
    @enderror
</div>
<button type="submit" class="btn btn-primary">
    {{ $submit ?? 'Update' }}
</button>
