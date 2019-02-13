<?php
    // Start the session
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projectdb";
    $con=mysqli_connect($servername,$username,$password,$dbname);
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    // escape variables for security
    $user_email = mysqli_real_escape_string($con, $_POST['user_email']);
    $user_password = md5(mysqli_real_escape_string($con, $_POST['user_password']));
    $sql_email_check = "SELECT email, password, firstname, phone FROM customer_information WHERE email='$user_email';";
    
    $query = mysqli_query($con, $sql_email_check);
    $result = mysqli_fetch_assoc($query);
    if (!mysqli_query($con,$sql_email_check)) {
        die('Error: ' . mysqli_error($con));
    }elseif(($result['email']==$user_email)&&($result['password']==$user_password)){
        echo "login success!";
        
        
        // Set session variables
        $_SESSION["em"]=$result['email'];
        $_SESSION["pw"]=$result['password'];
        $_SESSION["fn"]=$result['firstname'];
        $_SESSION["tel"]=$result['phone'];
        header("Location: http://localhost/travel/index.php");
        //echo "Session variables are set.";
    }elseif(($result['email']!=$user_email)||($result['password']!=$user_password)){
        echo "email or password incorrect!";
    }else echo "please try again later!!";
    mysqli_close($con);
?> 