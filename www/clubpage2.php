

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
            position: fixed;
            bottom: 0;
            width: 100%;
        } 
        
        #topnav {
            position: fixed;
            width: 100%;
        }
    
    </style>
</head>
<body class="main_body">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    
    
<div class="header">
    <div style="position:fixed; width:100%;" data-role="header">
        <button onclick="location.href='favorites.php'">&#8656;</button>
        <h1>Oakland University</h1>
    </div>
    
</div>
<div style="z-index:-1; margin-top:70px;" class="content">
  
    
    <?php
    //connect to database
    $mysqli2 = mysqli_connect('localhost', 'mauricefuentes', 'E1i9s0Z5', 'mauricefuentes');
    
    $myVar2 = $_REQUEST['id'];
    
    $query2 = "SELECT * FROM clubs WHERE id='$myVar2'";
    $resultID2 = mysqli_query($mysqli2, $query2);
    
    if ($resultID2->num_rows != 0) {
        while ($rows = $resultID2->fetch_assoc()) {
            $presidentf = $rows['presidentfirst'];
            $presidentl = $rows['presidentlast'];
            $presidente = $rows['presidentemail'];
            $clubname = $rows['clubname'];
            $description = $rows['clubdescription'];
            $id = $rows['id'];
            
            if ($rows['image'] === "") {
                echo "<p style='text-align:center;'><img width='100' height='100' src='club_default1.png' align='middle' alt='Default Picture'></p>";
            }
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
    
    <br>
    <br>
    
</div>
    

    
</body>
    
</html>