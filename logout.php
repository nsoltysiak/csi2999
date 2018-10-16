<?php
    session_start();
    session_destroy();
    unset($_SESSION['email']);
    $_SESSION['message'] = "you are now logged out";
    header("location: login.php");
?>