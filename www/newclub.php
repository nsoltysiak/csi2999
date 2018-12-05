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
    <style>
        #a, #b {
            display: none;
        }
        
        #footer {
            position:absolute;
            bottom: 0;
            width: 100%;
        } 
    
    </style>
</head>
<body>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    
    <div style="position:fixed; width:100%;" data-role="header">
        <button onclick="history.back()">&#8656;</button>
        <h1>Create new Club</h1>
    </div>
    <br>
    <br>
    <br>
  <form method="post" data-ajax="false" action="newclub.php">
  	<?php include('errors.php'); ?>
      
      <h2 style="text-align:center;">About the Club</h2>
      
  	<div class="input-group">
  	  <label>Club Name:</label>
  	  <input type="text" name="clubname" value="">
  	</div>
    <div class="input-group">
  	<label>Club Description:</label>
  	<textarea name="clubdescription" cols="55"></textarea>
  	</div>
      
      <br>
      <h2 style="text-align:center;">About the Officers</h2>
      <h3>President</h3>
      
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
      
      <h3>Vice President</h3>
      
     <div class="input-group">
  	  <label>Vice President's First Name:</label>
  	  <input type="text" name="vpresidentfirst" value="">
  	</div> 
      <div class="input-group">
  	  <label>Vice President's Last Name:</label>
  	  <input type="text" name="vpresidentlast" value="">
  	</div> 
      <div class="input-group">
  	  <label> Vice President's Email:</label>
  	  <input type="email" name="vpresidentemail" value="">
  	</div> 
      
      <h3>Treasurer</h3>
      
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
      
      <h3>Secretary</h3>
      
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
      
      <h3>Advisor</h3>
      
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
      
      <br>
      <h2 style="text-align:center;">About the Meetings</h2>
      
       <div class="input-group">
  	  <label>Meeting Days:</label>
  	  <input type="text" name="mdays" value="">
  	</div> 
      <div class="input-group">
  	  <label>Meeting Time:</label>
  	  <input type="text" name="mtime" value="">
  	</div> 
      <div class="input-group">
  	  <label>Meeting Location:</label>
  	  <input type="text" name="mlocation" value="">
      </div>
      
      <br>
      <h2 style="text-align:center">Other Useful Information</h2>
      
      <div class="input-group">
  	  <label>Facebook Link:</label>
  	  <input type="url" name="facebooklink" value="">
  	</div>
      <div class="input-group">
  	<label>Selection Process:</label>
  	<textarea name="selectionprocess" cols="55"></textarea>
  	</div>
      <br>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_club">Create new Club</button>
  	</div>
  </form>
    
    <br>
    <br>
    <br>
   
</body>
</html>