<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Title --}}
    <title>@yield('title', config('app.name'))</title>

    {{-- Fonts --}}
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    {{-- Styles --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Nunito");

        * {
            font-family: "Nunito", serif;
        }

        html,
        body {
            background-color: #fcfcfc;
            height: 100%;
            margin: 0;
        }

        main.content {
            min-height: calc(100vh - 80px);
        }

        footer {
            height: 80px;
        }

        .item-img {
            text-align: center;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .item-title, .item-title:hover {
            text-decoration: none;
            color: rgba(0, 0, 0, 0.85);
        }

        .item-title:hover {
            opacity: 0.75;
        }

        .navbar {
            background-color: #0d6efd;
            color: white !important;
        }

        .navbar .navbar-brand,
        .navbar .nav-link {
            color: white;
            transition: all 0.2s;
        }

        .navbar .navbar-brand:hover,
        .navbar .nav-link:hover {
            color: rgba(255, 255, 255, 0.8);
        }

        .navbar,
        .navbar-spacer {
            min-height: 56px;
        }

        html > ::-webkit-scrollbar {
            width: 12px;
            background-color: #fcfcfc;
        }

        html > ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 4px rgba(0, 0, 0, 0.1);
            background-color: #fcfcfc;
            border-radius: 12px;
            background-color: #fcfcfc;
        }

        html > ::-webkit-scrollbar-thumb {
            border-radius: 12px;
            background-color: rgba(175, 175, 175, 0.6862745098);
        }

        html > ::-webkit-scrollbar-thumb:hover {
            background-color: #afafaf;
        }
    </style>

</head>
<body>
@include('layouts._navbar')

{{-- Page Content --}}
<main class="content">
    <div class="navbar-spacer"></div>

    {{ $slot }}
</main>
{{-- END Page Content --}}

@include('layouts._footer')

{{-- Scripts --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>
</html>
