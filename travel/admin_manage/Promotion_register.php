<?php
    $con = mysqli_connect("localhost", "root", "", "projectdb");
    $number = count($_POST["Value"]);
    if($number > 0)
    {  
        for($i=0; $i < $number; $i++)  
        {  
            if(trim($_POST["unit"][$i] != '') && trim($_POST["Value"][$i] != ''))  
            {  
                    $sql = "INSERT INTO promotion (promotion_type, promotion_discount) 
                    VALUES('".mysqli_real_escape_string($con, $_POST["unit"][$i])."', '".mysqli_real_escape_string($con, $_POST["Value"][$i])."')";  
                    mysqli_query($con, $sql);  
            }  
        }
        echo "Data inserted";  
    }  
    else  
    {  
        echo "Please, enter value";  
    }
    /*// Check connection 
    if (mysqli_connect_errno()) { 
        echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
    } 
    // escape variables for security 
    $unit = mysqli_real_escape_string($con, $_POST['unit']);
    $value = mysqli_real_escape_string($con, $_POST['Value']);
    $sql="INSERT INTO promotion (promotion_discount, promotion_type) 
        VALUES ('$unit', '$value')";
    if (!mysqli_query($con,$sql)) { 
        die('Error: ' . mysqli_error($con)); } 
    echo "1 record added";*/
    mysqli_close($con);
?>