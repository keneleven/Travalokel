<?php
$conn = new mysqli("127.0.0.1", "root", "", "projectdb");

//$result_s = $conn->query("SELECT airportID,codeName,fullName,state,zipcode,tax,timeZone FROM airport;");
//$AirportID = mysqli_real_escape_string($conn, $_GET['customers']);
$zipcode = $_GET['t'];
$result_s = $conn->query("SELECT DISTINCT TimeZone FROM zip_code
                          WHERE ZIPCode = '$zipcode';");
$rs_s = $result_s->fetch_array(MYSQLI_ASSOC);
$timezone = $rs_s["TimeZone"];
$outp_s = $timezone;
$conn->close();
$ar = json_decode($outp_s);
echo $outp_s;

//echo($outp_e);
?>
