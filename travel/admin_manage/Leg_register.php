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

    $sql = "SELECT airportID
            FROM airport WHERE fullName = '$airport';";
    $query = mysqli_query($con,$sql);
    $result = mysqli_fetch_assoc($query);

    $sql2 = "SELECT airportID
            FROM airport WHERE fullName = '$airport1';";
    $query2 = mysqli_query($con,$sql2);
    $result2 = mysqli_fetch_assoc($query2);

    $sql3 = "SELECT aircraftID
            FROM aircraft WHERE aircraftID = '$aircraft';";
    $query3 = mysqli_query($con,$sql3);
    $result3 = mysqli_fetch_assoc($query3);

    $sql = "INSERT INTO legs (airportIDStart, airportIDDest, aircraftID, dateStart, dateEnd, price) 
        VALUES ('".$result['airportID']."', '".$result2['airportID']."', '".$result3['aircraftID']."', '$StartingDate', '$EndingDate', '$Price')"; 
    
    if (!mysqli_query($con,$sql)) { 
        die('Error: ' . mysqli_error($con)); } 
    echo "Data inserted"; 
    mysqli_close($con);
?>