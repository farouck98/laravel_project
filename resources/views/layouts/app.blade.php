<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Script concernant le javascript pour afficher le formulaire de réponse à un autre
     commentaire -->
    @yield('extra-js')


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-success shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

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
                            {{-- A moins que les notifactions de l'untilisateur connecté
                            soit vide on affiche le menu--}}
                            @unless( auth()->user()->unreadNotifications->isEmpty() )
                            <li class="nav-item dropdown d-flex">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ auth()->user()->unreadNotifications->count() }} notification(s)
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @foreach(auth()->user()->unreadNotifications as $notification)
                                        <a href="{{ route('topics.showFromNotification', ['topic' => $notification->data['topicId'], 'notification' => $notification->id]) }}" class="dropdown-item" >{{ $notification ->data['username'] }} a posté un commentaire sur <strong>{{ $notification ->data['topicTitle'] }}</strong></a>
                                    @endforeach

                                </div>
                                @endunless


                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->pseudo }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    {{-- Seul l'administrateur verra ce menu pour la liste des utilisateurs et des catégories--}}
                                    @can('manage-users')<a class="dropdown-item" href="{{ route('admin.users.index') }}" >Liste des utilisateurs</a>@endcan
                                   <a class="dropdown-item" href="{{ route('categories.index') }}" >Liste des catégories</a>
                                    <a class="dropdown-item" href="{{ route('topics.create') }}" >Créer un Sujet</a>
                                    <a class="dropdown-item" href="{{ route('home') }}" >Dashboard</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
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

        <main class="py-4" >
            @yield('content')
        </main>
    </div>
    @yield('textarea-js')
</body>
<footer></footer>
</html>
