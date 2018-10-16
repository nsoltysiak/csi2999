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
        print_r($_SESSION);
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