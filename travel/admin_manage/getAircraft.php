<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("127.0.0.1", "root", "", "projectdb");

$result = $conn->query("SELECT aircraftID,airlineID FROM aircraft;");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"aircraftID":"'  . $rs["aircraftID"] . '",';
    $outp .= '"airlineID":"'  . $rs["airlineID"] . '"}';
}
$outp .="]";

$conn->close();

echo($outp);
?>