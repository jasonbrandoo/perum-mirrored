<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <!-- Head -->
    @include('layouts.partials.head')
    <!-- /Head -->

</head>
<body>

    <!--MainNavbar-->
    @include('layouts.partials.main-navbar')
    <!--/MainNavbar-->

    <!--PageContent-->
    <div class="page-content">

        <!--MainSideBar-->
        @include('layouts.partials.main-sidebar')
        <!--/MainSideBar-->

        <!--MainContent-->
        <div class="content-wrapper">
            
            <!--PageHeader-->
            <div class="page-header page-header-light">
                @include('layouts.partials.page-header')
            </div>
            <!--/PageHeader-->
            
            <!--MainContent-->
            <div class="content">
                @yield('content')
            </div>
            <!--/MainContent-->

        </div>
        <!--/MainContent-->

    </div>
    <!--/PageContent-->

</body>
</html>
