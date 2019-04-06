<!DOCTYPE html>
<html lang="pt-br">
@include('layouts.head')

<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="classy-load"></div>
    </div>

    <div id="site">
        @include('layouts.header')
        @yield('content')
        @include('layouts.footer')
    </div>
    @include('layouts.script')
</body>

@yield('onlypagescript')

</html>
