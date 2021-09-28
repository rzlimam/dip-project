<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>General Dashboard &mdash; Stisla</title>

    <!-- Standard Favicon -->
    <link rel="icon" type="image/x-icon" href="" />

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="/node_modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="/node_modules/weathericons/css/weather-icons.min.css">
    <link rel="stylesheet" href="/node_modules/weathericons/css/weather-icons-wind.min.css">
    <link rel="stylesheet" href="/node_modules/summernote/dist/summernote-bs4.css">
    <link rel="stylesheet" href="/node_modules/ionicons201/css/ionicons.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/components.css">
</head>

<body>
    <div class="app">
        <div class="main-wrapper">
            @include('partials.header')
            @include('partials.sidebar')

            <div class="main-content">
                @yield('container')
            </div>
        </div>
    </div>


    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="/node_modules/simpleweather/jquery.simpleWeather.min.js"></script>
    <script src="/node_modules/chart.js/dist/Chart.min.js"></script>
    <script src="/node_modules/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="/node_modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="/node_modules/summernote/dist/summernote-bs4.js"></script>
    <script src="/node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

    <!-- Template JS File -->
    <script src="/js/scripts.js"></script>
    <script src="/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script src="/js/page/index-0.js"></script>
    <script src="/js/page/bootstrap-modal.js"></script>
</body>

</html>