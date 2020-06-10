<?php
session_start();

// Unset all of the session variables.
unset($_SESSION['userId']);
unset($_SESSION['username']);
unset($_SESSION['remember_me']);
// Finally, destroy the session.
session_destroy();

/* Create URL */
//returns the current url
$url = $_SERVER['REQUEST_URI'];
// Seperate it to array using the /


// Include URL for Login page to login again.
header("Location: views/login");
?>
