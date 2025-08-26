<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Шрифты -->
    <link rel="dns-prefetch" href="//fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet" />

    <!-- Стиль -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
</head>
<body>
    <div id="app">
        <!-- Навигация -->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="{{ __('Переключить навигацию') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Левая часть -->
                    <ul class="navbar-nav me-auto"></ul>

                    <!-- Правая часть -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class='nav-item'>
                                    <a class='nav-link' href='{{ route("login") }}'>{{ __('Войти') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class='nav-item'>
                                    <a class='nav-link' href='{{ route("register") }}'>{{ __('Регистрация') }}</a>
                                </li>
                            @endif
                        @else
                            <li class='nav-item dropdown'>
                                <a id='navbarDropdown' class='nav-link dropdown-toggle' href='#' role='button'
                                   data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false' v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class='dropdown-menu dropdown-menu-end' aria-labelledby='navbarDropdown'>
                                    <a class='dropdown-item' href='{{ route("logout") }}'
                                       onclick='event.preventDefault(); document.getElementById("logout-form").submit();'>
                                        {{ __('Выйти') }}
                                    </a>
                                    <form id='logout-form' action='{{ route("logout") }}' method='POST' class='d-none'>
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Основной контент -->
        <main class='py-4'>
            @yield('content')
        </main>

        <!-- Футер -->
        <footer style='margin-top: 20px; padding: 10px; background-color: #f1f1f1;'>
            @yield('footer')
        </footer>
    </div>

    <!-- Скрипты -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>