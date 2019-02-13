<?php
    $con = mysqli_connect("localhost", "root", "", "projectdb"); 
    // Check connection 
    if (mysqli_connect_errno()) { 
        echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
    } 
    // escape variables for security 
    $AircraftID = mysqli_real_escape_string($con, $_POST['AircraftID']); 
    $Airline = mysqli_real_escape_string($con, $_POST['airline']); 
    $EcoAmount = mysqli_real_escape_string($con, $_POST['economyAmount']);
    $sql2="SELECT airlineID
            FROM airline
            WHERE '$Airline' = airlineName"; 
    $query2 = mysqli_query($con, $sql2);
    $result = mysqli_fetch_array($query2);
    $sql="INSERT INTO aircraft (aircraftID, airlineID, Amount) 
        VALUES ('$AircraftID', '".$result["airlineID"]."', '$EcoAmount')";
    if (!mysqli_query($con,$sql)) { 
        die('Error, aircraft\'s name has been inserted before!'); } 
    echo "Data inserted";
    mysqli_close($con);
?>