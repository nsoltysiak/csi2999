<?php
session_start();

// initializing variables
$firstname = "";
$lastname = "";
$email    = "";
$date = "";
$time = "";
$location = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'mauricefuentes', 'E1i9s0Z5', 'mauricefuentes');

if (isset($_POST['reg_club'])) {
  $clubname = mysqli_real_escape_string($db, $_POST['clubname']);
  $clubdescription = mysqli_real_escape_string($db, $_POST['clubdescription']);
  $presidentfirst = mysqli_real_escape_string($db, $_POST['presidentfirst']);
  $presidentlast = mysqli_real_escape_string($db, $_POST['presidentlast']);
  $presidentemail = mysqli_real_escape_string($db, $_POST['presidentemail']);
  $vicepresidentfirst = mysqli_real_escape_string($db, $_POST['vicepresidentfirst']);
  $vicepresidentlast = mysqli_real_escape_string($db, $_POST['vicepresidentlast']);
  $vicepresidentemail = mysqli_real_escape_string($db, $_POST['vicepresidentemail']);
  $treasurerfirst = mysqli_real_escape_string($db, $_POST['treasurerfirst']);
  $treasurerlast = mysqli_real_escape_string($db, $_POST['treasurerlast']);
  $treasureremail = mysqli_real_escape_string($db, $_POST['treasureremail']);
  $secretaryfirst = mysqli_real_escape_string($db, $_POST['secretaryfirst']);
  $secretarylast = mysqli_real_escape_string($db, $_POST['secretarylast']);
  $secretaryemail = mysqli_real_escape_string($db, $_POST['secretaryemail']);
  $advisorfirst = mysqli_real_escape_string($db, $_POST['advisorfirst']);
  $advisorlast = mysqli_real_escape_string($db, $_POST['advisorlast']);
  $advisoremail = mysqli_real_escape_string($db, $_POST['advisoremail']);
  $meetingday = mysqli_real_escape_string($db, $_POST['meetingday']);
  $meetingtime = mysqli_real_escape_string($db, $_POST['meetingtime']);
  $meetingloc = mysqli_real_escape_string($db, $_POST['meetingloc']);
  $facebook = mysqli_real_escape_string($db, $_POST['facebook']);
  $selectionpro = mysqli_real_escape_string($db, $_POST['selectionpro']);
  
  
  
  if (empty($clubname)) { array_push($errors, "Club name is required"); }
  if (empty($clubdescription)) { array_push($errors, "Club description is required"); } 
  if (empty($presidentfirst)) { array_push($errors, "First name is required"); }
  if (empty($presidentlast)) { array_push($errors, "Last name is required"); }
  if (empty($presidentemail)) { array_push($errors, "Email is required"); }
  if (empty($vicepresidentfirst)) { array_push($errors, "First name is required"); }
  if (empty($vicepresidentlast)) { array_push($errors, "Last is required"); }
  if (empty($vicepresidentemail)) { array_push($errors, "Email is required"); }
  if (empty($treasurerfirst)) { array_push($errors, "First name is required"); }
  if (empty($treasurerlast)) { array_push($errors, "Last name is required"); }
  if (empty($treasureremail)) { array_push($errors, "Email is required"); }
  if (empty($secretaryfirst)) { array_push($errors, "First name is required"); }
  if (empty($secretarylast)) { array_push($errors, "Last name is required"); }
  if (empty($secretaryemail)) { array_push($errors, "Email is required"); }
  if (empty($advisorfirst)) { array_push($errors, "First name is required"); }
  if (empty($advisorlast)) { array_push($errors, "Last name is required"); }
  if (empty($advisoremail)) { array_push($errors, "Email is required"); }
  if (empty($meetingday)) { array_push($errors, "Day is required"); }
  if (empty($meetingtime)) { array_push($errors, "Time is required"); }
  if (empty($meetingloc)) { array_push($errors, "Location is required"); }
  
  
  if (count($errors) == 0) {
    $query = "INSERT INTO clubs (clubname, clubdescription, presidentfirst, presidentlast, presidentemail, vicepresidentfirst, 
    vicepresidentlast, vicepresidentemail, treasurerfirst, treasurerlast, treasureremail, secretaryfirst, secretarylast, secretaryemail,
    advisorfirst, advisorlast, advisoremail, meetingday, meetingtime, meetingloc, facebook, selectionpro) 
  			  VALUES('$clubname', '$clubdescription', '$presidentfirst', '$presidentlast', '$presidentemail', '$vicepresidentfirst', '$vicepresidentlast', 'vicepresidentemail',
          '$treasurerfirst', '$treasurerlast', '$treasureremail', '$secretaryfirst', '$secretarylast', '$secretaryemail', '$advisorfirst', '$advisorlast', 'advisoremail', 
          '$meetingday', '$meetingtime', '$meetingloc', '$facebook', '$selectionpro')";
  	mysqli_query($db, $query);
      header('location: home_page.php');
  }
}
