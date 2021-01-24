<div class="mb-3">
    <label for="thumbnail" class="form-label">Thumbnail</label>
    <input class="form-control @error('thumbnail') is-invalid @enderror" value="{{ old('thumbnail') ?? $post->thumbnail }}" type="file" id="thumbnail" name="thumbnail">
    @error('thumbnail')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label class="form-label" for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') ?? $post->title }}">
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label class="form-label" for="category">Category</label>
    <select name="category" id="category" class="form-select @error('category') is-invalid @enderror" aria-label="Category Select">
        <option value="" selected disabled>Select One</option>
        @foreach($categories as $category)
            <option {{ $category->id == $post->id_category ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    @error('category')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label class="form-label" for="tags">Tags</label>
    {{-- membuat multiple tags select, penamaannya ditambahkan kurung siku input_name[] --}}
    <select name="tags[]" id="tags" class="form-select @error('tags') is-invalid @enderror" aria-label="tags Select" multiple>
        @foreach($post->tags as $tag)
            <option selected value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
        @foreach($tags as $tag)
            {{-- beri tag buat penanda kalo tag itu ada kosong atau tidak --}}
            {{ $flag_tag = 0 }}
            @foreach ($post->tags as $tag_post)
                {{-- cek apa tag ada pada post? --}}
                @if($tag->id == $tag_post->id)
                    {{ $flag_tag = 1 }}
                @endif
            @endforeach
            {{-- cek apa tag betul2 gaada, kalo gaada taruh dalam option --}}
            @if($flag_tag == 0)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endif
        @endforeach
    </select>
    @error('tags')
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
