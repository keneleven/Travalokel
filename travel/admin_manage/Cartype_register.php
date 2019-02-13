<?php
    $con = mysqli_connect("localhost", "root", "", "projectdb");
    $number = count($_POST["carType"]);
    if($number > 0)
    {  
        for($i=0; $i < $number; $i++)  
        {  
            if(trim($_POST["carType"][$i] != ''))  
            {  
                $query = mysqli_query($con,"SELECT car_Type FROM car WHERE car_Type = '".$_POST["carType"][$i]."';");
                $result = mysqli_fetch_assoc($query);
                if($result){
                    die('Error, some data has been inserted before!');
                }
            }  
        } 
        for($i=0; $i < $number; $i++)  
        {  
            if(trim($_POST["carType"][$i] != ''))  
            {  
                $sql2 = "INSERT INTO car (car_Type) 
                VALUES('".mysqli_real_escape_string($con, $_POST["carType"][$i])."')";  
                if (!mysqli_query($con,$sql2)) {
                    die('Error, some data has been inserted before!'); }
            }  
        }
        echo "Data inserted";
    }  
    else  
    {  
        echo "Please, insert car's type";  
    }
    /*// Check connection 
    if (mysqli_connect_errno()) { 
        echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
    } 
    // escape variables for security 
    $carType = mysqli_real_escape_string($con, $_POST['carType']);   
    $sql="INSERT INTO car (carTypeFactor) 
        VALUES ('$carType')";
    if (!mysqli_query($con,$sql)) { 
        die('Error: ' . mysqli_error($con)); } 
    echo "1 record added";*/
    mysqli_close($con);
?>