<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ICC Cricket Tournament - sponsered by Insider</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/custom.css">
    </head>
<body>
        <!-- include Header layout -->
        @include('layouts.header')
        <!-- setup to display dynamic page content here -->
        <div class="main-content">
            <div class="container">
                @yield('content')
            </div>
        </div>
        <!-- include Footer layout -->
        @include('layouts.footer')
        <!-- Bootstrap JavaScript -->
        <script src="/js/app.js"></script>
    </body>
</html>