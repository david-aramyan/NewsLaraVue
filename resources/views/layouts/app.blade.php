<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('client/js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">

  <!-- Styles -->
  <link href="{{ asset('client/css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app" data-auth="{{ $auth ?? json_encode(['user' => null, 'check' => false]) }}">
  <v-app>
    @yield('appbar')

    <v-main>
      @yield('main')
    </v-main>
  </v-app>
</div>
</body>
</html>
