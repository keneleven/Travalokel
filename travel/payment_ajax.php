<?php
// Start the session
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectdb";
$con=mysqli_connect($servername,$username,$password,$dbname);
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

    $search_airport_start =  $_SESSION["airport_star"];
    $search_airport_destination = $_SESSION["airport_destination"];
    $search_check_in = $_SESSION["check_in"];
    $search_round_trip =  $_SESSION["round_trip"];
    $search_check_out = $_SESSION["check_out"];
    $search_class = $_SESSION["class"];
    $search_adult = $_SESSION["adult"];
    $search_children = $_SESSION["children"];

    $sql_legs_start = "SELECT fullName 
                        FROM airport
                        WHERE airportID='$search_airport_start';";
    
    $sql_legs_destination = "SELECT fullName 
                        FROM airport
                        WHERE airportID='$search_airport_destination';";

    $query_airport_start = mysqli_query($con, $sql_legs_start);
    $airportID_start = mysqli_fetch_assoc($query_airport_start);
    
    $query_airport_destination = mysqli_query($con, $sql_legs_destination);
    $airportID_destination = mysqli_fetch_assoc($query_airport_destination);

    
    $sql_legs_go = "SELECT l.legID, a.fullname, b.fullname, d.airlineName, l.dateStart, l.dateEnd, l.duration, l.price
        FROM legs AS l  
        INNER JOIN airport AS a
            ON l.airportIDStart=a.airportID
        INNER JOIN airport AS b
            ON l.airportIDDest=b.airportID
        INNER JOIN aircraft AS c
            ON l.aircraftID=c.aircraftID
        INNER JOIN airline AS d
            ON c.airlineID=d.airlineID
        WHERE l.legID = '".$_SESSION["booking_go"]."';";
    $query_legs_go = mysqli_query($con, $sql_legs_go);
    $leg_go = mysqli_fetch_assoc($query_legs_go);

    $sql_legs_back = "SELECT l.legID, a.fullname, b.fullname, d.airlineName, l.dateStart, l.dateEnd, l.duration, l.price
        FROM legs AS l  
        INNER JOIN airport AS a
            ON l.airportIDStart=a.airportID
        INNER JOIN airport AS b
            ON l.airportIDDest=b.airportID
        INNER JOIN aircraft AS c
            ON l.aircraftID=c.aircraftID
        INNER JOIN airline AS d
            ON c.airlineID=d.airlineID
        WHERE l.legID = '".$_SESSION["booking_back"]."';";
    $query_legs_back = mysqli_query($con, $sql_legs_back);
    $leg_back = mysqli_fetch_assoc($query_legs_back);


//customer contact detail
// escape variables for security
/*
$customer_firstname = mysqli_real_escape_string($con, $_GET['customerFirstname']);
$customer_lastname = mysqli_real_escape_string($con, $_GET['customerLastname']);
$customer_phone = mysqli_real_escape_string($con, $_GET['customerPhone']);
$customer_email = mysqli_real_escape_string($con, $_GET['email']);
//passenger contact detail
$passenger_no = mysqli_real_escape_string($con, $_GET['passengerNo']);
$passenger_firstname = mysqli_real_escape_string($con, $_GET['passengerFirstname']);
$passenger_lastname = mysqli_real_escape_string($con, $_GET['passengerLastname']);
$passenger_sex = mysqli_real_escape_string($con, $_GET['passengerSex']);
$passenger_special = mysqli_real_escape_string($con, $_GET['passengerSpecial']);*/
 
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
        background-color: #fff;
        }
        table#t01 th {
        background-color: #F48536;
        color: white;
        text-align: center;
        font-size: 30px;
        font-style: bold;
        font-family: monospace;
        }
        input[type="text"]{
            display: inline-block;
            width: 50 px;
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
        <button type="button" onclick = "delete()"> CLICK FUCK </button><br>
        <tr>
            <th>Select Card</th>
        </tr>
        <tr>
        <td style='background-color:rgba(0, 0, 0, 0.04)'></td>
        </tr>
        </table>
        </div>
                
        <div class="row animate-box">
            

<script>
   window.onload = function animateToActive(el) {
    document.getElementById("2").click(); // Click on the checkbox
    document.getElementById("2").click()
}
    </script>
    
<div class="col-md-8 animate-box fadeInUp animated">

<?php
// Start the session
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectdb";
$con=mysqli_connect($servername,$username,$password,$dbname);
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//  $_SESSION["em"]   >>>   use for email (is logging in)
//  $_SESSION["ls"]   >>>   use for selected legsID from booking page.
$em=$_SESSION['em'];
$sql="SELECT email FROM customer_information WHERE email='$em';";
$query=mysqli_query($con, $sql);
$result_id=mysqli_fetch_assoc($query);
$customerID=$result_id['email'];
if (!mysqli_query($con,$sql)) {
    die('Error: ' . mysqli_error($con));
}else {


        echo " ----ADD NEW CREDIT CARD.----
            
            <form method='POST' action='/travel/payment.php'>
                card_flag:<input type='text' name='card_flag'><br>
                card_type:<input type='text' name='card_type'><br>
                card_holder:<input type='text' name='card_holder'><br>
                card_number:<input type='text' name='card_number' required><br>
                cv:<input type='text' name='cv'><br>
                validity_date:<input type='text' name='validity_date'><br>
                <input type='submit'name='add_card' >
            </form>";
        if($_POST['add_card']){
            //customer credit card
            $customer_card_flag = $_POST['card_flag'];
            $customer_card_type = $_POST['card_type'];
            $customer_card_holder = $_POST['card_holder'];
            $customer_card_number = $_POST['card_number'];
            $customer_card_cv = $_POST['cv'];
            $customer_card_validity_date = $_POST['validity_date'];
            $sql_insert_card="INSERT INTO card_type (Card_Flag, customerID, Card_Type, CardHolder_Name, Card_Number, CV_Code, Validity_Date) 
                            VALUES('$customer_card_flag', '$customerID', '$customer_card_type', '$customer_card_holder', '$customer_card_number', '$customer_card_cv', '$customer_card_validity_date');";
            //$query_insert_card=mysqli_query($con, $sql_insert_card);
            if (!mysqli_query($con, $sql_insert_card)){   
                die('Error: ' . mysqli_error($con));
            }else  {
                echo "insert card successful!";
                header("Refresh:0");
            } 
        }   
}
mysqli_close($con);
?>
    

    <!-------------------------------------------------------------------------------------------------------------------------->
        </div>
            <div class="col-md-4">
                 <table id="t01">
                <tr>
                    <td  colspan="3" style='background-color:#C0C0C0'><strong>Flight Detail</strong></td>
                </tr>   
                <td colspan = "3"><h3 style="margin : 10px 10px -10px 0">
                <?php echo $search_check_in ?>
                </h3></td>
                </tr>
                <tr>
                <td><?php echo "<h3 style='margin : 10px 10px -20px 0'>".$leg_go['airlineName']."</h3><br>".$search_class ?></td>
                <td><br></td>
                <td><br></td>
                </tr>
                <tr>
                <td>
                <?php echo "<strong>".date("H:i:s",strtotime($leg_go['dateStart']))."</strong><br>".$airportID_start['fullName']; ?>
                </td>
                <td>  
                <?php echo "<strong>".date("H:i:s",strtotime($leg_go['dateEnd']))."</strong><br>".$airportID_destination['fullName']; ?>
                </td>
                <td><strong>   
                <?php echo $leg_go['duration']; ?>
                </strong></td> 
                </tr>
                
                <tr>
                <tr>
                <td colspan = "3" style="background-color: rgba(0, 0, 0, 0.04);"></td>
                </tr> 
                
                
                <?php
                if($search_round_trip=="check"){?>
                <tr>
                    <td  colspan="3" style='background-color:#C0C0C0'><strong>Flight Detail</strong></td>
                </tr> 
                <td colspan = "3"><h3 style="margin : 10px 10px -10px 0">
                <?php echo $search_check_in ?>
                </h3></td>
                </tr>
                <tr>
                <td><?php echo "<h3 style='margin : 10px 10px -20px 0'>".$leg_go['airlineName']."</h3><br>".$search_class ?></td>
                <td><br></td>
                <td><br></td>
                </tr>
                <tr>
                <td>
                <?php echo "<strong>".date("H:i:s",strtotime($leg_back['dateEnd']))."</strong><br>".$airportID_destination['fullName']; ?>
                </td>
                <td>  
                <?php echo "<strong>".date("H:i:s",strtotime($leg_back['dateStart']))."</strong><br>".$airportID_start['fullName']; ?>
                </td>
                <td><strong>   
                <?php echo $leg_go['duration']; ?>
                </strong></td> 
                </tr>
                <tr>
                <td colspan = "3"></td>
                </tr>
                <tr>
                <td colspan = "3" style="background-color: rgba(0, 0, 0, 0.04);"></td>
                </tr> 
                <?php } ?> 
                <tr>
                    <td  colspan="3" style='background-color:#C0C0C0'><strong>Summary</strong></td>
                </tr>     
                                 <?php
                if($search_round_trip=="check"&&intval($search_children)>0){   
                echo 
                "<tr>
                <td><strong>Total Price</strong></td><td></td>
                <td><strong>US$ ".(intval($leg_go['price'])*intval($search_adult)
                    +intval($leg_go['price'])*0.5*intval($search_children)
                    +intval($leg_back['price'])*intval($search_adult)
                    +intval($leg_back['price'])*0.5*intval($search_children))
                    ."</strong></td>
                </tr>";}
                else if($search_round_trip=="check"&&intval($search_children)==0){
                echo 
                "<tr>
                <td><strong>Total Price</strong></td><td></td>
                <td><strong>US$ ".(intval(($leg_go['price'])*($search_adult))+intval(($leg_back['price'])*($search_adult)))."</strong></td>
                </tr>"; 
                }
                else if($search_round_trip!="check"&&intval($search_children)>0){
                echo 
                "<tr>
                <td><strong>Total Price</strong></td><td></td>
                <td><strong>US$ ".intval($leg_go['price'])*($search_adult+($search_children*0.5))."</strong></td>
                </tr>"; 
                }
                else{
                echo 
                "<tr>
                <td><strong>Total Price</strong></td><td></td>
                <td><strong>US$ ".intval($leg_go['price'])*($search_adult+($search_children))."</strong></td>
                </tr>"; 
                }
                
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
        

    <script src="js/jquery-1.8.1.min.js" type="text/javascript"></script>
    <script src="js/my_script.js" type="text/javascript"></script>  
	</body>
</html>
