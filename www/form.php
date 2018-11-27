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

<?php
	$servername = "localhost";
    	$username = "mauricefuentes";
    	$password = "E1i9s0Z5";
    	$dbname = "mauricefuentes";
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
        	die("Connection failed: " . $conn->error);
    	}
    	echo "Connection Successful <br>";

    $myVar3 = $_REQUEST['idNC'];
    
    $query = "SELECT * FROM clubs WHERE id='$myVar3'";
    $resultID = mysqli_query($conn, $query);

    if ($resultID->num_rows != 0) {
        while ($rows = $resultID->fetch_assoc()) {
            $cname1 = $rows['clubname'];
        }
    }





	$cname = $cname1;
	$ename = mysqli_real_escape_string($conn, $_REQUEST['ename']);
	$date = mysqli_real_escape_string($conn, $_REQUEST['date']);
	$description = mysqli_real_escape_string($conn, $_REQUEST['description']);

	$sql = "INSERT INTO events(date, cname, ename, description) VALUES " .
                "('$date','$cname', '$ename', '$description')";	

	
	//if ($conn->query($sql) === TRUE) 
	//{
        //echo "my var: $myVar3";
        //echo "my var: " . $_REQUEST['idNC'] . ".";
        //echo "<p>Club Name: " . $_GET['cname'] . "<br>";
    	//echo "Event Name: " . $_GET['ename'] . "<br>";
        //echo "Date: " . $_GET['date'] . "<br>";
        //echo "Description: " . $_GET['description'] . "<br>";
        //echo "Record Inserted <br></p>";
        //header('location: eventTable.php');
        //} 
	//else 
	//{
            //echo "Error: " . $sql . "<br>" . $conn->error;
        //}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Event Entry</title>
    <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
    <!--
    <style>
        input,
        select {
            width: 30%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        input[type=submit],
        {
            width: 30%;
            background-color: green;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        input[type=submit]:hover {
            background-color: #45a049;
        }
        
        input[type=reset]:hover {
            background-color: #45a049;
        }
        
        div {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
    </style>
-->
</head>

<body>
    
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    
    
    <div style="position:fixed; width:100%;" data-role="header">
        <button onclick="location.href='favorites.php'">&#8656;</button>
        <h1>Create new Club</h1>
    </div>
    
    
    <br>
    <br>
    <br>
    
    
    <form action="form.php" data-ajax="false" method="get">
        <?php include('errors.php'); ?>
        <div class="input-group">
            <br>Event Name:
            <input type="text" name="ename" size="30">
        </div>
        <div class="input-group">
            <br> Event Date:
            <input type="text" name="date" size="20">
        </div>
        <div class="input-group">
            <br> Description:
            <input type="text" name="description" size="200">
            <br>
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="new_event">Save Event</button>
            <input type="reset" value="Clear Data Fields">
            </div>
    </form>    
</body>

</html>