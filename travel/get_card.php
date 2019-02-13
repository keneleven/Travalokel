<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("127.0.0.1", "root", "", "projectdb");

$result = $conn->query("SELECT Card_Type, CardHolder_Name,Card_Number,CV_Code,Validity_Date FROM card_type;");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"Card_Type":"'  . $rs["Card_Type"] . '",';
    $outp .= '"CardHolder_Name":"'   . $rs["CardHolder_Name"]        . '",';
    $outp .= '"Card_Number":"'   . $rs["Card_Number"]        . '",';
    $outp .= '"CV_Code":"'   . $rs["CV_Code"]        . '",';
    $outp .= '"Validity_Date":"'   . $rs["Validity_Date"]        . '"}';
}
$outp .="]";

$conn->close();

echo($outp);
?>