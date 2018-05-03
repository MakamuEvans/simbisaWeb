<!DOCTYPE html>
<html>
<head>
    @include('layouts._includes.head')
    @yield('styles')
</head>
<body>
@include('layouts._includes.header')
@include('layouts._includes.sidebar')
@yield('content')
@include('layouts._includes.scripts')
@yield('scripts')
</body>
</html>