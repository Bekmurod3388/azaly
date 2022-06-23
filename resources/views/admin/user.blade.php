<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <script src="{{asset('/asset/js/plugin/webfont/webfont.min.js')}}"></script>
    <script>
        WebFont.load({
            google: {"families": ["Lato:300,400,700,900"]},
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['{{asset("/asset/css/fonts.min.css")}}']
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <link rel="stylesheet" href="{{asset('/asset/css/atlantis.min.css')}}">
    <style>
        .navbar-brand{
            font-size: 2rem;
        }
        .nav-link{
            font-size: 1rem!important;
        }
    </style>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-xl navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand text-black" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <i class="fa fa-bars" aria-hidden="true"></i>
{{--                    <span class="navbar-toggler-icon"></span>--}}
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    @can('role-list')
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}"
                               class="nav-link {{  request()->routeIs('admin.users.index') ? 'text-primary' : 'text-black' }}">
{{--                                <i class="menu-icon tf-icons fas fa-users"></i>--}}
                                <div data-i18n="Analytics">Foydalanuvchilar</div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.roles.index') }}"
                               class="nav-link {{  request()->routeIs('admin.roles.index') ? 'text-primary' : 'text-black' }}">
{{--                                <i class="menu-icon tf-icons fas fa-user-shield"></i>--}}
                                <div data-i18n="Analytics">Rollarni boshqarish</div>
                            </a>
                        </li>
                    @endcan
                    @can('category-list')
                        <li class="nav-item">
                            <a href="{{ route('admin.categories.index') }}"
                               class="nav-link {{  request()->routeIs('admin.categories.index') ? 'text-primary' : 'text-black' }}">
{{--                                <i class="menu-icon tf-icons fas fa-users"></i>--}}
                                <div data-i18n="Analytics">Kategoriyalar</div>
                            </a>
                        </li>
                    @endcan
                    @can('category-list')
                        <li class="nav-item">
                            <a href="{{ route('admin.sizes.index') }}"
                               class="nav-link {{  request()->routeIs('admin.sizes.index') ? 'text-primary' : 'text-black' }}">
{{--                                <i class="menu-icon tf-icons fas fa-users"></i>--}}
                                <div data-i18n="Analytics">O'lchamlar</div>
                            </a>
                        </li>
                    @endcan
                    @can('category-list')
                        <li class="nav-item">
                            <a href="{{ route('admin.warehouses.index') }}"
                               class="nav-link {{  request()->routeIs('admin.warehouses.index') ? 'text-primary' : 'text-black' }}">
{{--                                <i class="menu-icon tf-icons fas fa-users"></i>--}}
                                <div data-i18n="Analytics">Omborxona</div>
                            </a>
                        </li>
                    @endcan
                    @can('category-list')
                        <li class="nav-item">
                            <a href="{{ route('admin.shelf.index') }}"
                               class="nav-link {{  request()->routeIs('admin.shelf.index') ? 'text-primary' : 'text-black' }}">
{{--                                <i class="menu-icon tf-icons fas fa-users"></i>--}}
                                <div data-i18n="Analytics">Tokchalar</div>
                            </a>
                        </li>
                    @endcan
                    @can('category-list')
                        <li class="nav-item">
                            <a href="{{ route('admin.products.index') }}"
                               class="nav-link {{  request()->routeIs('admin.products.index') ? 'text-primary' : 'text-black' }}">
{{--                                <i class="menu-icon tf-icons fas fa-users"></i>--}}
                                <div data-i18n="Analytics">Mahsulotlar</div>
                            </a>
                        </li>
                    @endcan
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-black" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-black" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Chiqish') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="container-xxl flex-grow-1 container-p-y mt-5">
        @yield('content')
    </main>
</div>

<script src="{{asset('/asset/js/core/jquery.3.2.1.min.js')}}"></script>
<script src="{{asset('/asset/js/plugin/sweetalert/sweetalert.min.js')}}"></script>
@yield('script')
</body>
</html>
