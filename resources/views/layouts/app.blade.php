<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{-- HEAD --}}
    @include('layouts.partials.head')
    {{-- END HEAD --}}
</head>
<body class="animsition">
    <div class="page-wrapper">
        {{-- SIDEBAR --}}
        @include('layouts.partials.sidebar')
        {{-- END SIDEBAR --}}
        <div class="page-container">
            <div class="main-content">
                {{-- CONTENT --}}
                @yield('content')
                {{-- END CONTENT --}}
            </div>
        </div>
    </div>
    {{-- SCRIPTS --}}
    @include('layouts.partials.scripts')
    {{-- END SCRIPTS --}}
</body>
</html>
