@extends('layouts.app', ['title' => 'Edit Post'])

{{-- @section('page_title', 'New Post') --}}
@section('content')

<div class="d-flex justify-content-between">
    <div>
        <h4>Edit Post</h4>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-6">
        {{-- form --}}
        <div class="card">
            <div class="card-header">Update Post: {{ $post->title }} </div>
            <div class="card-body">
                <form action="/post/{{ $post->slug }}/edit" method="post" enctype="multipart/form-data">
                    {{-- tambahkan method patch untuk mengenalkan method form update ini --}}
                    @method('patch')
                    {{-- wajib menambahkan csrf protection pada setiap form kalo engga bakal error 419|page expired --}}
                    @csrf
                    @include('post/partials/form-control')
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6 mt-md-0 mt-2">
        <div class="card text-white bg-danger">
            <div class="card-header">Delete the Post</div>
            <div class="card-body">
                <form id="formDelete" action="/post/{{ $post->slug }}/delete" method="post">
                    {{-- tambahkan method delete untuk mengenalkan form delete ini pada laravel --}}
                    @method('delete')
                    {{-- WAJIB untuk menambahkan csrf protection pada setiap form kalo engga bakal error 419|page expired --}}
                    @csrf
                    <div class="d-flex justify-content-center">
                        <div>
                            <!-- Button trigger modal -->
                            <button id="staticBackdropTrigger" type="button" class="btn btn-light text-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">- Delete</button>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Are you sure?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <div class="modal-body">
                                        The Post will be deleted and cannot be recovered.
                                        <br/>
                                        <br/>
                                        <div>{{ $post->title }}</div>
                                        <div class="text-secondary">
                                            <small>Published at {{ $post->created_at->format('d F Y') }}</small>
                                        </div>
                                    </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-secondary" >Yes</button>
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // script untuk modal
    var myModal = document.getElementById('staticBackdrop')
    var myInput = document.getElementById('staticBackdropTrigger')

    myModal.addEventListener('shown.bs.modal', function () {
        myInput.focus()
    })

</script>

{{-- @endsection dan @stop fungsinya sama --}}
@stop
{{-- @endsection --}}
