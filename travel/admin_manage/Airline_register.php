<?php
    $con = mysqli_connect("localhost", "root", "", "projectdb");
    $AirportName = mysqli_real_escape_string($con, $_POST['airportName']); 
    $sql = "SELECT airportID 
            FROM airport WHERE fullName = '$AirportName';";
    $query = mysqli_query($con,$sql);
    $result = mysqli_fetch_assoc($query);
    $number = count($_POST["AirlineName"]);
    if($number > 0)
    {
        for($i=0; $i < $number; $i++)  
        {   
            if(trim($_POST["AirlineName"][$i] != ''))  
            {  
                $query1 = mysqli_query($con,"SELECT pl.airportID 
                                            FROM airline as al INNER JOIN airport_airline as pl ON al.airlineID = pl.airlineID
                                            WHERE pl.airportID = '".$result['airportID']."' AND al.airlineName = '".$_POST["AirlineName"][$i]."';");
                $result1 = mysqli_fetch_assoc($query1);
                if($result1){
                        die('Error, some data has been inserted before!');           
                }
            }
        }
        for($i=0; $i < $number; $i++)  
        {   
            if(trim($_POST["AirlineName"][$i] != ''))  
            {
                $query5 = mysqli_query($con,"SELECT airlineID FROM airline WHERE airlineName = '".$_POST["AirlineName"][$i]."';");
                $result5 = mysqli_fetch_assoc($query5);
                if($result5){
                    $sql6 = "INSERT INTO airport_airline (airportID, airlineID) 
                        VALUES('".$result['airportID']."', '".$result5['airlineID']."')"; 
                    mysqli_query($con, $sql6);
                }else{
                    $sql2 = "INSERT INTO airline (airlineName) 
                        VALUES('".mysqli_real_escape_string($con, $_POST["AirlineName"][$i])."')";
                    mysqli_query($con, $sql2); 
                    $query3 = mysqli_query($con,"SELECT airlineID FROM airline WHERE airlineName = '".$_POST["AirlineName"][$i]."';");
                    $result3 = mysqli_fetch_assoc($query3);
                    $sql4 = "INSERT INTO airport_airline (airportID, airlineID) 
                            VALUES('".$result['airportID']."', '".$result3['airlineID']."')"; 
                    mysqli_query($con, $sql4);
                }         
            }
        }
        echo "Data inserted"; 
    }  
    else  
    {  
        echo "Please, insert airline's name";  
    }
    /*// Check connection 
    if (mysqli_connect_errno()) { 
        echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
    }    
    // escape variables for security 
    $AirportName = mysqli_real_escape_string($con, $_POST['airportName']); 
    $AirlineName = mysqli_real_escape_string($con, $_POST['AirlineName']);
    $sql = "SELECT airportID 
            FROM airport WHERE fullName = '$AirportName';";
    $query = mysqli_query($con,$sql);
    $result = mysqli_fetch_assoc($query);
    $sql2 = "INSERT INTO airline (airlineName) 
            VALUES ('$AirlineName')";
    if (!mysqli_query($con,$sql2)) { 
        die('Error: ' . mysqli_error($con)); } 
    //echo "1 record added in airline";
    
    $sql3 = "SELECT airlineID 
            FROM airline WHERE airlineName = '$AirlineName';";
    $query3 = mysqli_query($con,$sql3);
    $result3 = mysqli_fetch_assoc($query3);
    $sql4 = "INSERT INTO airport_airline (airportID, airlineID) 
            VALUES ('".$result['airportID']."', 
                    '".$result3['airlineID']."')"; 
    if (!mysqli_query($con,$sql4)) { 
        die('Error: ' . mysqli_error($con)); } 
    echo "1 record success";*/
    mysqli_close($con);
?>