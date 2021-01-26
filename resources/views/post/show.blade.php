@extends('layouts.app')

@section('page_title', $post->title)
@section('content')
    <div class="row">
        <div class="col-md-8">
            <img src="{{ $post->takeImage }}" class="card-img-top" style="
            height: 450px;
            object-fit: cover;
            object-position: center;
            ">
            <h1>{{ $post->title }}</h1>
            <div class="text-secondary mb-3">
                {{-- menampilkan nama kategori dan waktunya --}}
                <small>
                    <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
                    &middot; {{ $post->created_at->format('d F Y') }}
                    &middot;
                    @foreach($post->tags as $tag)
                        <a href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
                    @endforeach
                    <div class="d-flex p-2 align-items-center">
                        <img width="60" class="rounded-circle" src="{{ $post->author->gravatar() }}" alt="profile picture">

                        <div class="ml-3">
                            <div>{{ $post->author->name }}</div>
                            <div>{{ '@'.$post->author->username }}</div>
                        </div>
                    </div>
                </small>
            </div>
            <p>{!! nl2br($post->body) !!}</p>

            <div class="mt-3">
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
        <div class="col-md-4">
            @foreach ($posts as $post)
                <div class="card mb-3">
                    <div class="card-body">
                        <div>
                            <a href="{{ route('categories.show', $post->category->slug) }}">
                                <span class="badge bg-secondary">
                                    {{ $post->category->name }}
                                </span>
                            </a>
                            |
                            @foreach($post->tags as $tag)
                                <a href="{{ route('tag.show', $tag->slug) }}">
                                    <span class="badge bg-secondary">
                                        {{ $tag->name }}
                                    </span>
                                </a>
                            @endforeach
                        </div>

                        <a href="{{ route("post.show", $post->slug) }}" class="card-title font-weight-bold link text-dark">
                            {{ $post->title }}
                        </a>
                        <div class="card-text my-3 text-secondary">
                            {{-- menampilkan post dengan limit karakter --}}
                            {{ Str::limit($post->body, 130, '') }}
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img width="32" class="rounded-circle" src="{{ $post->author->gravatar() }}" alt="profile picture">

                                <div class="ml-2">
                                    <small>{{ $post->author->name }}</small>
                                </div>
                            </div>
                        </div>
                        {{-- mengubah tulisan englishnya menjadi indonesia ada di config/app cari locale ubah dari en ke id --}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
