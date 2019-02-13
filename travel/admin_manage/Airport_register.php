<?php
    $con = mysqli_connect("localhost", "root", "", "projectdb"); 
    // Check connection 
    if (mysqli_connect_errno()) { 
        echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
    } 
    // escape variables for security 
    $AirportName = mysqli_real_escape_string($con, $_POST['AirportName']); 
    $CodeName = mysqli_real_escape_string($con, $_POST['CodeName']); 
    $ZIPCode = mysqli_real_escape_string($con, $_POST['Zipcode']);
    $State = mysqli_real_escape_string($con, $_POST['State']); 
    $City = mysqli_real_escape_string($con, $_POST['City']);
    $Timezone = mysqli_real_escape_string($con, $_POST['Timezone']);
    $Tax = mysqli_real_escape_string($con, $_POST['Tax']);
    $sql="INSERT INTO airport (fullName, codeName, state, zipcode, tax, timeZone, city) 
        VALUES ('$AirportName', '$CodeName', '$State', '$ZIPCode', '$Tax', '$Timezone', '$City')"; 
    if (!mysqli_query($con,$sql)) { 
        die('Error: ' . mysqli_error($con)); } 
    echo "Data inserted";
    mysqli_close($con);
?>