<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.main.meta')
    <title>@yield('title')</title>
    @include('partials.main.css-theme')
    @yield('custom-css')
</head>
    @yield('body')
    @include('partials.main.js-theme')
    @yield('custom-js')
</html>
