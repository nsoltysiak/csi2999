<?php

    session_start();

    $server = "localhost"; 
    $userName = "mauricefuentes"; 
    $pass = "E1i9s0Z5"; 
    $db = "mauricefuentes";

    //create connection
    $con=mysqli_connect($server,$userName,$pass,$db); 
    // Check connection
    if (mysqli_connect_errno()) { 
        echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
    }
    
    if (isset($_POST['login_btn'])) {
        $email = mysql_real_escape_string($_POST['email']);
        $password = mysql_real_escape_string($_POST['password']);
        
        $password = md5($password);
        $db = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($con, $db);
        
        if (mysqli_num_rows($result) == 1) {
            $_SESSION['message'] = "You are now loggeged in";
            $_SESSION['email'] = $email;
            header("location: home.php");
        } else {
            $_SESSION['message'] = "Email/password combination incorrect";
        }
    }

?>

<!DOCTYPE html>
<html>

<head>
    <title>Login | OU Clubs</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div data-role="header">
            <h1 style="text-align: center;">
                OU CLUBS
            </h1>
        </div>
    
    <div class="header">
        <h1 style="text-align:center;">Login</h1>
    </div>

   
    
    <form method="post" action="login.php">
        <table align="center" width="90%">
            <tr>
                <td>OU Email:</td>
            </tr>
            <tr>
                <td><input type="email" name="email" class="textInput" pattern="[a-z0-9._%+-]+@oakland.edu$" placeholder="Enter a valid Oakland.edu email" required></td>
            </tr>
            <tr>
                <td>Password:</td>
                </tr>
            <tr>
                <td><input type="password" name="password" class="textInput" required></td>
            </tr>
            <tr>
                <td><input type="submit" name="login_btn" value="login"></td>
            </tr>
            <tr>
                
            <td>Dont have an account?</td>
            <tr>
                <td>
            <a href="register.php"><button>Create an Account</button></a>
            </td>
            </tr>
            <tr>
                <td>
            <a href="index.html"><button>Go Back</button></a>
            </td>
            </tr>
        </table>
    </form>
</body>

</html>
