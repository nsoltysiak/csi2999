<?php

    session_start();

   
?>        
        
<!DOCTYPE html>
<html>
    <head>
        <title>OU Clubs</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div data-role="header">
            <h1 style="text-align: center;">
                OU clubs
            </h1>
        </div>
        

        
        <h1 style="text-align:center">Home</h1>
        <div><h4 style="text-align:center">Welcome <?php echo $_SESSION['firstname']; ?></h4></div>
        <div><a href="logout.php">Logout</a></div>
    </body>
</html>