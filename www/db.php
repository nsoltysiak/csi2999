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
            echo "$cname1";
            
            
            
            
        }
    }

	$cname = $cname1;
	$ename = mysqli_real_escape_string($conn, $_REQUEST['ename']);
	$date = mysqli_real_escape_string($conn, $_REQUEST['date']);
	$description = mysqli_real_escape_string($conn, $_REQUEST['description']);

	$sql = "INSERT INTO events(date, cname, ename, description) VALUES " .
                "('$date','$cname', '$ename', '$description')";	

	
	if ($conn->query($sql) === TRUE) 
	{
        echo "my var: $myVar3";
        echo "my var: " . $_REQUEST['idNC'] . ".";
        echo "<p>Club Name: " . $_GET['cname'] . "<br>";
    	echo "Event Name: " . $_GET['ename'] . "<br>";
        echo "Date: " . $_GET['date'] . "<br>";
        echo "Description: " . $_GET['description'] . "<br>";
        echo "Record Inserted <br></p>";
        //header('location: eventTable.php');
        } 
	else 
	{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
?>
