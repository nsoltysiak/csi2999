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
    $errors = array(); 

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
        	die("Connection failed: " . $conn->error);
    	}
    	//echo "Connection Successful <br>";

    $cname1 = null;
    $myVar3 = $_REQUEST['id'];
    
    $query = "SELECT * FROM clubs WHERE id='$myVar3'";
    $resultID = mysqli_query($conn, $query);

    if ($resultID->num_rows != 0) {
        while ($rows = $resultID->fetch_assoc()) {
            $cname1 = $rows['clubname'];
            //echo "club: $cname1";
        }
    }

/*
function createNewEvent($cname1) {
    
    $cname = $cname1;
    echo "test: $cname1";
    echo "<script type='text/javascript'>alert('$cname1');</script>";
    $ename = mysqli_real_escape_string($conn, $_POST['ename']);
    $edate = mysqli_real_escape_string($conn, $_POST['date']);
    $edescription = mysqli_real_escape_string($conn, $_POST['description']);
	
    if (empty($ename)) { array_push($errors, "field is required"); }
    if (empty($edate)) { array_push($errors, "field is required"); }
    if (empty($edescription)) { array_push($errors, "field is required"); }
    
    if (count($errors) == 0) {

	   $sql = "INSERT INTO events(date, cname, ename, description) VALUES " .
                "('$edate','$cname1', '$ename', '$edescription')";	
    
        mysqli_query($conn, $sql);
        
        header('location: favorites.php');
    } 
}
*/

if (isset($_POST['new_event'])) {

    $cname = mysqli_real_escape_string($conn, $_POST['cname']);
    $ename = mysqli_real_escape_string($conn, $_POST['ename']);
    $edate = mysqli_real_escape_string($conn, $_POST['date']);
    $etime = mysqli_real_escape_string($conn, $_POST['time']);
    $elocation = mysqli_real_escape_string($conn, $_POST['location']);
    $edescription = mysqli_real_escape_string($conn, $_POST['description']);
	
    if (empty($ename)) { array_push($errors, "name is required"); }
    if (empty($edate)) { array_push($errors, "date is required"); }
    if (empty($etime)) { array_push($errors, "time is required"); }
	if (empty($elocation)) { array_push($errors, "location is required"); }
    if (empty($edescription)) { array_push($errors, "description is required"); }
    
    if (count($errors) == 0) {

	   $sql = "INSERT INTO events(date, time, elocation, cname, ename, description) VALUES " .
                "('$edate','$etime','$elocation', '$cname', '$ename', '$edescription')";	
    
        mysqli_query($conn, $sql);
        
        header('location: favorites.php');
    } 
    
}
	
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
    <link rel="stylesheet" type="text/css" href="style.css">
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
        <button onclick="history.back()">&#8656;</button>
        <h1>Create new Event</h1>
    </div>
    <br>
    
    <form action="form.php" data-ajax="false" method="post" id="events">
        <?php include('errors.php'); ?>
        <div class="input-group">
            
            <input type="hidden" name="cname" value="<?php echo htmlspecialchars($cname1); ?>" size="30" readonly>
        </div>
        <div class="input-group">
            <br>Event Name:
            <input type="text" name="ename" size="30">
        </div>
        <div class="input-group">
            <br> Event Date:
            <input type="date" name="date" id="date" size="20" placeholder="0000-00-00" required>
        </div>
        <div class="input-group">
            <br> Event Time:
            <input type="time" name="time" id="time" size="20" placeholder="00:00:00" required>
        </div>
	<div class="input-group">
            <br> Event Location:
            <input type="text" name="location" size="30" required>
        </div>
        <div class="input-group">
            <br> Description:
            <textarea name="description" cols="55"></textarea>
            <!--
            <input type="text" name="description" size="200">
            -->
            <br>
        </div>
        <div class="input-group">
            <button type="submit" class="btn" onclick=checkTheDate() name="new_event">Save Event</button>
            <input type="reset" value="Clear Data Fields">
            </div>
    </form>    
    
    <script>
        function checkTheDate() {
            var today = new Date();
            var input = document.getElementById("date").value;
            input = new Date(input);
            if (input < today) {
                alert("Date has passed. Please enter a valid date.");
                document.getElementById("events").reset();
                return false;
            } 
        }

    </script>
    
</body>

</html>