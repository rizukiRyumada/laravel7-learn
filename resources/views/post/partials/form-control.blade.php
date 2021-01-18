<div class="mb-3">
    <label class="form-label" for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') ?? $post->title }}">                        @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label class="form-label" for="body">Body</label>
    <textarea name="body" id="body" rows="10" class="form-control @error('body') is-invalid @enderror">{{ old('body') ?? $post->body }}</textarea>
    @error('body')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="d-flex justify-content-end">
    <div>
        <button type="submit" class="btn btn-success">{{ $button }}</button>
    </div>
</div>
