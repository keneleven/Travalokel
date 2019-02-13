<?php
    $con = mysqli_connect("localhost", "root", "", "projectdb"); 
    // Check connection 
    if (mysqli_connect_errno()) { 
        echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
    } 
    // escape variables for security 
    $AirportName = mysqli_real_escape_string($con, $_POST['AirportName']); 
    $CodeName = mysqli_real_escape_string($con, $_POST['CodeName']); 
    $State = mysqli_real_escape_string($con, $_POST['State']); 
    $sql="INSERT INTO airport (fullName, codeName, state) 
        VALUES ('$AirportName', '$CodeName', '$State')"; 
    if (!mysqli_query($con,$sql)) { 
        die('Error: ' . mysqli_error($con)); } 
    echo "1 record added"; mysqli_close($con);
?>