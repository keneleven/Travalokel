<?php
$conn = new mysqli("127.0.0.1", "root", "", "projectdb");

//$result_s = $conn->query("SELECT airportID,codeName,fullName,state,zipcode,tax,timeZone FROM airport;");
//$AirportID = mysqli_real_escape_string($conn, $_GET['customers']);
$zipcode = $_GET['c'];
$result_s = $conn->query("SELECT DISTINCT City FROM zip_code
                          WHERE ZIPCode = '$zipcode';");
$rs_s = $result_s->fetch_array(MYSQLI_ASSOC);
$city = $rs_s["City"];
$outp_s = $city;
$conn->close();
$ar = json_decode($outp_s);
echo $outp_s;

//echo($outp_e);
?>
