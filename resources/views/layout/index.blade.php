<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.meta')
    <title>@yield('title')</title>
    @include('partials.css-theme')
    @yield('custom-css')
</head>
    @yield('body')
    @include('partials.js-theme')
    @yield('custom-js')
</html>
