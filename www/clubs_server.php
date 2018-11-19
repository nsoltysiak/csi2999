<?php
session_start();

// initializing variables
$firstname = "";
$lastname = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'mauricefuentes', 'E1i9s0Z5', 'mauricefuentes');

if (isset($_POST['reg_club'])) {
  $clubname = mysqli_real_escape_string($db, $_POST['clubname']);
  $clubdescription = mysqli_real_escape_string($db, $_POST['clubdescription']);
  $presidentfirst = mysqli_real_escape_string($db, $_POST['presidentfirst']);
  $presidentlast = mysqli_real_escape_string($db, $_POST['presidentlast']);
  $presidentemail = mysqli_real_escape_string($db, $_POST['presidentemail']);
  $owner = $_SESSION['email'];

  if (empty($clubname)) { array_push($errors, "Club name is required"); }
  if (empty($clubdescription)) { array_push($errors, "Club description is required"); } 
  if (empty($presidentfirst)) { array_push($errors, "First name is required"); }
  if (empty($presidentlast)) { array_push($errors, "Last name is required"); }
  if (empty($presidentemail)) { array_push($errors, "Email is required"); }
    
  if (count($errors) == 0) {
    $query = "INSERT INTO clubs (clubname, clubdescription, presidentfirst, presidentlast, presidentemail, owner) 
  			  VALUES('$clubname', '$clubdescription', '$presidentfirst', '$presidentlast', '$presidentemail', '$owner')";
  	mysqli_query($db, $query);
      header('location: home_page.php');
  }
}