<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials._head')
</head>

<body>

    @include('partials._preloader')
    @include('partials._nav')
    
    @yield('content')
    
    @include('partials._footer')
    <!--QUOTS POPUP-->
    @include('partials._quote_modal')
    @include('partials._javascript')
</body>
</html>