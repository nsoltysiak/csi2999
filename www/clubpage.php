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
    
    <div style="position:fixed; width:100%; z-index:1;" data-role="header">
        <button onclick="history.back()">&#8656;</button>
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
            
            
            
            $resultSet11 = $mysqli->query("SELECT * FROM user_favorites WHERE fav_club ='$clubname' AND user_email = '$myself'");
    
            if ($resultSet11->num_rows != 0) {
                while ($rows = $resultSet11->fetch_assoc()) {
                    $the_club = $rows['fav_club'];
                    $the_user = $rows['user_email'];
            
                    if (($clubname == $the_club)&&($myself == $the_user)) {
                        
                        echo "<form method=\"post\" data-ajax=\"false\" action=\"fav_server.php\">";
                        echo "<input type=\"text\" name=\"did\" value=\"$id\" size=\"30\" readonly>";
                        echo "<input type=\"text\" name=\"dcname\" value=\"$clubname\" size=\"30\" readonly>";
                        echo "<div style=\"text-align:center;\">";
                        
                        
                        
                        echo"<p style=\"color:#848484; padding-right: 5px;\"><b>In your Favorites</b></p>";
                        
                        echo "<button style=\"margin-top: -10px; background-color:#F6D8CE;\" type=\"submit\" class=\"btn\" name=\"delete_fav\" data-icon=\"delete\" data-inline=\"true\" data-mini=\"true\">Remove</button></form>";
                        
                        echo "</div>";
                        break;
                    } else {
                        echo "<form method=\"post\" data-ajax=\"false\" action=\"fav_server.php\">";
                        echo "<input type=\"hidden\" name=\"id\" value=\"$id\" size=\"30\" readonly>";
                        echo "<input type=\"hidden\" name=\"cname\" value=\"$clubname\" size=\"30\" readonly>";
                        echo "<button style=\"color: white; background-color:#848484;\" type=\"submit\" class=\"btn\" name=\"add_fav\" data-icon=\"plus\" data-iconpos=\"right\">Add to Favorites</button></form>";
                    }
                }
            } else {
                echo "<form method=\"post\" data-ajax=\"false\" action=\"fav_server.php\">";
                echo "<input type=\"text\" name=\"id\" value=\"$id\" size=\"30\" readonly>";
                echo "<input type=\"text\" name=\"cname\" value=\"$clubname\" size=\"30\" readonly>";
                echo "<button style=\"color: white; background-color:#848484;\" type=\"submit\" class=\"btn\" name=\"add_fav\" data-icon=\"plus\" data-iconpos=\"right\">Add to Favorites</button></form>";
                
            }
                
            echo "<br>";
        
            
            echo "<div style=\"color: black; background-color:#E6E6E6; margin: 0px 10px 2px 10px; padding: 1px 8px 1px 8px; border: 1px solid gray; border-radius: 15px;\">";
            
            echo "<h2>Club Description:</h2>";
            
            
            
            //echo "<br>";
            echo "<p>$description</p>";
            
            
            
            echo "<h3>Officers:</h2>";
            
            echo "<p>President: $presidentf $presidentl<br>";
            echo "Email: $presidente</p>";
            
            echo "<p>Vice President: $vpresidentf $vpresidentl<br>";
            echo "Email: $vpresidente</p>";
            
            echo "<p>Treasurer: $treasurerf $treasurerl<br>";
            echo "Email: $treasurere</p>";
            
            echo "<p>Secretary: $secretaryf $secretaryl<br>";
            echo "Email: $secretarye</p>";
            
            echo "<p>Advisor: $advisorf $advisorl<br>";
            echo "Email: $advisore</p>";
            echo "</div>";
            echo "<br>";
            
            
            echo "<h3 style='text-align:center;'>Meetings:</h2>";
            
            echo "<p style='text-align:center;'><b>Time:</b> $mtime<br>";
            echo "<b>Days:</b> $mdays<br>";
            echo "<b>Location:</b> $mlocation</p>";
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