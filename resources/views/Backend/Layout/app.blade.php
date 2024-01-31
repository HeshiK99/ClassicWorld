<!DOCTYPE html>
<html lang="en">
@include('Backend.Layout.head')

<body>
    <div>
        <!-- NAVBAR START  -->
        @include('Backend.Layout.header')
        <!-- NAVBAR END  -->

        <!-- CONTENT START  -->
        @yield('content')
        <!-- CONTENT END  -->

        <!-- FOOTER START  -->
        @include('Backend.Layout.footer')
        <!-- FOOTER END  -->
    </div>

</body>

</html>