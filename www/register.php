<?php include('server.php') ?>
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
        <h1>Register</h1>
    </div>

  <form method="post" data-ajax="false" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>First Name:</label>
  	  <input type="text" name="firstname">
  	</div>
    <div class="input-group">
  	<label>Last Name:</label>
  	<input type="text" name="lastname">
  	</div>
  	<div class="input-group">
  	  <label>Email:</label>
  	  <input type="email" name="email" pattern="[a-z0-9._%+-]+@oakland.edu$" placeholder="Enter a valid Oakland.edu email" required >
  	</div>
  	<div class="input-group">
  	  <label>Password:</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password:</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>