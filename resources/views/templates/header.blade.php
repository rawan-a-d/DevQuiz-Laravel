
<!-- Common css links(navbar, footer) -->
<link rel="stylesheet" type="text/css" href="/css/navbar.css">
<link rel="stylesheet" type="text/css" href="/css/footer.css">
<link rel="icon" type="image/png" href="img/logo.png" />
</head>
<body>
<!-- Navbar -->
<nav>
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/profile/{{Auth::user()->id}}">Profile</a></li>
        <!-- If user is admin -->
        @if(Auth::user()->isAdmin())
            <li><a href="{{route('users.index')}}">Admin</a></li>
        @endif
        <li><a href="/aboutus">About us</a></li>
        <li><a href="/contact">Contact</a></li>
        <li id="li_logout">
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button id="logout">Logout</button>
            </form>
        </li>
    </ul>
</nav>
