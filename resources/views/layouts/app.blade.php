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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" />
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous"></script>
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('select').select2({
            placeholder: "Please Choose"
        });
    });
</script>
</html>
