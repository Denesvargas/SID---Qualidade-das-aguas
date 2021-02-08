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
    <link rel="stylesheet" href="{{ asset('css/mapa.css') }}">

</head>

<body>
    <div class="content">
        <div class="row">
            <form action="/mapa" method="GET">
                <input id="searchInput" name="q" type="text" class="form-control"
                       placeholder="Ex.: Chapecó ou Rio Uruguai">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>
                        Pesquisar
                    </button>
                </div>
            </form>
        </div>

        <div class="mapa" id="map"></div>
    </div>

    <script src="{{ asset('js/mapa.js') }}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwGP8sr9DdW3ftUvpi0-20wZ_ZnE92hVo&callback=initMap&libraries=&v=weekly"
        defer>
    </script>
</body>
</html>
