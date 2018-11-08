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
        
        <h1>Search</h1>
        <button onclick="location.href='newclub.php'">New</button>
    </div>
<div class="header">
</div>
<div class="content">
    
<?php
    
    $output= NULL;
    
    if(isset($_POST['submit'])) {
        //connect to database
        $mysqli = mysqli_connect('localhost', 'mauricefuentes', 'E1i9s0Z5', 'mauricefuentes');
        
        $search = $mysqli->real_escape_string($_POST['search']); 
        //query database
        $resultSet = $mysqli->query("SELECT * FROM clubs WHERE clubname LIKE '%$search%'");
        
        if($resultSet->num_rows > 0) {  
            $output .= "<p style='margin-left:10px;'>Search results:</p>";
            while($rows = $resultSet->fetch_assoc()) 
            {
                $club_name = $rows['clubname'];
                $output .= "<div class='clubs'><button>$club_name</button></div>";
            }
        } else {
            $output = "no results";
        }
    }
    
    ?>
    
    
    <form method="post">
        <input type="text" name="search"/>
        <input type="submit" name="submit" value="Search"/>
     </form>
    
    
    <?php echo $output; ?>
    
    </div>
    <br>
    
</body>
</html>