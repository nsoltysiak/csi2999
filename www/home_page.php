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
</head>
<body class="main_body">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    
    <div data-role="header">
        <button onclick="location.href='newclub.php'">New</button>
        <h1>Clubs</h1>
        <button onclick="location.href='search.php'">Search</button>
    </div>
<div class="header">
</div>
<div class="content">

    
    <p style="text-align:center;">List of clubs at OU:</p>
    
    <?php
    //connect to database
    $mysqli = mysqli_connect('localhost', 'mauricefuentes', 'E1i9s0Z5', 'mauricefuentes');
    
    //query the database
    $resultSet = $mysqli->query("SELECT * FROM clubs");
    
    //count the returned rows
    if ($resultSet->num_rows != 0) {
        while ($rows = $resultSet->fetch_assoc()) {
            $clubname = $rows['clubname'];
            $id = $rows['id'];
            echo "<div class='clubs'><a href='clubpage.php?id=$id'><button>$clubname</button></a></div>";
        }
    } else {
        echo "No results";
    }
    
    //turn the results into an array
    
    
    //display the results
    
    
    ?>
    
</div>
    <br>
    <?php  if (isset($_SESSION['email'])) : ?>
    	<p class="logout"> <a href="index.php?logout='1'" style="color: red; padding:10px; background-color: pink;">logout</a> </p>
    <?php endif ?>
    
</body>
</html>