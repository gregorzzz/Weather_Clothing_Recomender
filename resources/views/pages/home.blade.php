<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather app</title>

    <link href={{ asset('/css/app.css') }} rel="stylesheet">
    <script src="https://rawgithub.com/darkskyapp/skycons/master/skycons.js" defer></script>

    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="bg-blue-200">
<div id="app" class="flex justify-center pt-16">
    <weather-comp></weather-comp>
</div>
</body>
</html>
