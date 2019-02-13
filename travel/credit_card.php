<?php
// Start the session
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectdb";
$con=mysqli_connect($servername,$username,$password,$dbname);
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//  $_SESSION["em"]   >>>   use for email (is logging in)
//  $_SESSION["ls"]   >>>   use for selected legsID from booking page.
$em=$_SESSION['em'];
$sql="SELECT email FROM customer_information WHERE email='$em';";
$query=mysqli_query($con, $sql);
$result_id=mysqli_fetch_assoc($query);
$customerID=$result_id['email'];
if (!mysqli_query($con,$sql)) {
    die('Error: ' . mysqli_error($con));
}else {
            
            //customer credit card
            $customer_card_flag = $_POST['card_flag'];
            $customer_card_number = $_POST['card_number'];
            $customer_card_type = $_POST['card_type'];
            $customer_card_holder = $_POST['card_holder'];
            $customer_card_cv = $_POST['cv'];
            $customer_card_validity_date = $_POST['validity_date'];
            
            $sql_insert_card="INSERT INTO card_type (Card_Flag, customerID, Card_Type, CardHolder_Name, Card_Number, CV_Code, Validity_Date) 
                            VALUES('$customer_card_flag', '$customerID', '$customer_card_type', '$customer_card_holder', '$customer_card_number', '$customer_card_cv', '$customer_card_validity_date');";
            //$query_insert_card=mysqli_query($con, $sql_insert_card);
            if (!mysqli_query($con, $sql_insert_card)){   
                die('Error: ' . mysqli_error($con));
            }else  {
                //echo "insert card successful!";
                
            }     
}
mysqli_close($con);
?>