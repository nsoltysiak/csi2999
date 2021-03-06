

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
        <button onclick="history.back()">&#8656;</button>
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
            echo "<br>";
            echo "<br>";
            echo "<h2 style='margin: 0px 10px 0px 10px;'>Events</h2>";
            
            $query1 = "SELECT * FROM events WHERE cname ='$clubname'";
            $resultID1 = mysqli_query($mysqli2, $query1);
            
            if ($resultID1->num_rows > 0) {
    
                while($row = $resultID1->fetch_assoc()) {
    
                    echo "<h3 style='margin-left: 10px; margin-right: 10px;'>" . $row["ename"] . "</h3>";
                    echo "<h4 style='margin-top:-15px; margin-left: 10px; margin-right: 10px;'>" . $row["cname"] . "</h4>";
                    echo "<h5 style='margin-top:-15px; margin-left: 10px; margin-right: 10px;'>" . $row["date"] . "</h5>";
                    echo "<p style='margin-top:-15px; margin-left: 10px; margin-right: 10px;'>" . $row["description"] . "</p>";
                }
            } else {
                echo "<p style='text-align:center;'>No Event Found</p>";
            }
            
        }
    } else {
        echo "No results";
    }
    
    
    
    
    
    //query the database
    $resultSetNC = $mysqli2->query("SELECT * FROM clubs WHERE id='$myVar2'");
    
    //count the returned rows
    if ($resultSetNC->num_rows != 0) {
        while ($rows = $resultSetNC->fetch_assoc()) {
            $clubname = $rows['clubname'];
            $idNC = $rows['id'];
            
            echo "<div class='clubs'><button style=\"color: white; background-color:#585858;\" onclick=\"location.href='form.php?id=$idNC'\">Create New Event</button></div><br><br>";
        }
    } else {
        echo "No results";
    }
    
    ?>
    
    
    
</div>
    

    
</body>
    
</html>