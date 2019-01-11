<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <!-- Head -->
    @include('layouts.partials.head')
    <!-- /Head -->

</head>
<body>
<!--PageContent-->
<div class="page-content">
    <!--MainContent-->
    <div class="content-wrapper">
        <!--MainContent-->
        <div class="content">
            @yield('auth')
        </div>
        <!--/MainContent-->
    </div>
    <!--/MainContent-->
</div>
<!--/PageContent-->
</body>
</html>
