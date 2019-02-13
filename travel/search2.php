<?php session_start(); ?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Travel &mdash; 100% Free Fully Responsive HTML5 Template by FREEHTML5.co</title>
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
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


	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
    <script src="js/sortable.js"></script>
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
        padding: 2em;
        text-align: center;
        }
        table#t01 tr:nth-child(even) {
        background-color: #eee;
        }
        table#t01 tr:nth-child(odd) {
        background-color: #fff;
        }
        table#t01 th {
        background-color: black;
        color: white;
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
                    <h1 style="text-align: center">Hot Promotions</h1>
				</div>
                <div class="row">
					<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
						<div href="#"><img src="images/place-1.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
							<div class="desc">
								<span></span>
								<h3>New York</h3>
								<span>3 nights + Flight 5*Hotel</span>
								<span class="price">$1,000</span>
								<a class="btn btn-primary btn-outline" href="#">Book Now <i class="icon-arrow-right22"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
						<div href="#"><img src="images/place-2.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
							<div class="desc">
								<span></span>
								<h3>Philippines</h3>
								<span>4 nights + Flight 5*Hotel</span>
								<span class="price">$1,000</span>
								<a class="btn btn-primary btn-outline" href="#">Book Now <i class="icon-arrow-right22"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
						<div href="#"><img src="images/place-3.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
							<div class="desc">
								<span></span>
								<h3>Hongkong</h3>
								<span>2 nights + Flight 4*Hotel</span>
								<span class="price">$1,000</span>
								<a class="btn btn-primary btn-outline" href="#">Book Now <i class="icon-arrow-right22"></i></a>
							</div>
						</div>
					</div>
				</div>
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
    // escape variables for security
    $search_airport_start =  $_SESSION["airport_star"];
    $search_airport_destination = $_SESSION["airport_destination"];
    $search_check_in = $_SESSION["check_in"];
    $search_round_trip =  $_SESSION["round_trip"];
    $search_check_out = $_SESSION["check_out"];
    $search_class = $_SESSION["class"];
    $search_adult = $_SESSION["adult"];
    $search_children = $_SESSION["children"];
                
    $legID_store = mysqli_real_escape_string($con, $_POST['booking1']);
    $_SESSION["booking_go"]=$legID_store;
            
                
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
                
    //search legID from legs table BY airportID from airport
    $sql_search_legs = "SELECT l.legID, a.fullname, b.fullname, d.airlineName, l.dateStart, l.dateEnd, l.duration, l.price
        FROM legs AS l  
        INNER JOIN airport AS a
            ON l.airportIDStart=a.airportID
        INNER JOIN airport AS b
            ON l.airportIDDest=b.airportID
        INNER JOIN aircraft AS c
            ON l.aircraftID=c.aircraftID
        INNER JOIN airline AS d
            ON c.airlineID=d.airlineID
        WHERE airportIDStart = '".$search_airport_destination."' AND 
            airportIDDest = '".$search_airport_start."' AND 
            DATE(dateStart) = '".$search_check_out."';";
    $query_search_legs = mysqli_query($con, $sql_search_legs);

                
    if (!mysqli_query($con, $sql_search_legs)){   
        die('Error: ' . mysqli_error($con));
    }else {
                       
     echo "<h1>".$airportID_destination['fullName']."<i class='fas fa-arrow-right'></i>".$airportID_start['fullName']."</h1>";
     echo "<h3 style='margin :0 0 5px 0'>".$search_check_in."</h3><h4>".$search_class."|Adult:".$search_adult;
     if($search_children!=NULL){
     echo "|Children:".$search_children."</h4>";}
     if($search_children==NULL){
     echo "</h4>";}
    ?>
    <table id="t01" class="sortable">
        <tr>
            <th>Airline</th>
            <th>From</th> 
            <th>To</th>
            <th>Duration</th>
            <th>Prices US$ </th>
            <th><i class="fas fa-angle-down"></i></th>
        </tr>
    <script>
        window.onload = function(){
            (document.getElementsByTagName('th')[4]).click();
        };
    </script>
    <?php
                
       while($legsID = mysqli_fetch_array($query_search_legs)) 
        { 
           $bookvalue = $legsID['legID'];
           
            echo "<tr>"
                ."<td><h44>".$legsID[3]."</h44></td>"
                ."<td><h44>".$legsID[1]."<br>"
                .date("H:i:s",strtotime($legsID[4]))."</h44></td>"
                ."<td><h44>".$legsID[2]."<br>"
                .date("H:i:s",strtotime($legsID[5]))."</td>"
                ."<td><h44>".$legsID[6]."</h44></td>"
                ."<td><h2 style='margin :-10px'>".$legsID[7]."</h2></td>"
                ."<td><h44><form method ='POST' action = '/travel/booking.php'> 
                    <button type='submit'  class='btn btn-primary btn-block' value= $bookvalue name = 'booking2'>Choose</button>
                </form>"."</h44></td></tr>";
        }   
    }
    // Set session variables

                
    $_SESSION["booking_back"]=$bookvalue;
                
    mysqli_close($con);
    ?>
        </table>
        </div>
		</div>
            
		<!-- END  -->

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

	</body>
</html>

