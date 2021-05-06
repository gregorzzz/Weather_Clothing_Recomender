
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weathercaster</title>
   <link href={{ asset('/css/app.css') }} rel="stylesheet">
    <script src="https://rawgithub.com/darkskyapp/skycons/master/skycons.js" defer></script>

   <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="bg-blue-200">
<div class="flex flex-wrap pb-2">
    <div class="w-full">
        <nav class="relative flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg bg-gray-800">
            <div class="container px-4 mx-auto flex flex-wrap items-center justify-between ">
                <div class="w-full relative flex justify-between lg:w-auto px-4 lg:static lg:block lg:justify-start">
                    <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-no-wrap uppercase text-white" >
                        Weathercaster
                    </a>
                    <button class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none" type="button">
                        <span class="block relative w-6 h-px rounded-sm bg-white"></span>
                        <span class="block relative w-6 h-px rounded-sm bg-white mt-1"></span>
                        <span class="block relative w-6 h-px rounded-sm bg-white mt-1"></span>
                    </button>
                </div>
                <div class="flex lg:flex-grow items-center" id="example-navbar-info">
                    <ul class="flex flex-col lg:flex-row list-none ml-auto">
                        <li class="nav-item">
                            <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="{{route("wardrobe-index")}}">
                                Wardrobe
                            </a>
                        </li>
                        <li class="nav-item">
                            @if(Route::current())
                                @can('edit-product')
                                    <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="{{route("pages.create")}}">
                                        Create
                                    </a>
                                @endcan
                            @endif
                        </li>
                        <li class="nav-item">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="px-3 py-2 text-xs text-white inline-flex items-center uppercase font-bold leading-snug ">Login</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="px-3 py-2 text-xs text-white inline-flex items-center uppercase font-bold leading-snug">Register</a>
                                    @endif
                                @endauth
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<div id="app" class="flex justify-center pt-16">
    <weather-comp></weather-comp>
</div>
</body>
</html>
