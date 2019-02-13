<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$conn = new mysqli("127.0.0.1", "root", "", "projectdb");
$result = $conn->query("SELECT airportID,codeName,fullName,state,zipcode,tax,timeZone FROM airport;");
$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"airportID":"'  . $rs["airportID"] . '",';
    $outp .= '"codeName":"'  . $rs["codeName"] . '",';
    $outp .= '"fullName":"'  . $rs["fullName"] . '",';
    $outp .= '"state":"'  . $rs["state"] . '",';
    $outp .= '"zipcode":"'  . $rs["zipcode"] . '",';
    $outp .= '"tax":"'  . $rs["tax"] . '",';
    $outp .= '"timeZone":"'  . $rs["timeZone"] . '"}';
}
$outp .="]";
$conn->close();
echo($outp);
?>