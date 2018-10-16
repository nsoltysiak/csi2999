<?php

    session_start();

    $server = "localhost"; 
    $userName = "mauricefuentes"; 
    $pass = "E1i9s0Z5"; 
    $db = "mauricefuentes";

    $errors = array();

    //create connection
    $con=mysqli_connect($server,$userName,$pass,$db); 
    // Check connection
    if (mysqli_connect_errno()) { 
        echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
    }
    
    if (isset($_POST['register_btn'])) {
        $firstname = mysql_real_escape_string($_POST['firstname']);
        $lastname = mysql_real_escape_string($_POST['lastname']);
        $email = mysql_real_escape_string($_POST['email']);
        $password = mysql_real_escape_string($_POST['password']);
        $password2 = mysql_real_escape_string($_POST['password2']);

      

        
        
        $db = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($con, $db);
        
        if ($result == 1) {
            $_SESSION['message'] = "account already exists";
            $_SESSION['email'] = $email;
            header("location: register.php");
        } else {
            if ($password == $password2) {
            //create user
            $password = md5($password); //hash password before storing for security
            $db = "INSERT INTO users(firstname, lastname, email, password) VALUES('$firstname','$lastname', '$email', '$password')";
            mysqli_query($con, $db);
            
            $_SESSION['message'] = "you are logged in";
            $_SESSION['email'] = $email;
            header("location: home.php");
            
            //$_SESSION['message'] = "you are logged in";
            //$_SESSION['email'] = $email;
            //header("location: home.php"); //redirect to HP
        } else {
            //$_SESSION['message'] = "The two passwords do not match";
                print "Passwords do not match";
                
        }
    }
        }

        
        
   //     if ($password == $password2) {
            //create user
            //$password = md5($password); //hash password before //storing for security
            //$db = "INSERT INTO users(firstname, lastname, email, password) VALUES('$firstname','$lastname', '$email', '$password')";
            //mysqli_query($con, $db);
            
            //$_SESSION['message'] = "you are logged in";
            //$_SESSION['email'] = $email;
            //header("location: home.php");
            
            //$_SESSION['message'] = "you are logged in";
            //$_SESSION['email'] = $email;
            //header("location: home.php"); //redirect to HP
        //} else {
     //       $_SESSION['message'] = "The two passwords do not match";
       // }
  //  }

?>

<!DOCTYPE html>
<html>

<head>
    <title>Register | OU Clubs</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div data-role="header">
            <h1 style="text-align: center;">
                OU CLUBS
            </h1>
        </div>
    
    <div class="header">
        <h1 style="text-align:center;">Register</h1>
    </div>


    
    <form method="post" action="register.php">
        <table align="center" width="90%">
            <tr>
                <td>First Name:</td>
                </tr>
            <tr>
                <td><input type="text" name="firstname" class="textInput" required></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                </tr>
            <tr>
                <td><input type="text" name="lastname" class="textInput" required></td>
            </tr>
            <tr>
                <td>OU Email:</td>
                </tr>
            <tr>
                <td><input type="email" name="email" class="textInput" pattern="[a-z0-9._%+-]+@oakland.edu$" placeholder="valid oakland email address" required></td>
            </tr>
            <tr>
                <td>Password:</td>
                </tr>
            <tr>
                <td><input type="password" name="password" class="textInput" required></td>
            </tr>
            <tr>
                <td>Retype password:</td>
                </tr>
            <tr>
                <td><input type="password" name="password2" class="textInput" required></td>
            </tr>
            <tr>
                <td><input type="submit" name="register_btn" value="Register"></td>
            </tr>
            <tr>
                <td>
            Already have an account?
            </td>
            </tr>
            <tr>
                <td>
            <a href="login.php"><button>Login</button></a>
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
