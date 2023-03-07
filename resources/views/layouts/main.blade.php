<!doctype html>
<html lang="en">
@include('layouts.head')


<body>

    @yield('content')
    @include('layouts.footer')
    @include('layouts.scripts')

</body>
@include('sweetalert::alert')

</html>
