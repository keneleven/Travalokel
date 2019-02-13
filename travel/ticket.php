<?php
    // Start the session
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projectdb";
    $con = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $c=mysqli_real_escape_string($con, $_POST['c']);
//var_dump($c);
    if($c!=NULL){
        //$_SESSION["lss"] = mysqli_real_escape_string($con, $_POST['card_number']);
        $card_number=$_SESSION["lss"]['Card_Number'];
        //var_dump($_SESSION["lss"]);
        $customerID=$_SESSION["em"];
        $sql_search_card="SELECT Card_Flag, Card_Type, CardHolder_Name, Card_Number, CV_Code, Validity_Date 
                            FROM card_type 
                            WHERE customerID='$customerID' AND Card_Number='$card_number'";
        $query_search_card=mysqli_query($con, $sql_search_card);
        $card=mysqli_fetch_array($query_search_card);
        $methodType=$card[1];
        $totalAmount=intval($_SESSION['total_amount']);
        $cardFlag=$card[0];
        //$promotionID
        $legID=["go"=>$_SESSION["booking_go"], "back"=>$_SESSION["booking_back"]];
        //$classID
        //var_dump($card);
        ////////////////////////////////////////////////   PAYMENT INSERT & SELECT   ///////////////////////////////////////////////////////////////////////
        $sql_insert_payment="INSERT INTO payment_and_bill(customerID, methodType, totalAmount, cardFlag, promotionID) VALUES ('$customerID','$methodType', '$totalAmount', '$cardFlag', 1069);";
        
        if (!mysqli_query($con, $sql_insert_payment)){   
                die('Error: ' . mysqli_error($con));
            }else  {
                //echo "insert payment successful!";
                
            }
        $sql_search_payment="SELECT paymentID, customerID, methodType, totalAmount, cardFlag, promotionID  FROM payment_and_bill 
                                WHERE customerID='$customerID' AND totalAmount='$totalAmount';";
        $query_search_payment = mysqli_query($con, $sql_search_payment);
        $payment=mysqli_fetch_array($query_search_payment);
        
        $paymentID=$payment[0];
        //var_dump($legID);
        $legID[0]=$legID["go"];        
        $legID[1]=$legID["back"];
       
        /*
        $legID_go=$_SESSION["booking_go"];
        $legID_back=$_SESSION["booking_back"];
        $sql_legID_check = "SELECT a.fullname, l. FROM legs AS l INNER JOIN airport AS a ON l.airportIDStart=a.airportID 
                                INNER JOIN airport AS b ON l.airportIDDest=b.airportID
                                WHERE l.legID='$legID_go';";
        $query_legID_check = mysqli_query($con, $sql_legID_check);
        $result_legID_check = mysqli_fetch_assoc($query_legID_check);
        $sql_legID_check2 = "SELECT b.fullname FROM legs AS l INNER JOIN airport AS a ON l.airportIDStart=a.airportID 
                                INNER JOIN airport AS b ON l.airportIDDest=b.airportID
                                WHERE l.legID='$legID_go';";
        $query_legID_check2 = mysqli_query($con, $sql_legID_check2);
        $result_legID_check2 = mysqli_fetch_assoc($query_legID_check2);
        //var_dump($result_legID_check);
        //echo "<br><br>";

        if($_SESSION["round_trip"]=='check'){
            $sql_legID_check1 = "SELECT a.fullname FROM legs AS l INNER JOIN airport AS a ON l.airportIDDest=a.airportID 
                                INNER JOIN airport AS b ON l.airportIDStart=b.airportID
                                WHERE l.legID='$legID_back';";
            $query_legID_check1 = mysqli_query($con, $sql_legID_check1);
            $result_legID_check1 = mysqli_fetch_assoc($query_legID_check1);
            $sql_legID_check4 = "SELECT b.fullname FROM legs AS l INNER JOIN airport AS a ON l.airportIDDest=a.airportID 
                                INNER JOIN airport AS b ON l.airportIDStart=b.airportID
                                WHERE l.legID='$legID_back';";
            $query_legID_check4 = mysqli_query($con, $sql_legID_check4);
            $result_legID_check4 = mysqli_fetch_assoc($query_legID_check4);
            //var_dump($result_legID_check1);
            //echo "<br><br>";
            }*/
        
        
        
        //var_dump($legID[1]);
        //$carSID
        ////////////////////////////////////////////////   BOOKING INSERT & SELECT   ///////////////////////////////////////////////////////////////////////
        $passengerAmount=$_SESSION["adult"]+$_SESSION["children"];
        $sql_insert_booking="INSERT INTO booking(customerID, legID, classID, paymentID, carSID, passengerAmount) 
                                VALUES ('$customerID', '$legID[0]', 1, '$paymentID', 69,'$passengerAmount');";
        $query_insert_booking = mysqli_query($con, $sql_insert_booking);
        if($_SESSION["round_trip"]=='check'){
              $sql_insert_booking="INSERT INTO booking(customerID, legID, classID, paymentID, carSID, passengerAmount) 
                                VALUES ('$customerID', '$legID[1]', 1, '$paymentID', 69,'$passengerAmount');";
        $query_insert_booking = mysqli_query($con, $sql_insert_booking);
        }
        //echo "data inserted"."<br>";
        $sql_search_booking="SELECT bookingID, customerID, paymentID
                            FROM booking 
                            WHERE customerID = '$customerID' AND paymentID = '$paymentID' ;";
        $query_search_booking = mysqli_query($con, $sql_search_booking);
        while($booking=mysqli_fetch_array($query_search_booking)){
            $bookingIDs[] = $booking;
        }
        if(count($bookingIDs)>1){
            $number_ad = $_SESSION["adult"];
            $number_ch = $_SESSION["children"];
            $sum_num = $number_ad + $number_ch;
            $check_insert = "SELECT * FROM passenger WHERE bookingID = '".$bookingIDs[0]["bookingID"]."'";
            $check = mysqli_query($con, $check_insert);
            $rowcount=mysqli_num_rows($check);
            if($rowcount==0){
                
                if($number_ad > 0){
                    for($i = 0; $i < $number_ad; $i++){
                        $query_insert_passenger ="INSERT INTO passenger (bookingID, passengerFirstName, passengerLastName, sex, specialRecommend)
                                        VALUES ( '".$bookingIDs[0]["bookingID"]."' ,'".$_SESSION["ad_fname"][$i]."', '".$_SESSION["ad_lname"][$i]."', '".$_SESSION["ad_sex"][$i]."', '".$_SESSION["ad_comm"][$i]."')";
                        mysqli_query($con, $query_insert_passenger);
                        //echo "ad"."1"."<br>";
                    }

            }
                if($number_ch > 0){
                    for($i = 0; $i < $number_ch; $i++){
                        $query_insert_passenger ="INSERT INTO passenger (bookingID, passengerFirstName, passengerLastName, sex, specialRecommend)
                                        VALUES ( '".$bookingIDs[0]["bookingID"]."' ,'".$_SESSION["ch_fname"][$i]."', '".$_SESSION["ch_lname"][$i]."', '".$_SESSION["ch_sex"][$i]."', '".$_SESSION["ch_comm"][$i]."')";
                        mysqli_query($con, $query_insert_passenger);
                        //echo "ch"."1"."<br>";
                    }
                }
            }
            $sql_search_passenger= "SELECT passengerID FROM passenger WHERE bookingID='".$bookingIDs[0]["bookingID"]."';";
            $query_search_passenger=mysqli_query($con, $sql_search_passenger);
            while ($passengerID= mysqli_fetch_assoc($query_search_passenger)){
            //echo $sql_search_passenger."<br>";
                $passengerIDs[] = $passengerID;
            }
            $PNR = ($paymentID*($bookingIDs[0]["bookingID"]))%1000;
            $PNRs = "TVL".$PNR;
            $number = count($passengerIDs);
            if($number > 0){
                for($j = 0; $j < $number; $j++){
                    if(trim($passengerIDs[$j] != '')){
                        $order = $j +1;
                        mysqli_query($con, "INSERT INTO ticket (paymentID, PNR, passengerID,Round_check) VALUES ('$paymentID', '$PNRs', '" .$passengerIDs[$j]["passengerID"]. "',0)" );
                    }

                }
            }
            
            $number_ad = $_SESSION["adult"];
            $number_ch = $_SESSION["children"];
            $sum_num = $number_ad + $number_ch;
            $check_insert = "SELECT * FROM passenger WHERE bookingID = '".$bookingIDs[1]["bookingID"]."'";
            if(!mysqli_query($con, $check_insert)){
                if($number_ad > 0){
                    for($i = 0; $i < $number_ad; $i++){
                        $query_insert_passenger ="INSERT INTO passenger (bookingID, passengerFirstName, passengerLastName, sex, specialRecommend)
                                        VALUES ( '$bookingID' ,'".$_SESSION["ad_fname"][$i]."', '".$_SESSION["ad_lname"][$i]."', '".$_SESSION["ad_sex"][$i]."', '".$_SESSION["ad_comm"][$i]."')";
                        mysqli_query($con, $query_insert_passenger);
                        //echo "ad"."1"."<br>";
                    }

            }
                if($number_ch > 0){
                    for($i = 0; $i < $number_ch; $i++){
                        $query_insert_passenger ="INSERT INTO passenger (bookingID, passengerFirstName, passengerLastName, sex, specialRecommend)
                                        VALUES ( '$bookingID' ,'".$_SESSION["ch_fname"][$i]."', '".$_SESSION["ch_lname"][$i]."', '".$_SESSION["ch_sex"][$i]."', '".$_SESSION["ch_comm"][$i]."')";
                        mysqli_query($con, $query_insert_passenger);
                        //echo "ch"."1"."<br>";
                    }
                }
            }
            $sql_search_passenger= "SELECT passengerID FROM passenger WHERE bookingID='".$bookingIDs[1]["bookingID"]."';";
            $query_search_passenger=mysqli_query($con, $sql_search_passenger);
            while ($passengerID= mysqli_fetch_assoc($query_search_passenger)){
            //echo $sql_search_passenger."<br>";
            $passengerIDs[] = $passengerID;
                //var_dump($passengerIDs);
            }
            $PNR = ($paymentID*($bookingIDs[1]["bookingID"]))%1000;
            $PNRs = "TVL".$PNR;
            $number = count($passengerIDs);
            if($number > 0){
                for($j = 0; $j < $number; $j++){
                    if(trim($passengerIDs[$j] != '')){
                        $order = $j +1;
                        mysqli_query($con, "INSERT INTO ticket (paymentID, PNR, passengerID,Round_check) VALUES ('$paymentID', '$PNRs', '" .$passengerIDs[$j]["passengerID"]. "',1)" );
                    }

                }
            }
        }else{
            echo $bookingIDs[0]["bookingID"]."<br>";
            $number_ad = $_SESSION["adult"];
            $number_ch = $_SESSION["children"];
            $sum_num = $number_ad + $number_ch;
            $check_insert = "SELECT * FROM passenger WHERE bookingID = '".$bookingIDs[0]["bookingID"]."'";
            $check = mysqli_query($con, $check_insert);
            $rowcount=mysqli_num_rows($check);
            if($rowcount==0){
                if($number_ad > 0){
                    for($i = 0; $i < $number_ad; $i++){
                        $query_insert_passenger ="INSERT INTO passenger (bookingID, passengerFirstName, passengerLastName, sex, specialRecommend)
                                        VALUES ( '$bookingID' ,'".$_SESSION["ad_fname"][$i]."', '".$_SESSION["ad_lname"][$i]."', '".$_SESSION["ad_sex"][$i]."', '".$_SESSION["ad_comm"][$i]."')";
                        mysqli_query($con, $query_insert_passenger);
                        //echo "ad"."1"."<br>";
                    }

            }
                if($number_ch > 0){
                    for($i = 0; $i < $number_ch; $i++){
                        $query_insert_passenger ="INSERT INTO passenger (bookingID, passengerFirstName, passengerLastName, sex, specialRecommend)
                                        VALUES ( '$bookingID' ,'".$_SESSION["ch_fname"][$i]."', '".$_SESSION["ch_lname"][$i]."', '".$_SESSION["ch_sex"][$i]."', '".$_SESSION["ch_comm"][$i]."')";
                        mysqli_query($con, $query_insert_passenger);
                        //echo "ch"."1"."<br>";
                    }
                }
            }
            $sql_search_passenger= "SELECT passengerID FROM passenger WHERE bookingID='".$bookingIDs[0]["bookingID"].";";
            $query_search_passenger=mysqli_query($con, $sql_search_passenger);
            while ($passengerID= mysqli_fetch_array($query_search_passenger)){
            //echo $sql_search_passenger."<br>";
            $passengerIDs[] = $passengerID;
                //var_dump($passengerIDs);
            }
            $PNR = ($paymentID*417)%1000;
            $PNRs = "TVL".$PNR;
            echo "pnr ".$PNRs, '<br>';
            $number = count($passengerIDs);
            echo "num ".$number."<br>";
            if($number > 0){
                for($j = 0; $j < $number; $j++){
                    if(trim($passengerIDs[$j] != '')){
                        $order = $j +1;
                        mysqli_query($con, "INSERT INTO ticket (paymentID, PNR, passengerID,Round_check) VALUES ('$paymentID', '$PNRs', '" .$passengerIDs[$j]["passengerID"]. "',0)" );
                    }

                }
            }
        }
        ////////////////////////////////////////////////   PASSENGER INSERT & SELECT   ///////////////////////////////////////////////////////////////////////
        
        /*$number_ad = $_SESSION["adult"];
        $number_ch = $_SESSION["children"];
        $sum_num = $number_ad + $number_ch;
        echo "numad ".$number_ad, '<br>';
        echo "numch ".$number_ch, '<br>';
        $check_insert = "SELECT * FROM passenger WHERE bookingID = '$booking'";
        if(!mysqli_query($con, $check_insert)){
            if($number_ad > 0){
                for($i = 0; $i < $number_ad; $i++){
                    $query_insert_passenger ="INSERT INTO passenger (bookingID, passengerFirstName, passengerLastName, sex, specialRecommend)
                                    VALUES ( '$bookingID' ,'".$_SESSION["ad_fname"][$i]."', '".$_SESSION["ad_lname"][$i]."', '".$_SESSION["ad_sex"][$i]."', '".$_SESSION["ad_comm"][$i]."')";
                    mysqli_query($con, $query_insert_passenger);
                    //echo "ad"."1"."<br>";
                }
            
        }
            if($number_ch > 0){
                for($i = 0; $i < $number_ch; $i++){
                    $query_insert_passenger ="INSERT INTO passenger (bookingID, passengerFirstName, passengerLastName, sex, specialRecommend)
                                    VALUES ( '$bookingID' ,'".$_SESSION["ch_fname"][$i]."', '".$_SESSION["ch_lname"][$i]."', '".$_SESSION["ch_sex"][$i]."', '".$_SESSION["ch_comm"][$i]."')";
                    mysqli_query($con, $query_insert_passenger);
                    //echo "ch"."1"."<br>";
                }
            }
        }
        
        
        $sql_search_passenger= "SELECT passengerID FROM passenger WHERE bookingID='$bookingID';";
        $query_search_passenger=mysqli_query($con, $sql_search_passenger);
        while ($passengerID= mysqli_fetch_assoc($query_search_passenger)){
        //echo $sql_search_passenger."<br>";
        $passengerIDs[] = $passengerID;
            //var_dump($passengerIDs);
        }
        $PNR = ($paymentID*417)%1000;
        $PNRs = "TVL".$PNR;
        echo "pnr ".$PNRs, '<br>';
        $number = count($passengerIDs);
        echo "num ".$number."<br>";
        if($number > 0){
            for($j = 0; $j < $number; $j++){
                if(trim($passengerIDs[$j] != '')){
                    $order = $j +1;
                    mysqli_query($con, "INSERT INTO ticket (paymentID, PNR, passengerID) VALUES ('$paymentID', '$PNRs', '" .$passengerIDs[$j]["passengerID"]. "')" );
                }
                
            }
        }*/
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //header("Refresh:0");
    } else echo "Something wrong";
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if(count($bookingIDs)>1){
        $sql_start = "SELECT ac.aircraftID, al.airlineName, ls.dateStart, ap.fullName, ap.state, ap.city, tk.PNR, bk.bookingID
        FROM legs as ls INNER JOIN aircraft as ac ON ls.aircraftID = ac.aircraftID
            INNER JOIN airline as al ON al.airlineID = ac.airlineID
            INNER JOIN booking as bk ON bk.legID = ls.legID
            INNER JOIN ticket as tk ON tk.paymentID = bk.paymentID
            INNER JOIN airport as ap ON ap.airportID = ls.airportIDStart
        WHERE  bk.customerID = '$customerID' AND bk.bookingID = '".$bookingIDs[0]["bookingID"]."' AND tk.Round_check = 0 " ;
        $query = mysqli_query($con, $sql_start);
        $start[] = mysqli_fetch_assoc($query);
        $sql_dest = "SELECT ld.dateEnd, ap.fullName, ap.state, ap.city
        FROM legs as ld INNER JOIN airport as ap ON ap.airportID = ld.airportIDDest
            INNER JOIN booking as bk ON bk.legID = ld.legID
            INNER JOIN ticket as tk ON tk.paymentID = bk.paymentID
        WHERE bk.customerID = '$customerID' AND bk.bookingID = '".$bookingIDs[0]["bookingID"]."'";
        $query2 = mysqli_query($con, $sql_dest);
        $dest[] = mysqli_fetch_assoc($query2);
        $sql_passenger = "SELECT pg.passengerFirstName, pg.passengerLastName
        FROM legs as l INNER JOIN booking as bk ON bk.legID = l.legID
            INNER JOIN ticket as tk ON tk.paymentID = bk.paymentID
            INNER JOIN passenger as pg ON pg.bookingID = bk.bookingID
        WHERE bk.customerID = '$customerID' AND bk.bookingID = '".$bookingIDs[0]["bookingID"]."'";
        $query3 = mysqli_query($con, $sql_passenger);
        while($passenger = mysqli_fetch_assoc($query3)){
            $passengers[] = $passenger;
        }
        
        $sql_start = "SELECT ac.aircraftID, al.airlineName, ls.dateStart, ap.fullName, ap.state, ap.city, tk.PNR, bk.bookingID
        FROM legs as ls INNER JOIN aircraft as ac ON ls.aircraftID = ac.aircraftID
            INNER JOIN airline as al ON al.airlineID = ac.airlineID
            INNER JOIN booking as bk ON bk.legID = ls.legID
            INNER JOIN ticket as tk ON tk.paymentID = bk.paymentID
            INNER JOIN airport as ap ON ap.airportID = ls.airportIDStart
        WHERE  bk.customerID = '$customerID' AND bk.bookingID = '".$bookingIDs[1]["bookingID"]."' AND tk.Round_check = 1";
        $query = mysqli_query($con, $sql_start);
        $query = mysqli_query($con, $sql_start);
        $start[] = mysqli_fetch_assoc($query);
        $sql_dest = "SELECT ld.dateEnd, ap.fullName, ap.state, ap.city
        FROM legs as ld INNER JOIN airport as ap ON ap.airportID = ld.airportIDDest
            INNER JOIN booking as bk ON bk.legID = ld.legID
            INNER JOIN ticket as tk ON tk.paymentID = bk.paymentID
        WHERE bk.customerID = '$customerID' AND bk.bookingID = '".$bookingIDs[1]["bookingID"]."'";
        $query2 = mysqli_query($con, $sql_dest);
        $dest[] = mysqli_fetch_assoc($query2);
        $sql_passenger = "SELECT pg.passengerFirstName, pg.passengerLastName
        FROM legs as l INNER JOIN booking as bk ON bk.legID = l.legID
            INNER JOIN ticket as tk ON tk.paymentID = bk.paymentID
            INNER JOIN passenger as pg ON pg.bookingID = bk.bookingID
        WHERE bk.customerID = '$customerID' AND bk.bookingID = '".$bookingIDs[1]["bookingID"]."'";
        $query3 = mysqli_query($con, $sql_passenger);
        while($passenger = mysqli_fetch_assoc($query3)){
            $passengers[] = $passenger;
        }
    }
    else{
        $sql_start = "SELECT ac.aircraftID, al.airlineName, ls.dateStart, ap.fullName, ap.state, ap.city, tk.PNR, bk.bookingID
        FROM legs as ls INNER JOIN aircraft as ac ON ls.aircraftID = ac.aircraftID
            INNER JOIN airline as al ON al.airlineID = ac.airlineID
            INNER JOIN booking as bk ON bk.legID = ls.legID
            INNER JOIN ticket as tk ON tk.paymentID = bk.paymentID
            INNER JOIN airport as ap ON ap.airportID = ls.airportIDStart
        WHERE  bk.customerID = '$customerID' AND bk.bookingID = '".$bookingIDs[0]["bookingID"]."' AND tk.Round_check = 0 ";
        $query = mysqli_query($con, $sql_start);
        $start[] = mysqli_fetch_assoc($query);
        $sql_dest = "SELECT ld.dateEnd, ap.fullName, ap.state, ap.city
        FROM legs as ld INNER JOIN airport as ap ON ap.airportID = ld.airportIDDest
            INNER JOIN booking as bk ON bk.legID = ld.legID
            INNER JOIN ticket as tk ON tk.paymentID = bk.paymentID
        WHERE bk.customerID = '$customerID' AND bk.bookingID = '".$bookingIDs[0]["bookingID"]."'";
        $query2 = mysqli_query($con, $sql_dest);
        $dest[] = mysqli_fetch_assoc($query2);
        $sql_passenger = "SELECT pg.passengerFirstName, pg.passengerLastName
        FROM legs as l INNER JOIN booking as bk ON bk.legID = l.legID
            INNER JOIN ticket as tk ON tk.paymentID = bk.paymentID
            INNER JOIN passenger as pg ON pg.bookingID = bk.bookingID
        WHERE bk.customerID = '$customerID' AND bk.bookingID = '".$bookingIDs[0]["bookingID"]."'";
        $query3 = mysqli_query($con, $sql_passenger);
        while($passenger = mysqli_fetch_assoc($query3)){
            $passengers[] = $passenger;
        }
    }
    //Source
/*
    if(count($bookingIDs)>1){
        echo $start[0]['PNR'], '<br>';
        echo $start[0]['bookingID'], '<br>';
        echo "<br>";
        //airline, aircraft
        echo $start[0]['aircraftID'], '<br>';
        echo $start[0]['airlineName'], '<br>';
        echo "<br>";
        //From
        echo $start[0]['fullName'], '<br>';
        echo $start[0]['state'], '<br>';
        echo $start[0]['city'], '<br>';
        echo $start[0]['dateStart'], '<br>';
        echo "<br>";
        //To
        echo $dest[0]['fullName'], '<br>';
        echo $dest[0]['state'], '<br>';
        echo $dest[0]['city'], '<br>';
        echo $dest[0]['dateEnd'], '<br>';
        echo "<br>";
        
        /////////////////////////
        echo $start[1]['PNR'], '<br>';
        echo $start[1]['bookingID'], '<br>';
        echo "<br>";
        //airline, aircraft
        echo $start[1]['aircraftID'], '<br>';
        echo $start[1]['airlineName'], '<br>';
        echo "<br>";
        //From
        echo $start[1]['fullName'], '<br>';
        echo $start[1]['state'], '<br>';
        echo $start[1]['city'], '<br>';
        echo $start[1]['dateStart'], '<br>';
        echo "<br>";
        //To
        echo $dest[1]['fullName'], '<br>';
        echo $dest[1]['state'], '<br>';
        echo $dest[1]['city'], '<br>';
        echo $dest[1]['dateEnd'], '<br>';
        echo "<br>";
        
    }
    else{
        echo $start[0]['PNR'], '<br>';
        echo $start[0]['bookingID'], '<br>';
        echo "<br>";
        //airline, aircraft
        echo $start[0]['aircraftID'], '<br>';
        echo $start[0]['airlineName'], '<br>';
        echo "<br>";
        //From
        echo $start[0]['fullName'], '<br>';
        echo $start[0]['state'], '<br>';
        echo $start[0]['city'], '<br>';
        echo $start[0]['dateStart'], '<br>';
        echo "<br>";
        //To
        echo $dest[0]['fullName'], '<br>';
        echo $dest[0]['state'], '<br>';
        echo $dest[0]['city'], '<br>';
        echo $dest[0]['dateEnd'], '<br>';
        echo "<br>";
    }
    
    //Passengers
    $number = count($passengers);
    var_dump($number);
    if($number > 0){
        for($i = 0; $i < $number; $i++){
            $order = $i+1;
            echo $order." "."".$passengers[$i]["passengerFirstName"].""." ".$passengers[$i]["passengerLastName"]."<br>";
        }
    }
    //paymentID
    //bookingID
    //passenger
    */
    mysqli_close($con);
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Travalokel &mdash; 100% Free Fully Responsive HTML5 Template by FREEHTML5.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

  <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FREEHTML5.CO
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Superfish -->
	<link rel="stylesheet" href="css/superfish.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
	<!-- CS Select -->
	<link rel="stylesheet" href="css/cs-select.css">
	<link rel="stylesheet" href="css/cs-skin-border.css">
	
	<link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!--  4Step -->

        
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
        <style>
        table {
        width:100%;
        }
        table, th, td {
        border-collapse: collapse;
        }
        th, td {
        padding: 0.7em;
        text-align: left;
        font-size: 16px;
                    color: black;

        }
        table#t01 tr:nth-child(even) {
        background-color: #fff;
        }
        table#t01 tr:nth-child(odd) {
        background-color: #eee;
        }
        table#t01 th {
        background-color: #F48536;
        color: white;
        text-align: center;
        font-size: 30px;
        font-style: bold;
        font-family: monospace;
        }
        </style>
        
	</head>
	<body>
		<div id="fh5co-wrapper">
		<div id="fh5co-page">

		<header id="fh5co-header-section" class="sticky-banner">
			<div class="container">
				<div class="nav-header">
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
					<h1 id="fh5co-logo"><a href="index.php"><i class="icon-airplane"></i>Travalokel</a></h1>
					<!-- START #fh5co-menu-wrap -->
					<nav id="fh5co-menu-wrap" role="navigation">
						<ul class="sf-menu" id="fh5co-primary-menu">
							<li><a href="index.php">Home</a></li>
                            <li><a href="flight.php">Flights</a></li>
							<li>
								<?php if( !isset($_SESSION['em']) && empty($_SESSION['em']) )
                                    {
                                    ?>
                                    <a class="fh5co-sub-ddown">Account</a>
								    <ul class="fh5co-sub-menu">
                                    <li><a href="login1.php">Log in</a></li>
                                    <?php }else{?>
                                     <a class="fh5co-sub-ddown"><?php echo $_SESSION['fn'] ?></a>
								    <ul class="fh5co-sub-menu">
                                    <li><a href="login1.php">Log out</a></li>
                                    <?php } ?>
									<li><a href="contact.php">Contact</a></li>
								</ul>
							</li>
							<!--<li><a href="car.html">Car</a></li>-->
							<!--<li><a href="blog.html">Blog</a></li>-->
							<!--<li><a href="contact.html">Contact</a></li>-->
                            <!--<li><a href="login.html">Login</a></li>-->
						</ul>
					</nav>
				</div>
			</div>
		</header>

		<!-- end:header-top -->

		<div id="fh5co-contact" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Booking Step</h3><br>
        <div class="step-nav">
            <div class="step first">
                <div class="radial-progress active" data-index="0" >
                    <div class="circle"  id="1">
                        <div class="mask full">
                            <div class="fill"></div>
                        </div>
                        <div class="mask half">
                            <div class="fill"></div>
                            <div class="fill fix"></div>
                        </div>
                        <div class="shadow"></div>
                    </div>
                    <a href = "passenger.php">
                    <div class="inset"><div class="inner-circle" ></div></div>
                    </a>
                </div>
                <p>1</p>
            </div>	
            <div class="step active">
                <div class="line">
                    <div class="progress"></div>
                </div>
                <div class="radial-progress" data-index="1" >
                    <div class="circle"  id="2" >
                        <div class="mask full">
                            <div class="fill"></div>
                        </div>
                        <div class="mask half">
                            <div class="fill"></div>
                            <div class="fill fix"></div>
                        </div>
                        <div class="shadow"></div>
                    </div>
                    <a href = "payment.php">
                    <div class="inset"><div class="inner-circle" ></div></div>
                    </a>
                </div>
                <p>2</p>
            </div>
            <div class="step">
                <div class="line">
                    <div class="progress"></div>
                </div>
                <div class="radial-progress" data-index="2">
                    <div class="circle" id="3">
                        <div class="mask full">
                            <div class="fill"></div>
                        </div>
                        <div class="mask half">
                            <div class="fill"></div>
                            <div class="fill fix"></div>
                        </div>
                        <div class="shadow"></div>
                    </div>
                    <a href = "passenger.php">
                    <div class="inset"><div class="inner-circle" ></div></div>
                    </a>
                </div>
                <p>3</p>
            </div>
            <div class="step">
                <div class="line">
                    <div class="progress"></div>
                </div>
                <div class="radial-progress" data-index="3">
                    <div class="circle"  id="4">
                        <div class="mask full">
                            <div class="fill"></div>
                        </div>
                        <div class="mask half">
                            <div class="fill"></div>
                            <div class="fill fix"></div>
                        </div>
                        <div class="shadow"></div>
                    </div>
                    <a href = "passenger.php">
                    <div class="inset"><div class="inner-circle" ></div></div>
                    </a>
                </div>
                <p>4</p>
            </div>
        </div>
        </div>
        </div>
        <div class="row animate-box">
        <table id="t01">
        <tr>
            <th>E-Ticket</th>
        </tr>
        <tr>
        <td style='background-color:rgba(0, 0, 0, 0.04)'></td>
        </tr>
        </table>
        </div>
                
        <div class="row animate-box">
            

<script>
   window.onload = function animateToActive(el) {
    document.getElementById("4").click(); // Click on the checkbox
}
    </script>
     
    <table id="t01">
    <?php
        
         if(count($bookingIDs)>1){
    echo "<tr><td></td><td></td></tr>";
    echo "<tr><td>Airline Booking Code (PNR)<br>";
    echo "<h1 style='font-size:23px'>".$start[0]['PNR']."</h1></td>";
    echo "<td>Booking ID : ";
    echo $start[0]['bookingID']."</td></tr>";
        
    echo "<tr><td></td><td></td></tr>";
    //airline, aircraft
    echo "<tr><td>Flight Detail: <br>";
    echo $start[0]['airlineName']."-";
    echo $start[0]['aircraftID']."<td></td></tr>";
    echo "<tr><td></td><td></td></tr>";
    //From
    //.date("H:i:s",strtotime($start['dateStart'])).
    //.date("jS F, Y", strtotime($start['dateStart'])).
    
    echo "<tr><td>From : ".$start[0]['fullName']."<br>";
    echo $start[0]['state']."<br>";
    echo $start[0]['city'];
    echo "<td>Date and Time: <br>";
    echo date("jS F, Y", strtotime($start[0]['dateStart']))."<br>";
    echo date("H:i:s",strtotime($start[0]['dateStart']))."</td></tr>";
    echo "<tr><td></td><td></td></tr>";
    //To
    echo "<tr><td>From : ".$dest[0]['fullName']."<br>";
    echo $dest[0]['state']."<br>";
    echo $dest[0]['city'];
    echo "<td>Date and Time: <br>";
    echo date("jS F, Y", strtotime($dest[0]['dateEnd']))."<br>";
    echo date("H:i:s",strtotime($dest[0]['dateEnd']))."</td></tr>";
    echo "<tr><td></td><td></td></tr>";
        
        /////////////////////////
    echo "<tr><td>Airline Booking Code (PNR)<br>";
    echo "<h1 style='font-size:23px'>".$start[1]['PNR']."</h1></td>";
    echo "<td>Booking ID : ";
    echo $start[1]['bookingID']."</td></tr>";
        
    echo "<tr><td></td><td></td></tr>";
    //airline, aircraft
    echo "<tr><td>Flight Detail: <br>";
    echo $start[1]['airlineName']."-";
    echo $start[1]['aircraftID']."<td></td></tr>";
    echo "<tr><td></td><td></td></tr>";
    //From
    //.date("H:i:s",strtotime($start['dateStart'])).
    //.date("jS F, Y", strtotime($start['dateStart'])).
    
    echo "<tr><td>From : ".$start[1]['fullName']."<br>";
    echo $start[1]['state']."<br>";
    echo $start[1]['city'];
    echo "<td>Date and Time: <br>";
    echo date("jS F, Y", strtotime($start[1]['dateStart']))."<br>";
    echo date("H:i:s",strtotime($start[1]['dateStart']))."</td></tr>";
    echo "<tr><td></td><td></td></tr>";
    //To
    echo "<tr><td>From : ".$dest[0]['fullName']."<br>";
    echo $dest[1]['state']."<br>";
    echo $dest[1]['city'];
    echo "<td>Date and Time: <br>";
    echo date("jS F, Y", strtotime($dest[1]['dateEnd']))."<br>";
    echo date("H:i:s",strtotime($dest[1]['dateEnd']))."</td></tr>";
    echo "<tr><td></td><td></td></tr>";
        
    }
    else{
    echo "<tr><td></td><td></td></tr>";
    echo "<tr><td>Airline Booking Code (PNR)<br>";
    echo "<h1 style='font-size:23px'>".$start[0]['PNR']."</h1></td>";
    echo "<td>Booking ID : ";
    echo $start[0]['bookingID']."</td></tr>";
        
    echo "<tr><td></td><td></td></tr>";
    //airline, aircraft
    echo "<tr><td>Flight Detail: <br>";
    echo $start[0]['airlineName']."-";
    echo $start[0]['aircraftID']."<td></td></tr>";
    echo "<tr><td></td><td></td></tr>";
    //From
    //.date("H:i:s",strtotime($start['dateStart'])).
    //.date("jS F, Y", strtotime($start['dateStart'])).
    
    echo "<tr><td>From : ".$start[0]['fullName']."<br>";
    echo $start[0]['state']."<br>";
    echo $start[0]['city'];
    echo "<td>Date and Time: <br>";
    echo date("jS F, Y", strtotime($start[0]['dateStart']))."<br>";
    echo date("H:i:s",strtotime($start[0]['dateStart']))."</td></tr>";
    echo "<tr><td></td><td></td></tr>";
    //To
    echo "<tr><td>From : ".$dest[0]['fullName']."<br>";
    echo $dest[0]['state']."<br>";
    echo $dest[0]['city'];
    echo "<td>Date and Time: <br>";
    echo date("jS F, Y", strtotime($dest[0]['dateEnd']))."<br>";
    echo date("H:i:s",strtotime($dest[0]['dateEnd']))."</td></tr>";
    echo "<tr><td></td><td></td></tr>";
    }
    echo "<tr><td> Passenger Name <br>";
        
    //Passengers
    $number = count($passengers);
    if($number > 0){
        for($i = 0; $i < $number; $i++){
            $order = $i+1;
            echo $order." "."".$passengers[$i]["passengerFirstName"].""." ".$passengers[$i]["passengerLastName"]."<br>";
        }
    }   
    echo "</td><td></td></tr>";
 
    ?>
        
    </table>
        </div>

			</div>
		</div>
        </div>
		<div id="fh5co-testimonial" style="background-image:url(images/img_bg_1.jpg);">
        <div id="fh5co-features">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Happy Clients</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="box-testimony animate-box">
						<blockquote>
							<span class="quote"><span><i class="icon-quotes-right"></i></span></span>
							<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
						</blockquote>
						<p class="author"><br>JJohn Doe, CEO <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a> <span class="subtext">Creative Director</span></p>
					</div>
					
				</div>
				<div class="col-md-4">
					<div class="box-testimony animate-box">
						<blockquote>
							<span class="quote"><span><i class="icon-quotes-right"></i></span></span>
							<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.&rdquo;</p>
						</blockquote>
						<p class="author"><br>JJohn Doe, CEO <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a> <span class="subtext">Creative Director</span></p>
					</div>
					
					
				</div>
				<div class="col-md-4">
					<div class="box-testimony animate-box">
						<blockquote>
							<span class="quote"><span><i class="icon-quotes-right"></i></span></span>
							<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
						</blockquote>
						<p class="author"><br>John Doe, Founder <a href="#">FREEHTML5.co</a> <span class="subtext">Creative Director</span></p>
					</div>
                </div>
				</div>
        </div>
		</div>
	    </div>
		<footer>
			<div id="footer">
				<div class="container">
					<div class="row row-bottom-padded-md">
						<div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
							<h3>About Travel</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
							<h3>Top Flights Routes</h3>
							<ul>
								<li><a href="#">Manila flights</a></li>
								<li><a href="#">Dubai flights</a></li>
								<li><a href="#">Bangkok flights</a></li>
								<li><a href="#">Tokyo Flight</a></li>
								<li><a href="#">New York Flights</a></li>
							</ul>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
							<h3>Top Hotels</h3>
							<ul>
								<li><a href="#">Boracay Hotel</a></li>
								<li><a href="#">Dubai Hotel</a></li>
								<li><a href="#">Singapore Hotel</a></li>
								<li><a href="#">Manila Hotel</a></li>
							</ul>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
							<h3>Interest</h3>
							<ul>
								<li><a href="#">Beaches</a></li>
								<li><a href="#">Family Travel</a></li>
								<li><a href="#">Budget Travel</a></li>
								<li><a href="#">Food &amp; Drink</a></li>
								<li><a href="#">Honeymoon and Romance</a></li>
							</ul>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
							<h3>Best Places</h3>
							<ul>
								<li><a href="#">Boracay Beach</a></li>
								<li><a href="#">Dubai</a></li>
								<li><a href="#">Singapore</a></li>
								<li><a href="#">Hongkong</a></li>
							</ul>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
							<h3>Affordable</h3>
							<ul>
								<li><a href="#">Food &amp; Drink</a></li>
								<li><a href="#">Fare Flights</a></li>
							</ul>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-md-offset-3 text-center">
							<p class="fh5co-social-icons">
								<a href="#"><i class="icon-twitter2"></i></a>
								<a href="#"><i class="icon-facebook2"></i></a>
								<a href="#"><i class="icon-instagram"></i></a>
								<a href="#"><i class="icon-dribbble2"></i></a>
								<a href="#"><i class="icon-youtube"></i></a>
							</p>
							<p>Copyright 2016 Free Html5 <a href="#">Module</a>. All Rights Reserved. <br>Made with <i class="icon-heart3"></i> by <a href="http://freehtml5.co/" target="_blank">Freehtml5.co</a> / Demo Images: <a href="https://unsplash.com/" target="_blank">Unsplash</a></p>
						</div>
					</div>
				</div>
			</div>
		</footer>

	</div>
	<!-- END fh5co-page -->

	</div>
	<!-- END fh5co-wrapper -->

	<!-- jQuery -->

	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/sticky.js"></script>

	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Superfish -->
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="js/bootstrap-datepicker.min.js"></script>
	<!-- CS Select -->
	<script src="js/classie.js"></script>
	<script src="js/selectFx.js"></script>
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="js/google_map.js"></script>
	
	<!-- Main JS -->
	<script src="js/main.js"></script>
        
    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js'></script>
    <script  src="js/index.js"></script>
    <!-- 4 step -->
        
	</body>
</html>