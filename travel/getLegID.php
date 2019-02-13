<?php
$conn = new mysqli("127.0.0.1", "root", "", "projectdb");

//$result_s = $conn->query("SELECT airportID,codeName,fullName,state,zipcode,tax,timeZone FROM airport;");
//$AirportID = mysqli_real_escape_string($conn, $_GET['customers']);
$AirportID = $_GET['q'];
$result_s = $conn->query("SELECT DISTINCT airportID,codeName,state,fullName from airport a 
                          LEFT JOIN legs l ON a.airportID = l.airportIDDest 
                          WHERE l.airportIDStart = '$AirportID';");

$outp_s = "<select>";
while($rs_s = $result_s->fetch_array(MYSQLI_ASSOC)) {
    if ($outp_s != "[") {$outp_s .= ",";}
    //$outp_s .= '<option>"airportIDStart":"'  . $rs_s["airportIDStart"] . '",';
    $outp_s .= '<option value = '.$rs_s["airportID"].'>'  .$rs_s["state"].' - '. $rs_s["codeName"].' < '.$rs_s["fullName"] .' > ' . '</option>';
}
$outp_s .="</select>";

/*$outp_e = "[";
while($rs_e = $result_e->fetch_array(MYSQLI_ASSOC)) {
    if ($outp_e != "[") {$outp_e .= ",";}
    $outp_e .= '{"airportID":"'  . $rs_e["airportID"] . '",';
    $outp_e .= '"codeName":"'  . $rs_e["codeName"] . '",';
    $outp_e .= '"fullName":"'  . $rs_e["fullName"] . '",';
    $outp_e .= '"state":"'  . $rs_e["state"] . '",';
    $outp_e .= '"zipcode":"'  . $rs_e["zipcode"] . '",';
    $outp_e .= '"tax":"'  . $rs_e["tax"] . '",';
    $outp_e .= '"timeZone":"'  . $rs_e["timeZone"] . '"}';
}
$outp_e .="]";*/
$conn->close();
$ar = json_decode($outp_s);
echo $outp_s;

//echo($outp_e);
?>