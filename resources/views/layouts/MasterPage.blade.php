<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSS for masterpage start here -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="icon" type="image/png" href="{{asset('storage/img/PHizzaHutLogo.jpg')}}"/>

    <!-- JS for masterpage start here -->
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet">

    <style>
        body{
            margin: 0;
            padding: 0;
            background-color:rgb(231, 99, 12);
        }
        .navbar-brand{
            color: rgb(231, 231, 22);
        }

        .NavbarText{
            font-size: 20px;
            color: white;
        }
        .navbar{
            background-color: rgba(114, 27, 27, 0.678); 
        }

    </style>

    {{-- Title page start here --}}
    <title>@yield('title')</title>

    {{-- css inline --}}
    @yield('css_masterpage')


</head>
<body>
    <nav class="navbar navbar-expand-lg d-flex flex-row justify-content-between">
        <div class="container">
            @guest
            {{-- --Untuk Guest-- --}}
            <a href="../" class="navbar-brand">
                <h1>TWORK</h1>
             </a>
            @else
            {{-- --Untuk Member-- --}}
            <a href="{{ '../home/'.Auth::user()->id }}" class="navbar-brand">
                <h1>TWORK</h1>
             </a>
            @endguest

            <nav class="navar d-flex flex-row">

                @guest
                {{-- --Untuk Guest-- --}}
                    <div class="p-2 bd-highlight">
                        <a href="{{ route('login') }}" class="NavbarText">Login</a>
                    </div>
                    <div class="p-2 bd-highlight">
                        <a href="{{ route('register') }}" class="NavbarText">Register</a>
                    </div>
                @else
                {{-- --Untuk Member-- --}}
                    <div class="nav-item dropdown">
                        <a class="NavbarText nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Group
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/creategroup">Create Group</a>
                        <a class="dropdown-item" href="/listgroup">View Group</a>
                        </div>
                    </div>
                    <div class="p-2 bd-highlight">
                        <a href="/myprofile/{{Auth::user()->id}}" class="NavbarText">My Profile</a>
                    </div>
                    <div class="p-2 bd-highlight">
                        <a href="/logout" class="NavbarText">Log Out</a>
                    </div>
                @endguest
                
            </nav>

        </div>
    </nav>

    {{-- Content Start Here --}}
    @yield('content_placeholder')

</body>
</html>