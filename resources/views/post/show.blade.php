@extends('layouts.app')

@section('page_title', $post->title)
@section('content')
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
@endsection
