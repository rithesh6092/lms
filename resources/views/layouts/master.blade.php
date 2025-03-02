<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('web-includes.head') <!-- Includes common head section -->

<body>
    <!-- header start -->
    @include('web-includes.header1')
    <!-- header end -->

    <main>
        @yield('content') <!-- Page-specific content goes here -->
    </main>

    <!-- footer start -->
    @include('web-includes.footer1')
    <!-- footer end -->
    @include('web-includes.scripts') <!-- Includes common scripts -->
</body>

</html>
