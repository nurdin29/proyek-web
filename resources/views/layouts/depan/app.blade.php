<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog Home - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/front/css/styles.css" rel="stylesheet" />
    </head>
    <body>

        @section('header')
            @include('layouts.depan.inc.header')
        @show

        <div class="container">
            <div>
                @yield('content')
            </div>
        </div>

        @section('footer')
            @include('layouts.depan.inc.footer')
        @show

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/front/js/scripts.js"></script>
    </body>
</html>
