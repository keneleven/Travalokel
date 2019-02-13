<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("127.0.0.1", "root", "", "projectdb");

$result = $conn->query("SELECT airlineID, airlineName FROM airline;");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"airlineID":"'  . $rs["airlineID"] . '",';
    $outp .= '"airlineName":"'  . $rs["airlineName"] . '"}';
}
$outp .="]";

$conn->close();

echo($outp);
?>