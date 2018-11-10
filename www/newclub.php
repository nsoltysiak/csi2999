<?php include('clubs_server.php') ?>

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
  <title>OU Clubs</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    
    <div data-role="header">
        <button onclick="location.href='home_page.php'">&#8656;</button>
        <h1>Create new Club</h1>
    </div>

  <form method="post" action="newclub.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Club Name:</label>
  	  <input type="text" name="clubname" value="">
  	</div>
   <div class="input-group">
  	<label>Club Description:</label>
  	<textarea name="clubdescription" cols="55"></textarea>
  	</div>
      
  	<div class="input-group">
  	  <label>President's First Name:</label>
  	  <input type="text" name="presidentfirst" value="">
  	</div>
  	<div class="input-group">
  	  <label>President's Last Name:</label>
  	  <input type="text" name="presidentlast" value="">
  	</div>
      <div class="input-group">
  	  <label>President's Email:</label>
  	  <input type="email" name="presidentemail" value="">
  	</div> 
      
      <div class="input-group">
  	  <label>Vice President's First Name:</label>
  	  <input type="text" name="vicepresidentfirst" value="">
  	</div> 
      <div class="input-group">
  	  <label>Vice President's Last Name:</label>
  	  <input type="text" name="viepresidentlast" value="">
  	</div> 
      <div class="input-group">
  	  <label> Vice President's Email:</label>
  	  <input type="email" name="vicepresidentemail" value="">
  	</div> 
      
      <div class="input-group">
  	  <label>Treasurer's First Name:</label>
  	  <input type="text" name="treasurerfirst" value="">
  	</div>
       <div class="input-group">
  	  <label>Treasurer's Last Name:</label>
  	  <input type="text" name="treasurerlast" value="">
  	</div> 
      <div class="input-group">
  	  <label>Treasurer's Email:</label>
  	  <input type="email" name="treasureremail" value="">
  	</div> 
      
      <div class="input-group">
  	  <label>Secretary's First Name:</label>
  	  <input type="text" name="secretaryfirst" value="">
  	</div>
     <div class="input-group">
  	  <label>Secretary's Last Name:</label>
  	  <input type="text" name="secretarylast" value="">
  	</div> 
      <div class="input-group">
  	  <label>Secretary's Email:</label>
  	  <input type="email" name="secretaryemail" value="">
  	</div>
      
       <div class="input-group">
  	  <label>Advisor's First Name:</label>
  	  <input type="text" name="advisorfirst" value="">
  	</div> 
      <div class="input-group">
  	  <label>Advisor's Last Name:</label>
  	  <input type="text" name="advisorlast" value="">
  	</div> 
      <div class="input-group">
  	  <label>Advisor's Email:</label>
  	  <input type="email" name="advisoremail" value="">
  	</div>
      
       <div class="input-group">
  	  <label>Meeting Days:</label>
  	  <input type="text" name="meetingday" value="">
  	</div> 
      <div class="input-group">
  	  <label>Meeting Time:</label>
  	  <input type="text" name="meetingtime" value="">
  	</div> 
      <div class="input-group">
  	  <label>Meeting Location:</label>
  	  <input type="text" name="meetingloc" value="">
  	</div>
      
      <div class="input-group">
  	  <label>Facebook Link:</label>
  	  <input type="url" name="facebook" value="">
  	</div>
      
      <div class="input-group">
  	<label>Selection Process:</label>
  	<textarea name="selectionpro" cols="55"></textarea>
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_club">Create new Club</button>
  	</div>
  </form>
    
   
</body>
</html>
