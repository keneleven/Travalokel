<?php
    $con = mysqli_connect("localhost", "root", "", "projectdb"); 
    // Check connection 
    if (mysqli_connect_errno()) { 
        echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
    } 
    // escape variables for security 
    $airport = mysqli_real_escape_string($con, $_POST['airport']);
    $airport1 = mysqli_real_escape_string($con, $_POST['airport1']);
    $aircraft = mysqli_real_escape_string($con, $_POST['aircraft']);
    $StartingDate = mysqli_real_escape_string($con, $_POST['Starting_Date']); 
    $EndingDate = mysqli_real_escape_string($con, $_POST['Ending_Date']);
    $Price = mysqli_real_escape_string($con, $_POST['Price']);  
    $sql="INSERT INTO legs (airportIDStart, airportIDDest, aircraftID, dateStart, dateEnd, duration, price) 
        VALUES ('$airport', '$airport1', '$aircraft', '$StartingDate', '$EndingDate','$EndingDate-$StartingDate' ,'$Price')"; 
    if (!mysqli_query($con,$sql)) { 
        die('Error: ' . mysqli_error($con)); } 
    echo "1 record added"; mysqli_close($con);
?>