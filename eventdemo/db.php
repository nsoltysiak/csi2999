<?php
	$servername = "localhost";
    	$username = "root";
    	$password = "Bellybelle97";
    	$dbname = "allen";
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
        	die("Connection failed: " . $conn->error);
    	} 
    	echo "Connection Successful <br>";

	$cname = mysqli_real_escape_string($conn, $_REQUEST['cname']);
	$ename = mysqli_real_escape_string($conn, $_REQUEST['ename']);
	$date = mysqli_real_escape_string($conn, $_REQUEST['date']);
	$description = mysqli_real_escape_string($conn, $_REQUEST['description']);

	$sql = "INSERT INTO events(date, cname, ename, description) VALUES " .
                "('$date','$cname', '$ename', '$description')";	

	
	if ($conn->query($sql) === TRUE) 
	{
        echo "Club Name: " . $_GET['cname'] . "<br>";
    	echo "Event Name: " . $_GET['ename'] . "<br>";
        echo "Date: " . $_GET['date'] . "<br>";
        echo "Description: " . $_GET['description'] . "<br>";
        echo "Record Inserted <br>";
        } 
	else 
	{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
?>
