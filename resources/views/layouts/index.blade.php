<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
        @include('layouts.styles.head')
    <body class="layout-sticky-subnav layout-learnly ">
        @include('layouts.styles.loader')

        <!-- Header Layout -->
        <div class="mdk-header-layout js-mdk-header-layout">
            <!-- Header -->
                @include('layouts.base.header')
            <!-- // END Header -->

            @yield('content')

            <!-- Footer -->
                @include('layouts.base.footer')
            <!-- // END Footer -->
        </div>
        <!-- // END Header Layout -->
        @include('layouts.styles.js')
    </body>

</html>