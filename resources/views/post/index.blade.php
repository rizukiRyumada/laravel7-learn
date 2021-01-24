@extends('layouts.app')

@section('page_title', 'All Post')
@section('content')

<div class="d-flex justify-content-between">
    <div>
        @isset($category)
            <h4>Category: {{ $category->name }}</h4>
        @endisset

        @isset($tag)
            <h4>Tag: {{ $tag->name }}</h4>
        @endisset

        @if(!isset($category) && !isset($tag))
            <h4>All Post</h4>
        @endif
    </div>
    <div>
        {{-- cek autentikasi dengan if Auth::check() untuk menampilkan tombol --}}
        @if(Auth::check())
            <a href="{{ route('post.create') }}" class="btn btn-primary">+ New Post</a>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary">Login to create new post</a>
        @endif
    </div>
</div>
<hr>

{{-- menggunakan forelse --}}
<div class="row mb-2">
    @forelse ($posts as $post)
        <div class="col-lg-4 mb-4">
            <div class="card">
                <div class="card-header">
                    {{ $post->title }}
                </div>
                <div class="card-body">
                    {{-- menampilkan post dengan limit karakter --}}
                    <div class="mb-2">
                        {{ Str::limit($post->body, 100, '') }}
                    </div>
                    <div class="">
                        <a href="/post/{{ $post->slug }}" >Read more...</a>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <div>
                        {{-- menampilkan format tanggal --}}
                        <div><small>Published on {{ $post->created_at->format('d F Y') }}</small></div>
                        {{-- menampilkan format kapan terakhir kali diupdate --}}
                        <div><small>at {{ $post->created_at->diffForHumans() }}</small></div>
                        {{-- mengubah tulisan englishnya menjadi indonesia ada di config/app cari locale ubah dari en ke id --}}
                    </div>
                    <div>
                        {{-- menggunakan auth blade redirected --}}
                        {{-- @auth
                            <a href="/post/{{ $post->slug }}/edit" class="btn btn-sm btn-outline-info">Edit</a>
                        @endauth --}}

                        {{-- if is me?, edit my post pls --}}
                        {{-- @if(Auth::user()->id == $post->user_id) --}}
                        {{-- atau --}}
                        {{-- @if(Auth::user()->is($post->author))
                            <a href="/post/{{ $post->slug }}/edit" class="btn btn-sm btn-outline-info">Edit</a>
                        @endif --}}

                        {{-- menggunakan policy --}}
                        @can('edit', $post)
                            <a href="/post/{{ $post->slug }}/edit" class="btn btn-sm btn-outline-info">Edit</a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col">
            <div class="alert alert-primary text-center">There are no Post, Why don't create a new one?!</div>
        </div>
    @endforelse
</div>

{{-- menambahkan pagination dengan bawaan blade --}}
<div class="d-flex justify-content-center">
    <div>
        {{ $posts->links() }}
    </div>
</div>
{{-- ------------------- --}}

{{-- @endsection dan @stop fungsinya sama --}}
@stop
{{-- @endsection --}}
