<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Mapa</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- External styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

    <!-- Local styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/froala_blocks.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/froala_style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/waves.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <script src="{{ asset('js/mapa.js') }}" ></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwGP8sr9DdW3ftUvpi0-20wZ_ZnE92hVo&callback=initMap&libraries=&v=weekly"
        defer>
    </script>
    <style type="text/css">
        #map {
            height: 800px;
            width: 100%;
        }
    </style>
</head>

<body>
    <h3>My Google Maps Demo</h3>
    <!--The div element for the map -->
    <div id="map"></div>
</body>
</html>
