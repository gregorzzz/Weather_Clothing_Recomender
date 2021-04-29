<html lang="en">
<head>
    <title>Weathercaster</title>
    <script src="{{asset('js/app.js')}}"></script>
    <link href={{ asset('/css/app.css') }} rel="stylesheet">
</head>
<body class="bg-blue-200">
<div class="container flex flex-wrap">
    @yield('create')
    @yield('content')
</div>
</body>
</html>
