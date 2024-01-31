<!DOCTYPE html>
<html lang="en">
@include('Frontend.Layout.head')

<body>
    <div>
        <!-- NAVBAR START  -->
        @include('Frontend.Layout.header')
        <!-- NAVBAR END  -->

        <!-- CONTENT START  -->
        @yield('content')
        <!-- CONTENT END  -->

        <!-- FOOTER START  -->
        @include('Frontend.Layout.footer')
        <!-- FOOTER END  -->
    </div>

</body>

</html>