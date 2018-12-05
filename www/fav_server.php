<?php
session_start();

// initializing variables
$firstname = "";
$lastname = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'mauricefuentes', 'E1i9s0Z5', 'mauricefuentes');

if (isset($_POST['add_fav'])) {
    $clubname = mysqli_real_escape_string($db, $_POST['cname']);
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $owner = $_SESSION['email'];

    if (empty($clubname)) { array_push($errors, "Club name is required"); }
    
    $resultSet1 = $db->query("SELECT * FROM user_favorites");
    
    if ($resultSet1->num_rows != 0) {
        while ($rows = $resultSet1->fetch_assoc()) {
            $fav_club = $rows['fav_club'];
            $user_email = $rows['user_email'];
            
            if (($clubname == $fav_club)&&($owner == $user_email)) {
                array_push($errors, "It is already in your favorites!");
            }  
        }
    }
    
    
  if (count($errors) == 0) {
                $query9 = "INSERT INTO user_favorites (user_email, fav_club, club_id) 
  			  VALUES('$owner', '$clubname', '$id')";
  	mysqli_query($db, $query9);
      header('location: home_page.php');
  } else {
      header('location: home_page.php');
                }
}

if (isset($_POST['delete_fav'])) {
    $clubname = mysqli_real_escape_string($db, $_POST['dcname']);
    $id = mysqli_real_escape_string($db, $_POST['did']);
    $myself1 = $_SESSION['email'];
    
    $resultSet12 = $db->query("DELETE FROM user_favorites WHERE fav_club='$clubname' AND user_email='$myself1'");
    header('location: home_page.php');
}