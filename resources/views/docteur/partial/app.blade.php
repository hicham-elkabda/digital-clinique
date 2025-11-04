<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">

</head>

<body>

    <!-- Sidebar -->
    @include('docteur.partial.sidebar')

    <!-- Bootstrap JS Bundle -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
