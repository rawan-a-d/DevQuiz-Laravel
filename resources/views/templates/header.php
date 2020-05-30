
<!-- Common css links(navbar, footer) -->
<link rel="stylesheet" type="text/css" href="css/navbar.css">
<link rel="stylesheet" type="text/css" href="css/footer.css">
<link rel="icon" type="image/png" href="img/logo.png" />
</head>
<body>
<!-- Navbar -->
<nav>
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="profile">Profile</a></li>
        <!-- If user is admin -->
        <?php
        if (isset($_SESSION['admin'])){
            if($_SESSION['admin'] == 1)
            { ?>
                <li><a href="views/admin/users.php">Admin</a></li>
                <?php
            }
        }
        ?>
        <li><a href="aboutus">About us</a></li>
        <li><a href="contact">Contact</a></li>
        <li id="logout"><a href="logout">Log out</a></li>
    </ul>
</nav>
