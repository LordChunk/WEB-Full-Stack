<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Favicon -->
        <link rel="icon" href="{{ asset('/images/dragon.png') }}" type="image/x-icon">

        <title>Web Full Stack</title>

        <!-- Fonts -->
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />

        @routes
        <!-- JavaScript -->
        <script src="{{ mix('/js/app.js') }}" defer></script>
    </head>
    <body>
        @inertia
    </body>
</html>
