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
        <h1>Login</h1>
    </div>
    
    <img class="login_logo" src="logo.png" align="center">

  <form method="post" data-ajax="false" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Email:</label>
  		<input type="text" name="email" pattern="[a-z0-9._%+-]+@oakland.edu$" placeholder="Enter a valid oakland.edu email" required >
  	</div>
  	<div class="input-group">
  		<label>Password:</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? 
  	</p>
      <button onclick="location.href='register.php'">Sign up</button>
  </form>
</body>
</html>