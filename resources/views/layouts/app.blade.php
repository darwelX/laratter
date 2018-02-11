<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laratter') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="{{ mix('css/app.css')}}">
    <!-- <link href="{{ asset('css/main.css') }}" rel="stylesheet"> -->
</head>
<body>
    <div id="app" class="container">

    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
        <div class="container">
            <!-- Branding Image -->
            <a class="navbar-brand brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laratter') }}
            </a>                

            <div class="collapse navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <form action="/messages">
                        <div class="input-group">
                            <input type="text" name="query" id="query" class="form-control" required placeholder="{{trans('app.search')}}...">
                            <span class="input-group-btn">
                                <button class="btn btn-outline-success">@lang('app.search')</button>
                            </span>
                        </div>
                    </form>
                </li>
            </ul>
            
            <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown mr-3">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            ({{App::getLocale()}})&nbsp;Language<span class="caret"></span>
                        </a>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/locale?lang=es">
                                Español
                            </a>
                            <a class="dropdown-item" href="/locale?lang=en">
                                English
                            </a>
                        </div>
                    </li>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Sign In</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Sign Up</a></li>
                @else
                    <li class="nav-item dropdown mr-2">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            Notificaciones <span class="caret"></span>
                        </button>
                        <notifications :user="{{ Auth::user()->id }}"></notifications>                      
                    </li>    

                    <li class="nav-item dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                Salir
                            </a>
                            <!-- <div class="dropdown-divider"></div> -->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
            </div>
        </div>
    </nav> 

        @yield('content')
    </div>

    <!-- Scripts -->
    <!-- <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script> -->
    <script src="{{ mix('js/app.js')}}"></script>
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
</body>
</html>
