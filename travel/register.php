<?php
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
    $user_repassword = md5(mysqli_real_escape_string($con, $_POST['user_repassword']));
    $user_firstname = mysqli_real_escape_string($con, $_POST['user_firstname']);
    $user_lastname = mysqli_real_escape_string($con, $_POST['user_lastname']);
    $user_gender =  mysqli_real_escape_string($con, $_POST['user_gender']);
    $user_phonenumber = mysqli_real_escape_string($con, $_POST['user_phonenumber']);
    $sql_email_check = "SELECT email FROM customer_information WHERE email='$user_email';";
    $query = mysqli_query($con, $sql_email_check);
    $result = mysqli_fetch_assoc($query);
    if(($user_password == $user_repassword)&&($result['email']!=$user_email)){
        $sql="INSERT INTO customer_information (email, firstname, lastname, password, phone, sex)
        VALUES ('$user_email','$user_firstname', '$user_lastname', '$user_password', '$user_phonenumber','$user_gender');";
        if (!mysqli_query($con,$sql)) {
            die('Error: ' . mysqli_error($con));
        }
        echo "1 record added";
        header("Location: http://localhost/travel/login1.php");

    }elseif($user_password != $user_repassword){
        echo "password not matched!";
    }elseif($result['email']==$user_email){
        echo "this email has been used!";
    }else echo "please try again later!!";
    mysqli_close($con);
?>
