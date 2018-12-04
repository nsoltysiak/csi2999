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
    
    <div style="position:fixed; width:100%;" data-role="header">
        <button onclick="location.href='home_page.php'">&#8656;</button>
        <h1>Oakland University</h1>
    </div>
<div class="header">
</div>
<div style="z-index:-1; margin-top:70px;" class="content">
  
    
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
            
            $vpresidentf = $rows['vpresidentfirst'];
            $vpresidentl = $rows['vpresidentlast'];
            $vpresidente = $rows['vpresidentemail'];
            
            $treasurerf = $rows['treasurerfirst'];
            $treasurerl = $rows['treasurerlast'];
            $treasurere = $rows['treasureremail'];
            
            $advisorf = $rows['advisorfirst'];
            $advisorl = $rows['advisorlast'];
            $advisore = $rows['advisoremail'];
            
            $secretaryf = $rows['secretaryfirst'];
            $secretaryl = $rows['secretarylast'];
            $secretarye = $rows['secretaryemail'];
            
            $mtime = $rows['mtime'];
            $mdays = $rows['mdays'];
            $mlocation = $rows['mlocation'];
            
            $flink = $rows['facebooklink'];
            $sprocess = $rows['selectionprocess'];
            $myself = $_SESSION['email'];
            
            $id = $rows['id'];
            
            if ($rows['image'] === "") {
                echo "<p style='text-align:center;'><img width='100' height='100' src='club_default1.png' align='middle' alt='Default Picture'></p>";
            }
            echo "<h1 style='text-align:center;'>$clubname</h1>";
            
            //favorites button here
            //echo "<div class='clubs'><button onclick=\"location.href=''\">Add to Favorites</button></div>";
            
            
            
            $resultSet11 = $mysqli->query("SELECT * FROM user_favorites WHERE fav_club ='$clubname'");
    
            if ($resultSet11->num_rows != 0) {
                while ($rows = $resultSet11->fetch_assoc()) {
                    $the_club = $rows['fav_club'];
                    $the_user = $rows['user_email'];
            
                    if (($clubname == $the_club)&&($myself == $the_user)) {
                        echo "<p style='text-align:center; color: #FACC2E'>This is club is in your favorites!</p>";
                        echo "<form method=\"post\" data-ajax=\"false\" action=\"fav_server.php\">";
                        echo "<input type=\"hidden\" name=\"did\" value=\"$id\" size=\"30\" readonly>";
                        echo "<input type=\"hidden\" name=\"dcname\" value=\"$clubname\" size=\"30\" readonly>";
                        echo "<button type=\"submit\" class=\"btn\" name=\"delete_fav\">Delete from Favorites</button></form>";
                    }
                }
            } else {
                
                echo "<form method=\"post\" data-ajax=\"false\" action=\"fav_server.php\">";
                echo "<input type=\"hidden\" name=\"id\" value=\"$id\" size=\"30\" readonly>";
                echo "<input type=\"hidden\" name=\"cname\" value=\"$clubname\" size=\"30\" readonly>";
                echo "<button type=\"submit\" class=\"btn\" name=\"add_fav\">Add to Favorites</button></form>";
            }
                
            echo "<br>";
        
            
            echo "<h2 style='margin: 0px 10px 0px 10px;'>Club Description:</h2>";
            
            
            
            echo "<br>";
            echo "<p style='margin: 0px 10px 0px 10px;'>$description</p>";
            echo "<br>";
            echo "<h3 style='margin: 0px 10px 0px 10px;'>Officers:</h2>";
            
            echo "<p style='margin: 0px 10px 0px 10px;'>President: $presidentf $presidentl</p>";
            echo "<p style='margin: 0px 10px 0px 10px;'>Email: $presidente</p>";
            echo "<br>";
            
            echo "<p style='margin: 0px 10px 0px 10px;'>Vice President: $vpresidentf $vpresidentl</p>";
            echo "<p style='margin: 0px 10px 0px 10px;'>Email: $vpresidente</p>";
            echo "<br>";
            
            echo "<p style='margin: 0px 10px 0px 10px;'>Treasurer: $treasurerf $treasurerl</p>";
            echo "<p style='margin: 0px 10px 0px 10px;'>Email: $treasurere</p>";
            echo "<br>";
            
            echo "<p style='margin: 0px 10px 0px 10px;'>Secretary: $secretaryf $secretaryl</p>";
            echo "<p style='margin: 0px 10px 0px 10px;'>Email: $secretarye</p>";
            echo "<br>";
            
            echo "<p style='margin: 0px 10px 0px 10px;'>Advisor: $advisorf $advisorl</p>";
            echo "<p style='margin: 0px 10px 0px 10px;'>Email: $advisore</p>";
            echo "<br>";
            
            echo "<h3 style='margin: 0px 10px 0px 10px;'>Meetings:</h2>";
            
            echo "<p style='margin: 0px 10px 0px 10px;'>Time: $mtime</p>";
            echo "<p style='margin: 0px 10px 0px 10px;'>Days: $mdays</p>";
            echo "<p style='margin: 0px 10px 0px 10px;'>Location: $mlocation</p>";
            echo "<br><br>";
            
            echo "<h2 style='margin: 0px 10px 0px 10px;'>Events</h2>";
            
            $query1 = "SELECT * FROM events WHERE cname ='$clubname'";
            $resultID1 = mysqli_query($mysqli, $query1);
            
            if ($resultID1->num_rows > 0) {
    
                while($row = $resultID1->fetch_assoc()) {
    
                    echo "<h3 style='margin-left: 10px; margin-right: 10px;'>" . $row["ename"] . "</h3>";
                    echo "<h4 style='margin-top:-15px; margin-left: 10px; margin-right: 10px;'>" . $row["cname"] . "</h4>";
                    echo "<h5 style='margin-top:-15px; margin-left: 10px; margin-right: 10px;'>" . $row["date"] . "</h5>";
                    echo "<p style='margin-top:-15px; margin-left: 10px; margin-right: 10px;'>" . $row["description"] . "</p>";
                }
            } else {
                echo "<p style='text-align:center;'>No Event Found</p> <br>";
            }
            
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
