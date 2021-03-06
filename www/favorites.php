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
    
    <div style="position:fixed; width:100%; z-index:1;" data-role="header">

        <h1>Clubs</h1>
        <button onclick="location.href='newclub.php'">New</button>
    </div>

    
<div class="header">
</div>
<div style="z-index:-1; margin-top:70px;" class="content">

    <h2 style="text-align:center;">Clubs you Favorited</h2>
    
    <?php
    //connect to database
    $mysqli3 = mysqli_connect('localhost', 'mauricefuentes', 'E1i9s0Z5', 'mauricefuentes');
    
    $email = $_SESSION['email'];
    
    //query the database
    $resultSet3 = $mysqli3->query("SELECT * FROM user_favorites WHERE user_email LIKE '$email'");
    
    //count the returned rows
    if ($resultSet3->num_rows != 0) {
        while ($rows = $resultSet3->fetch_assoc()) {
            $clubname = $rows['fav_club'];
            $id = $rows['club_id'];
            
            
            
            echo "<div class='clubs'><button style=\"color: black; background-color:#D8D8D8;\" onclick=\"location.href='clubpage.php?id=$id'\">$clubname</button></div>";
            
            
            
        }
    } else {
        echo "<p style='margin-left:15px; margin-right:15px; text-align:center;'>No results. But you can Search for clubs to add to your favorites</p>";
    }
    
    ?>
    
    <br>
    <br>
    <h2 style="text-align:center;">Clubs you Created</h2>
    
    <?php
    //connect to database
    $mysqli = mysqli_connect('localhost', 'mauricefuentes', 'E1i9s0Z5', 'mauricefuentes');
    
    $email = $_SESSION['email'];
    
    //query the database
    $resultSet = $mysqli->query("SELECT * FROM clubs WHERE owner LIKE '$email'");
    
    //count the returned rows
    if ($resultSet->num_rows != 0) {
        while ($rows = $resultSet->fetch_assoc()) {
            $clubname = $rows['clubname'];
            $id = $rows['id'];
            
            echo "<div class='clubs'><button style=\"color: black; background-color:#D8D8D8;\" onclick=\"location.href='users_club.php?id=$id'\">$clubname</button></div>";
            
            
            
        }
    } else {
        echo "<p style='margin-left:15px; margin-right:15px; text-align:center;'>No results. But you can create a new Club</p>";
    }
    
    //turn the results into an array
    
    
    //display the results
    
    
    ?>
    
</div>
    
    <br>
    <br>
    <br>
    <br>
    <div data-role="navbar" style="position:fixed; width:100%; bottom:0;">
            <ul>
                
                <li><button style="color: white; background-color:#585858;" onclick="location.href='home_page.php'" data-icon="home" data-iconpos="top" data-role="button" data-theme="a">OU Clubs</button></li>
                <li><button style="color: white; background-color:#585858;" onclick="location.href='profile.php'" data-icon="gear" data-iconpos="top" data-theme="a">Profile</button></li>
                <li><button style="color: white; background-color:#585858;" onclick="location.href='favorites.php'" data-icon="star" data-iconpos="top" data-theme="a">My Clubs</button></li>
                <li><button style="color: white; background-color:#585858;" onclick="location.href='eventTable.php'" data-icon="grid" data-iconpos="top" data-theme="a">Events</button></li>
            </ul>
        </div><!-- /navbar -->
    
    
</body>
</html>