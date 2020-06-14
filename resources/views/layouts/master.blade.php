
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="/css/@yield('css').css">
</head>
    <!-- Include header -->
    @include('templates.header')
<body>
    <div id="content">
        @yield('content')
    </div>

    <!-- Include footer -->
{{--    @include('templates.footer')--}}
    </body>
</html>
