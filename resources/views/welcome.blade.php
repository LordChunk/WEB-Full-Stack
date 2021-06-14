<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet" />

    <!-- Styles -->
    <!-- <link rel="stylesheet" href="/css/app.css"> -->

    <!-- JavaScript            These double /'s fix Hot Module Reloading -->
    <script defer src="{{ mix('js/app.js') }}"></script>
</head>

<body>
    <div id="vue-app">
        <v-app>
            <v-navigation-drawer app v-model="drawer">
                <navigation :nav-items="{{\App\Models\NavigationItem::all()}}"></navigation>
            </v-navigation-drawer>

            <v-app-bar app>
                <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
            </v-app-bar>

            <!-- Sizes your content based upon application components -->
            <v-main>

                <!-- Provides the application the proper gutter -->
                <v-container fluid>

                    <!-- If using vue-router -->
                </v-container>
            </v-main>

            <v-footer app>
                <!-- -->
            </v-footer>
        </v-app>
    </div>
</body>

</html>
