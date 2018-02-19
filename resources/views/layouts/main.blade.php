<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    @if (!env('APP_HOT'))
        @yield('css')
    @endif
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    {{-- NOTE: Global variables should be set via server --}}
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'appLocale' => env('APP_LOCALE'),
            'debug' => env('APP_DEBUG'),
        ]) !!};

    </script>
    <style>
        .spinner {
            box-sizing: border-box;
            height: 60px;
            width: 60px;
            border: 0 solid #343434;
            border-radius: 50%;
            box-shadow: 0 -20px 0 24px #343434 inset;
            animation: rotate 1s infinite linear;
            position: absolute;
            display: inline;
        }

        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
<div id="app">
    <h1 style="text-align: center; margin-top: 200px; color: #343434;">{{config('app.name')}}</h1>
    <div style="position: relative; height: 60px; width: 60px;            margin: 20px auto;
">
        <span class="spinner"></span>
    </div>
</div>
</body>
@if (!env('APP_HOT'))
    @yield('js')
@else
    @yield('hot-js')
@endif


</html>
