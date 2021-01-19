@extends('layouts.app')

@section('page_title', 'Home')
@section('content')
    <?= "My name is ".htmlspecialchars($name) // menampilkan variabel name dan string ?>

    <br>

    {{-- menampilkan variabel dengan blade tanpa eksekusi html special chars --}}
    My name is {{ $name }}

    {{-- menamilkan variabel dengan blade dan eksekusi html special chars --}}
    {{-- My name is {!! $name !!} --}}
@endsection
