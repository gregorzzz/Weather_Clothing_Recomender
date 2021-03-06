<html lang="en">
<head>
    <title>Weathercaster</title>
    <script src="{{asset('js/app.js')}}"></script>
    <link href={{ asset('/css/app.css') }} rel="stylesheet">
</head>
<body class="bg-blue-200">
<div class="flex flex-wrap pb-2">
    <div class="w-full">
        <nav class="relative flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg bg-gray-800">
            <div class="container px-4 mx-auto flex flex-wrap items-center justify-between ">
                <div class="w-full relative flex justify-between lg:w-auto px-4 lg:static lg:block lg:justify-start">
                    <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-no-wrap uppercase text-white" href="{{route("home")}}" >
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
                            @if(Route::current())
                                @can('open-wardrobe')
                                    <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="{{route("wardrobe-index")}}">
                                        Wardrobe
                                    </a>
                                @endcan
                            @endif
                        </li>
                        <li class="nav-item">
                            @if (Route::has('login'))
                                @auth
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    this.closest('form').submit();" class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75">
                                            Logout
                                        </a>
                                    </form>
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
<div>
    @yield('createButton')
    @yield('content')
</div>
</body>
</html>
