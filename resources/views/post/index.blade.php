@extends('layouts.app')

@section('page_title', 'All Post')
@section('content')

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
    <hr>
</div>

<div class="row">
    <div class="col-md-7">
        @include('post/partials/viewer')
    </div>
</div>

{{-- menambahkan pagination dengan bawaan blade --}}
{{ $posts->links() }}
{{-- ------------------- --}}

{{-- @endsection dan @stop fungsinya sama --}}
@stop
{{-- @endsection --}}
