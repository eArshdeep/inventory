<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        {{--  Meta  --}}
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        {{--  Font  --}}
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        {{--  Materialize  --}}
        <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"  media="screen,projection"/>
        {{-- Favicon --}}
        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" />
        {{--  Title  --}}
        <title>{{ config('app.name', 'Inventory') }}</title>
    </head>
    <body>
        <div id="app">
            @include('components.navbar')
            <div class="container">
                @yield('body')
            </div>
        </div>
        {{--  Import jQuery before materialize.js  --}}
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    </body>
</html>