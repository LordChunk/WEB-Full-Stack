<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Web Full Stack</title>

        <!-- Fonts -->
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />

        <!-- JavaScript -->
        <script src="{{ mix('/js/app.js') }}" defer></script>
    </head>
    <body>
        @inertia
    </body>
</html>