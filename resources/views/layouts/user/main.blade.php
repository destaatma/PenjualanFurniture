<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    <link href="{{ url('/beranda/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ url('/beranda/assets/css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ url('/beranda/assets/css/style.css') }}" rel="stylesheet">
    <title>OMAH Mebel</title>
</head>

<body>

    @include('layouts.user.navbar')

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }
    </style>

    @yield('content')

    @include('layouts.user.footer')


    <script src="{{ url('/beranda/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('/beranda/assets/js/tiny-slider.js') }}"></script>
    <script src="{{ url('/beranda/assets/js/custom.js') }}"></script>
    @stack('scripts')
</body>

</html>
