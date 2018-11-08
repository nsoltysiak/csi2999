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
        <button onclick="location.href='home_page.php'">&#8656;</button>
        <h1>Welcome</h1>
    </div>
<div class="header">
</div>
<div class="content">
  
    
    <?php
    //connect to database
    $mysqli = mysqli_connect('localhost', 'mauricefuentes', 'E1i9s0Z5', 'mauricefuentes');
    
    $myVar = $_REQUEST['id'];
    
    $query = "SELECT * FROM clubs WHERE id='$myVar'";
    $resultID = mysqli_query($mysqli, $query);
    
    if ($resultID->num_rows != 0) {
        while ($rows = $resultID->fetch_assoc()) {
            $presidentf = $rows['presidentfirst'];
            $presidentl = $rows['presidentlast'];
            $presidente = $rows['presidentemail'];
            $clubname = $rows['clubname'];
            $description = $rows['clubdescription'];
            $id = $rows['id'];
            
            echo "<h1 style='text-align:center;'>$clubname</h1>";
            echo "<h2 style='margin: 0px 10px 0px 10px;'>Club Description:</h2>";
            echo "<br>";
            echo "<p style='margin: 0px 10px 0px 10px;'>$description</p>";
            echo "<br>";
            echo "<h3 style='margin: 0px 10px 0px 10px;'>Officers:</h2>";
            echo "<p style='margin: 0px 10px 0px 10px;'>President: $presidentf $presidentl</p>";
            echo "<p style='margin: 0px 10px 0px 10px;'>Email: $presidente</p>";
            echo "<br>";
            echo "<h2 style='margin: 0px 10px 0px 10px;'>Events</h2>";
        }
    } else {
        echo "No results";
    }
    
    
    
    
    ?>
    
    
</div>
</body>
</html>