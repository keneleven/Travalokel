<?php
    $con = mysqli_connect("localhost", "root", "", "projectdb");
    $number = count($_POST["lmname"]);
    if($number > 0)  
    {  
        for($i=0; $i < $number; $i++)  
        {  
            if(trim($_POST["lmname"][$i] != ''))  
            {  
                    $sql = "INSERT INTO landmark (landmarkName) VALUES('".mysqli_real_escape_string($con, $_POST["lmname"][$i])."')";  
                    mysqli_query($con, $sql);  
            }  
        }  
        echo "Data inserted";  
    }  
    else  
    {  
        echo "Please, enter landmark's name";  
    }  
    /*// Check connection 
    if (mysqli_connect_errno()) { 
        echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
    } 
    // escape variables for security 
    $landmarkName = mysqli_real_escape_string($con, $_POST['LandmarkName']);
    $sql="INSERT INTO landmark (landmarkName)
        VALUES ('$landmarkName')";
    if (!mysqli_query($con,$sql)) { 
        die('Error: ' . mysqli_error($con)); } 
    echo "1 record added";*/
    mysqli_close($con);
?>