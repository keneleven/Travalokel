<?php

$conn = new mysqli("127.0.0.1", "root", "", "projectdb");
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " .
mysqli_connect_error();
}
mysqli_query($conn,"DELETE FROM card_type WHERE Card_Number='".$_GET['Card_Number']."'");
mysqli_close($conn);

echo("Delete data");
?>