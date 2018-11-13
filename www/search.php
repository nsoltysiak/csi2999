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
        
        <h1>Search</h1>
        <button onclick="location.href='newclub.php'">New</button>
    </div>
<div class="header">
</div>
<div style="z-index:-1; margin-top:70px;" class="content">
    
<?php
    
    $output= NULL;
    
    if(isset($_POST['submit'])) {
        //connect to database
        $mysqli = mysqli_connect('localhost', 'mauricefuentes', 'E1i9s0Z5', 'mauricefuentes');
        
        $search = $mysqli->real_escape_string($_POST['search']); 
        //query database
        $resultSet = $mysqli->query("SELECT * FROM clubs WHERE clubname LIKE '%$search%'");
        
        if($resultSet->num_rows > 0) {  
            $output .= "<h2 style='margin-left:30px;'>Search results:</h2>";
            while($rows = $resultSet->fetch_assoc()) 
            {
                $club_name = $rows['clubname'];
                $club_id = $rows['id'];
                $output .= "<div class='clubs'><a href='clubpage.php?id=$club_id'><button>$club_name</button></a></div>";
            }
        } else {
            $output = "no results";
        }
    }
    
    ?>
    
    
    <form method="post" data-ajax="false">
        <input type="text" name="search"/>
        <input type="submit" name="submit" value="Search"/>
     </form>
    
    
    <?php echo $output; ?>
    
    </div>
    
    <br>
    <br>
    <div data-role="navbar" style="position:fixed; width:100%; bottom:0;">
            <ul>
                <li><a href="home_page.php" data-href="a">Clubs</a></li>
                <li><a href="search.php" data-href="b">Search</a></li>
                <li><a href="profile.php" data-href="b">Profile</a></li>
            </ul>
        </div><!-- /navbar -->
    
</body>
</html>