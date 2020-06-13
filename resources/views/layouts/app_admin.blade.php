<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Admin - @yield('title')</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/navbar.css') }}" />
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        @yield('css')
    </head>
    <body>
        <div class="container">
            <!-- Top Navbar -->
            <nav>
                <ul id="topnav" class="navbar">
                    <li class="topnav_item"><a href="{{route('users.index')}}">Dev Quiz Admin</a></li>
                    <!-- Display user name -->
                    <li class="dropdown topnav_item">
                        <button class="dropbtn">{{Auth::user()->name}}
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <!-- Link to profile and logout -->
                        <div class="dropdown-content">
                            <a href="{{route('profile.show', Auth::user()->id)}}">Profile</a>
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button id="logout">Logout</button>
                            </form>
                        </div>
                    </li>
                    <!-- Link to home page -->
                    <li class="topnav_item" id="home"><a href="{{route('home')}}">HOME SITE</a></li>
                </ul>
            </nav>
            <!-- Side navbar -->
            <div class="secondarynav">
                <nav role="navigation" class="menu">
                    <div class="overflow-container">
                        <ul class="menu-dropdown">
                            <!-- Quizzes -->
                            <li class="menu-hasdropdown {{ active('quizzes.index') }}">
                                <a href="{{route('quizzes.index')}}">Quizzes</a><span class="icon"><i class="fa fa-question"></i></span>

                                <label title="toggle menu" for="quizzes">
                                    <span class="downarrow"><i class="fa fa-caret-down"></i></span>
                                </label>
                                <input type="checkbox" class="sub-menu-checkbox" id="quizzes" />

                                <ul class="sub-menu-dropdown">
                                    <li class="quiz_item"><a href="{{route('quizzes.index')}}">View all quizzes</a></li>
                                    <li class="quiz_item"><a href="{{route('quizzes.create')}}">Add quiz</a></li>
                                </ul>
                            </li>
                            <!-- Users -->
                            <li class="menu-hasdropdown  {{ active('users.index') }}">
                                <a href="{{route('users.index')}}">Users</a><span class="icon"><i class="fa fa-users"></i></span>

                                <label title="toggle menu" for="users">
                                    <span class="downarrow"><i class="fa fa-caret-down"></i></span>
                                </label>
                                <input type="checkbox" class="sub-menu-checkbox" id="users" />

                                <ul class="sub-menu-dropdown">
                                    <li class="users_item"><a href="{{route('users.index')}}">View all users</a></li>
                                    <li class="users_item"><a href="{{route('users.create')}}">Add user</a></li>
                                </ul>
                            </li>
                            <!-- Messages -->
                            <li class="{{ active('messages.index') }}">
                                <a href="{{route('messages.index')}}">Messages</a><span class="icon"><i class="fa fa-envelope"></i></span>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div id="wrapper">
                <h1 id="page-header">
                    Welcome to admin
                </h1>

                @yield('content')

            </div>

        </div>

        <!-- JS -->
        <script type="text/javascript" src="admin/js/navbar.js"></script>

    </body>
</html>
