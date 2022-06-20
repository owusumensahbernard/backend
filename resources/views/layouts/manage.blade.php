<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" "https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/manage.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@5.8.55/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/buefy/dist/buefy.min.css">
    @yield('styles')

{{--    <script src="https://unpkg.com/vue@2"></script>--}}
{{--    <!-- Full bundle -->--}}
{{--    <script src="https://unpkg.com/buefy/dist/buefy.min.js"></script>--}}

</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">

    @include('layouts.navigation')
@include('manage.nav');

    <!-- Page Content -->
 <div class="management-area" id="app">
     @yield('content')
 </div>
</div>


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" ></script>

<script src="https://unpkg.com/vue@2"></script>

<script src="https://unpkg.com/buefy/dist/buefy.min.js"></script>
@yield('scripts')

</body>
</html>
