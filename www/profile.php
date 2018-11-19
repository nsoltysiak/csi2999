<?php 
  session_start(); 

  if (!isset($_SESSION['email'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
    die();
  }

  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['email']);
  	header("location: login.php");
  }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    
    <style>
        #a, #b {
            display: none;
        }
        
        #footer {
            position:absolute;
            bottom: 0;
            width: 100%;
        } 
    
    </style>
    
    
</head>
<body class="main_body">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    
    
    
    <div style="position:fixed; width:100%;" data-role="header">

        <h1>Profile</h1>
    </div>

    
<div class="header">
</div>
<div style="z-index:-1; margin-top:70px;" class="content">

    
    
    <?php
    //connect to database
    $mysqli = mysqli_connect('localhost', 'mauricefuentes', 'E1i9s0Z5', 'mauricefuentes');
    
    $email = $_SESSION['email'];
    //query the database
    $resultSet = $mysqli->query("SELECT * FROM users WHERE email='$email'");
    
    //count the returned rows
    if ($resultSet->num_rows != 0) {
        while ($rows = $resultSet->fetch_assoc()) {
            $user_first = $rows['firstname'];
            $user_last = $rows['lastname'];
            if ($rows['image'] === "") {
                echo "<p style='text-align:center;'><img width='100' height='100' src='default.png' align='middle' alt='Default Picture'></p>";
            }
            echo "<h3 style='text-align:center;'>$user_first $user_last</h3>";
        }
    } else {
        echo "No results";
    }
    
    ?>
    
</div>
    <br>
    <?php  if (isset($_SESSION['email'])) : ?>
    	<p class="logout"> <a href="home_page.php?logout='1'" style="color: red; padding:10px; background-color: pink;">logout</a> </p>
    <?php endif ?>
    
    <br>
    <br>
    <div data-role="navbar" style="position:fixed; width:100%; bottom:0;">
            <ul>
                <li><a href="home_page.php" data-href="a">Clubs</a></li>
                <li><a href="profile.php" data-href="b">Profile</a></li>
                <li><a href="favorites.php" data-href="b">Favorites</a></li>
            </ul>
        </div><!-- /navbar -->
    
    
</body>
</html>