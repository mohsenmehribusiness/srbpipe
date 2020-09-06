<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>srbpipe</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- me -->
    <style>
        .background-image {
            position: fixed;
            left: 0;
            right: 0;
            z-index: 1;
            display: block;
            background-image: url(<?= url('login.jpg'); ?>);
            width: auto;
            height: 800px;
            -webkit-filter: blur(5px);
            -moz-filter: blur(5px);
            -o-filter: blur(5px);
            -ms-filter: blur(5px);
            filter: blur(5px);
        }
        .contn {
            position: fixed;
            left: 0;
            right: 0;
            z-index: 9999;
            margin-left: 20px;
            margin-right: 20px;
        }
    </style>
    <!-- me -->
</head>
<body>
<div class="background-image"></div>
<div id="app"  class="contn">
    <main class="py-4">
        @yield('content')
    </main>
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>