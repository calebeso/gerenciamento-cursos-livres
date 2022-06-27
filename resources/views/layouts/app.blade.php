<!doctype html>
<html lang="pt-br">
<head>
    @include('partials.head')
</head>
<body>
    <div class="wrapper d-flex align-items-stretch">
            @include('partials.sidebar')

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">

             @include('partials.navbar')

             @yield('content')
        </div>
    </div>
    @include('partials.javascript')
</body>

</html>