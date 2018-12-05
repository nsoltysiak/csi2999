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
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <!--
    <script type="text/javascript" src="sort-table.js"></script>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

    </style>
-->
</head>

<body>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    
    
    <div style="position:fixed; width:100%;" data-role="header">
        
        <h1>Upcoming Events</h1>
    </div>
    
    <div style="z-index:-1; margin-top:70px; margin-left: 15px; margin-right: 15px;" class="content">
    
    
    <h2 style="text-align:center;"> List of Events </h2>
        <p style="text-align:center; font-size:12px;">these are the upcoming events in Oakland University</p>
    <?php
$servername = "localhost"; // Will typically be localhost since PHP and MySQL
// will be running on the same server
$username = "mauricefuentes"; // Your username
$password = "E1i9s0Z5"; // Your password
$dbname = "mauricefuentes"; // Your database name
$email = $_SESSION['email'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
        
$resultSet = $conn->query("SELECT * FROM user_favorites WHERE user_email LIKE '$email'");
if ($resultSet->num_rows != 0) {
        while ($rows = $resultSet->fetch_assoc()) {
            $clubname = $rows['fav_club'];
        }
}

// Control reaching here means thread is not dead -- successful connection
//echo "Connected successfully <br>";
$sql = "SELECT * FROM events";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    
while($row = $result->fetch_assoc()) {
    
    echo "<div style=\"color: black; background-color:#E6E6E6; padding: 1px 8px 1px 8px; border: 1px solid gray; border-radius: 15px;\">";
    echo "<h2>" . $row["ename"] . "</h2>";
    echo "<h3 style='margin-top:-15px;'>By: " . $row["cname"] . "</h3>";
    echo "<p style='margin-top:-15px;'>" . $row["description"] . "</p>";
    echo "<h4 style='margin-top:-5px;'>Day: " . $row["date"] . "</h4>";
    echo "<h4 style='margin-top:-15px;'>Time: " . $row["time"] . "</h4>";
    echo "<h4 style='margin-top:-15px;'>Location: " . $row["elocation"] . "</h4>";
    echo "</div>";
    echo "<br>";
}
    
} else {
echo "No Event Records Found. <br>";
}
$conn->close();
?>
    
    </div>
    <br>
    <br>
    <br>
    <br>
    <div data-role="navbar" data-theme="a" style="position:fixed; width:100%; bottom:0;">
            <ul>
                
                <li><button style="color: white; background-color:#585858;" onclick="location.href='home_page.php'" data-icon="home" data-iconpos="top" data-role="button" data-theme="a">OU Clubs</button></li>
                <li><button style="color: white; background-color:#585858;" onclick="location.href='profile.php'" data-icon="gear" data-iconpos="top" data-theme="a">Profile</button></li>
                <li><button style="color: white; background-color:#585858;" onclick="location.href='favorites.php'" data-icon="star" data-iconpos="top" data-theme="a">My Clubs</button></li>
                <li><button style="color: white; background-color:#585858;" onclick="location.href='eventTable.php'" data-icon="grid" data-iconpos="top" data-theme="a">Events</button></li>
            </ul>
        </div><!-- /navbar -->
    
</body>

</html>
