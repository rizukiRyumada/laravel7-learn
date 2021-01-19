@extends('layouts.app', ['title' => 'New Post'])

{{-- @section('page_title', 'New Post') --}}
@section('content')

<div class="d-flex justify-content-between">
    <div>
        <h4>New Post</h4>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-6">
        {{-- form --}}
        <div class="card">
            <div class="card-header">New Post</div>
            <div class="card-body">
                <form action="/post/store" method="post">
                    {{-- wajib menambahkan csrf protection pada setiap form kalo engga bakal error 419|page expired --}}
                    @csrf
                    @include('post/partials/form-control')
                </form>
            </div>
        </div>
    </div>
</div>

{{-- @endsection dan @stop fungsinya sama --}}
@stop
{{-- @endsection --}}
