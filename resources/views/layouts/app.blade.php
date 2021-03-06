<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/051b5a9bc6.js"></script>



</head>

<body>

    <!-- --------------------------------------------------------------- -->
    <!-- -----------------------   Header ------------------------------ -->
    <!-- --------------------------------------------------------------- -->
    <div class="header">
        <div>

            <h2 onclick="toggleNav()">=</h2>
            <h1>استراحة</h1>

            <nav class="desktop_nav">
                <a href="{{ route('home-index') }}">الرئيسية</a>

                @guest
                <a href="{{ route('login') }}" class="login">تسجيل الدخول</a>
                @else
                @if (Auth::user()->role_id == 2)
                <a href="{{route('owner-myhomes')}}">مساكني</a>
                @endif
                <a href="javascript:;" class="login" onmouseover="showMenu()"
                    onblur="hideMenu()">{{ Auth::user()->name }}<span class="caret"></span></a>
                <div id="dropdown_header">
                    <a href="{{route('owner-myhomes')}}">حسابي</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">تسجيل الخروج</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                @endguest




            </nav>
            <nav id="mobile_nav" class="hidden">
                <a href="{{ route('home-index') }}">الرئيسية</a>
                <a href="{{ route('login') }}" class="login">تسجيل الدخول</a>

        </div>
    </div>




    @yield('content')


    <script>
        function showMenu() {
                let menu = document.getElementById("dropdown_header");

                menu.style.display = "block";

            }


            function hideMenu() {

                    let menu = document.getElementById("dropdown_header");
                    menu.style.display = "none";

            }
            function toggleNav() {
                let a = document.getElementById("mobile_nav");
                if (a.classList.contains("hidden")) {
                    a.classList.remove("hidden");
                } else {
                    a.classList.add("hidden");

                }
            }

    </script>
</body>

</html>