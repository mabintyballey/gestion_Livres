<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titre')</title>
     
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.min.css') }}">
    <meta name="theme-color" content="#712cf9">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/alerts.js') }}"></script>
    @if (session('success'))
    <meta name="success-message" content="{{ session('success') }}">
    @endif

</head>    