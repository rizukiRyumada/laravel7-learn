@extends('layouts.main')

@section('page_title', $post->title)
@section('content')
    <h1>{{ $post->title }}</h1>
    <div class="text-secondary">
        {{-- menampilkan nama kategori dan waktunya --}}
        <small><a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a> &middot {{ $post->created_at->format('d F Y') }}</small>
    </div>
    <hr>
    <p>{{ $post->body }}</p>
@endsection
