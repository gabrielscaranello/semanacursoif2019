<!DOCTYPE html>
<html lang="pt-br">
@include('layouts.head')



<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="classy-load"></div>
    </div>
    <div id="app">
      @include('layouts.header')
      @yield('content')
      @include('layouts.footer')
    </div>
</body>
@include('layouts.script')
@yield('onlypagescript')

</html>
