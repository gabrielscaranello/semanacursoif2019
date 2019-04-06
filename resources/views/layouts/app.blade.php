<!DOCTYPE html>
<html lang="pt-br">
@include('layouts.head')

<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="classy-load"></div>
    </div>

    @include('layouts.header')
    <div id="app">
        @include('layouts.login')
        @yield('content')
        @include('layouts.footer')
    </div>
    @include('layouts.script')
</body>

@yield('onlypagescript')

</html>
