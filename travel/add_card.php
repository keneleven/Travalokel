<?php

$con = new mysqli("127.0.0.1", "root", "", "projectdb");
    
    $CardHold_Name = $_POST['CardHold_Name'];
    $Card_Number = $_POST['Card_Number'];
    

if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " .
mysqli_connect_error();
}

$sql_insert_card="INSERT INTO card_type VALUES('11','11','11','$CardHold_Name', '$Card_Number'),'11','11'";

		if(!mysql_query($con,$sql_insert_card))
		  echo "Successfully Inserted";
		else
		  echo "Insertion Failed";

echo("Delete data");
?>