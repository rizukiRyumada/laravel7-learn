<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- menampilkan page title ada 2 cara --}}
    {{-- <title>@yield('page_title')</title> --}}
    {{-- menampilkan page title bila tidak ada, ganti ke nama default --}}
    <title>{{ $title ?? 'Ryu' }}</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    {{-- pake tag php error --}}
    <?php // include 'layouts.navigation'; ?>
    <?php // include 'layouts/navigation'; ?>

    {{-- ini seperti partial pada codeigniter --}}
    @include('layouts.navigation')

    <div class="container py-4">
        {{-- alert --}}
        @include('layouts.alert')
        {{-- content --}}
        @yield('content')
    </div>
</body>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

</html>
