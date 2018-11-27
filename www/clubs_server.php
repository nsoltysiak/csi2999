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
  $vicepresidentfirst = mysqli_real_escape_string($db, $_POST['vpresidentfirst']);
  $vicepresidentlast = mysqli_real_escape_string($db, $_POST['vpresidentlast']);
  $vicepresidentemail = mysqli_real_escape_string($db, $_POST['vpresidentemail']);
  $treasurerfirst = mysqli_real_escape_string($db, $_POST['treasurerfirst']);
  $treasurerlast = mysqli_real_escape_string($db, $_POST['treasurerlast']);
  $treasureremail = mysqli_real_escape_string($db, $_POST['treasureremail']);
  $secretaryfirst = mysqli_real_escape_string($db, $_POST['secretaryfirst']);
  $secretarylast = mysqli_real_escape_string($db, $_POST['secretarylast']);
  $secretaryemail = mysqli_real_escape_string($db, $_POST['secretaryemail']);
  $advisorfirst = mysqli_real_escape_string($db, $_POST['advisorfirst']);
  $advisorlast = mysqli_real_escape_string($db, $_POST['advisorlast']);
  $advisoremail = mysqli_real_escape_string($db, $_POST['advisoremail']);
  $meetingday = mysqli_real_escape_string($db, $_POST['mdays']);
  $meetingtime = mysqli_real_escape_string($db, $_POST['mtime']);
  $meetingloc = mysqli_real_escape_string($db, $_POST['mlocation']);
  $facebook = mysqli_real_escape_string($db, $_POST['facebooklink']);
  $selectionpro = mysqli_real_escape_string($db, $_POST['selectionprocess']);

    

  if (empty($clubname)) { array_push($errors, "Club name is required"); }
  if (empty($clubdescription)) { array_push($errors, "Club description is required"); } 
  if (empty($presidentfirst)) { array_push($errors, "President's first name is required"); }
  if (empty($presidentlast)) { array_push($errors, "President's last name is required"); }
  if (empty($presidentemail)) { array_push($errors, "President's email is required"); }
  if (empty($vicepresidentfirst)) { array_push($errors, "Vice president's first name is required"); }
  if (empty($vicepresidentlast)) { array_push($errors, "Vice president's last name is required"); }
  if (empty($vicepresidentemail)) { array_push($errors, "Vice president's email is required"); }
  if (empty($treasurerfirst)) { array_push($errors, "Treasurer's first name is required"); }
  if (empty($treasurerlast)) { array_push($errors, "Treasurer's last name is required"); }
  if (empty($treasureremail)) { array_push($errors, "Treasurer's email is required"); }
  if (empty($secretaryfirst)) { array_push($errors, "Secretary's first name is required"); }
  if (empty($secretarylast)) { array_push($errors, "Secretary's last name is required"); }
  if (empty($secretaryemail)) { array_push($errors, "Secretary's email is required"); }
  if (empty($advisorfirst)) { array_push($errors, "Advisor's first name is required"); }
  if (empty($advisorlast)) { array_push($errors, "Advisor's last name is required"); }
  if (empty($advisoremail)) { array_push($errors, "Advisor's email is required"); }
  if (empty($meetingday)) { array_push($errors, "Day is required"); }
  if (empty($meetingtime)) { array_push($errors, "Time is required"); }
  if (empty($meetingloc)) { array_push($errors, "Location is required"); }

    
  if (count($errors) == 0) {
    $query = "INSERT INTO clubs (clubname, clubdescription, presidentfirst, presidentlast, presidentemail, owner, vpresidentfirst, 
    vpresidentlast, vpresidentemail, treasurerfirst, treasurerlast, treasureremail, secretaryfirst, secretarylast, secretaryemail,
    advisorfirst, advisorlast, advisoremail, mdays, mtime, mlocation, facebooklink, selectionprocess) 
  			  VALUES('$clubname', '$clubdescription', '$presidentfirst', '$presidentlast', '$presidentemail', '$owner', '$vicepresidentfirst', '$vicepresidentlast', '$vicepresidentemail', '$treasurerfirst', '$treasurerlast', '$treasureremail', '$secretaryfirst', '$secretarylast', '$secretaryemail', '$advisorfirst', '$advisorlast', '$advisoremail', 
          '$meetingday', '$meetingtime', '$meetingloc', '$facebook', '$selectionpro')";
  	mysqli_query($db, $query);
      header('location: home_page.php');
  }
}