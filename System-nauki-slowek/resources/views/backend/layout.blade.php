<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Nauka słówek </title>
    <link rel="shortcut icon" href="{{ asset('icon1.png') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        h1, h2, h3, h4, h5, h6
        {
            margin: 4px;
        }
        table, th, td
        {
            text-align: center;
            border: 1px solid white;
            margin: 4px;
            color: rgb(0, 191, 255);;
            background-color: rgba(33, 37, 41, 0.9);
        }
        .btn
        {
            margin-left: 2px;
            margin-right: 2px;
        }
        img
        {
            width: 200px;
            height: 200px;
            margin-left: 10px;
            margin-right: 10px;
        }
        

        
    </style>
    <style>
        h1, h2, h3, h4, h5, h6, #results
        {
            margin: 4px;
            color: rgb(0, 191, 255);
        }
        h1
        {
            margin: 4px;
            color: white;
        }
        p
        {
            color:white;
        }
        #title
        {
            margin: 4px;
            color: rgb(0, 191, 255);
        }
        .btn
        {
            margin-left: 2px;
            margin-right: 2px;
        }
        img
        {
            width: 200px;
            height: 200px;
            margin-left: 10px;
            margin-right: 10px;
        }
        h2
        {
            text-align: center;
        }
        .categories, .subcategories
        {
            border: 1px solid black;
            width:250px;
            height: 320px;
            box-shadow: 0 0 20px 2px grey;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
            border-radius: 10px 10px;
            background-color: rgba(33, 37, 41, 0.9);
        }

        label
        {
            font-size: 60px;
            color: rgb(0, 191, 255);
        }
        .test
        {
            border: 1px solid black;
            text-align:center;
            box-shadow: 0 0 20px 2px grey;
            width:250px;
            height: 220px;
            margin-bottom: 20px;
            background-color: rgba(33, 37, 41, 0.9);
            
        }
        #check
        {
            margin-top: 5px;
            width:250px;
        }
        .words, .results, .learning, .checking, .options, .sets, .notReady
        {
            border: 1px solid black;
             border-radius: 10px 10px;
            box-shadow: 0 0 20px 2px grey;
            background-color: rgba(33, 37, 41, 0.9);
            margin-bottom: 10px;
        }
        footer
        {
            position:absolute;
		    bottom:0;
		    width:100%;
		    height:30px;		
		    background-color: grey;
            background-color: rgba(33, 37, 41, 0.9);
            box-shadow: 0 0 20px 2px grey;
        }
        body
        {
            background-image: url("http://coty.pl/wp-content/uploads/2015/09/T%C5%82o.png");
        }
        .form-control
    {
        background-color: silver;
    }
    input, select, textarea
    {
        background-color: silver;
    }
    </style>
    <script>
    $(document).ready(function()
    {
        $('img').mouseenter(function(){
            $(this).css('box-shadow', '0 0 20px 2px red');
        });
        $('img').mouseleave(function(){
            $(this).css('box-shadow', '0 0 0 0 blue');
        });

    });
    </script>
   
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-dark bg-dark navbar-expand-md navbar-inverse navbar-laravel">
            <div class="container">
    
             

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                            
                        @else
                        @if(App\User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
                        <div class="dropdown">
                            
                        <button class="btn btn-info dropdown-toggle" type="button" id="dropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Użytkownicy
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropDown">
                                <a class="dropdown-item"  href="{{ action( 'UsersController@index' ) }}"> Wyświetl listę </a>
                                <a class="dropdown-item"  href="{{ action( 'UsersController@create' ) }}"> Dodaj </a>
                            </div>

                        </div>
                        @endif
                        <!--@if(App\User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
                        <div class="dropdown">
                            
                        <button class="btn btn=secondary dropdown-toggle" type="button" id="dropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Role
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropDown">
                                <a class="dropdown-item"  href="{{ action( 'RolesController@index' ) }}"> Wyświetl listę </a>
                                <a class="dropdown-item"  href="{{ action( 'RolesController@create' ) }}"> Dodaj </a>
                            </div>

                        </div>
                        @endif -->
                        @if(App\User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
                        <div class="dropdown">
                            
                            <button class="btn btn-info dropdown-toggle" type="button" id="dropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Kategorie
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropDown">
                                <a class="dropdown-item"  href="{{ action( 'CategoriesController@index' ) }}"> Wyświetl listę </a>
                                <a class="dropdown-item"  href="{{ action( 'CategoriesController@create' ) }}"> Dodaj </a>
                            </div>

                        </div>
                        @endif
                        @if(App\User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
                        <div class="dropdown">
                            
                            <button class="btn btn-info dropdown-toggle" type="button" id="dropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Podkategorie
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropDown">
                                <a class="dropdown-item"  href="{{ action( 'SubcategoriesController@index' ) }}"> Wyświetl listę </a>
                                <a class="dropdown-item"  href="{{ action( 'SubcategoriesController@create' ) }}"> Dodaj </a>
                            </div>

                        </div>
                        @endif
                        <!--
                        @if(App\User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
                        <div class="dropdown">
                            
                            <button class="btn btn=secondary dropdown-toggle" type="button" id="dropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Język
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropDown">
                                <a class="dropdown-item"  href="{{ action( 'LanguagesController@index' ) }}"> Wyświetl listę </a>
                                <a class="dropdown-item"  href="{{ action( 'LanguagesController@create' ) }}"> Dodaj </a>
                            </div>

                        </div>

                        @endif
                        -->
                        @if(App\User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0||
                        App\User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 2],])->count() != 0 ||
                        App\User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 3],])->count() != 0)
                        <div class="dropdown">
                            
                            <button class="btn btn-info dropdown-toggle" type="button" id="dropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Zestawy
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropDown">
                                <a class="dropdown-item"  href="{{ action( 'SetsController@index' ) }}"> Wyświetl listę </a>
                                <a class="dropdown-item"  href="{{ action( 'SetsController@create' ) }}"> Dodaj </a>
                            </div>

                        </div>
                        @endif
                        <!--
                        @if(App\User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
                        <div class="dropdown">
                            
                            <button class="btn btn=secondary dropdown-toggle" type="button" id="dropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Wyniki
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropDown">
                                <a class="dropdown-item" href="{{ action( 'ResultsController@index' ) }}"> Wyświetl listę </a>
                                <a class="dropdown-item"  href="{{ action( 'ResultsController@create' ) }}"> Dodaj </a>
                            </div>

                        </div>
                        @endif
                        -->
                        @if(App\User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
                        <div class="dropdown">
                            
                            <button class="btn btn-info dropdown-toggle" type="button" id="dropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Redaktorzy
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropDown">
                                <a class="dropdown-item"  href="{{ action( 'EditorsController@index' ) }}"> Wyświetl listę </a>
                                <a class="dropdown-item"  href="{{ action( 'EditorsController@create' ) }}"> Dodaj </a>
                            </div>

                        </div>
                        
                            <li class="nav-item">
                                <a class="btn btn-danger" href="{{ route( 'showTrash' ) }}">Smietnik</a>
                            </li>
                            @endif
                        @if(App\User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0||
                        App\User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 2],])->count() != 0 ||
                        App\User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 3],])->count() != 0
                        )
                            <li class="nav-item">
                                <a class="btn btn-info" href="{{ route( 'showResultsUser') }}">FrontEnd</a>
                            </li>
                        @endif
                            
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        <main class="py-4">
        <div class="container">
            @yield('content')
            </div>
        </main>
    </div>
    
</body>
</html>
