 <?php
    // Start the session
    session_start();
?>
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
    <script src="js/hide.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            var inputValue = $(this).attr("value");
            $("." + inputValue).toggle();
        });
    });
    </script>

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
						</ul>
					</nav>
				</div>
			</div>
		</header>

        <!-- end:header-top -->

            
		<div class="fh5co-hero">
			<div class="fh5co-overlay"></div>
			<div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url(images/cover_bg_3.jpg);">
				<div class="desc">
					<div class="container">
						<div class="row">
							<div class="col-sm-5 col-md-5">
								<!-- <a href="index.html" id="main-logo">Travel</a> -->
								<div class="tabulation animate-box">
								   <!-- Tab panes -->
									<div class="tab-content">
                                    <form action="/travel/search.php" method="post">    
									 <div role="tabpanel" class="tab-pane active" id="flights">
										<div class="row">
                                            
											<div class="col-xxs-12 col-xs-6 mt">
												<section>
													<label for="from">From</label>
                                                    <select name = "from" id = "demo1"  class="form-control" onchange="showAirport(this.value)" required>
                                                    <option value="">Select</option>
                                                    </select>
                                                </section>
											</div>
                                            
											<div class="col-xxs-12 col-xs-6 mt">
												<div class="input-field">
													<label for="from">To</label>
													<select name = "to" id ="txtHint"  class="form-control" required>
                                                    <option value="">Select</option>
                                                    </select>
												</div>
											</div>
											<div class="col-xxs-12 col-xs-6 mt alternate">
												<div class="input-field">
                                
													<label for="date-start">Check In</label>
													<input type="date" class="form-control" 
                                                           name = "check_in"  placeholder="mm/dd/yyyy"/ required>
												</div>
											</div>
      
                                            
                                            <div class="red check">
                                            <div class="col-xxs-12 col-xs-6 mt alternate" >
												<div class="input-field">
                                                    <label for="date-start">Check Out</label>
													<input type="date" class="form-control" 
                                                           name="check_out"  placeholder="mm/dd/yyyy"/ >
												</div>
											</div>
                                            </div>
                                            
                                            <div class="col-xxs-12 col-xs-6 mt">
                                                <label for="date-start">Round Trip</label>
                                                 <label class="switch">
                                                    <input type="hidden"  name="round" value="uncheck">
                                                    <input type="checkbox" checked name="round" value="check">


                                                    <span class="slider round"></span>
                                                </label>
											</div>
                                            
                                            <div class="col-sm-12 mt">
												<section>
													<label for="class">Class</label>
													<select name="class" class="form-control">
														<option value="Economy" selected>Economy</option>
														<option value="First">First</option>
														<option value="Business">Business</option>
													</select>
												</section>
											</div>
											<div class="col-xxs-12 col-xs-6 mt">
												<section>
													<label for="class">Adult</label>
													<select name = "adult" class="form-control">
														<option value="1" selected>1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
													</select>
												</section>
											</div>
                                            
											<div class="col-xxs-12 col-xs-6 mt">
												<section>
													<label for="class">Children</label>
													<select name = "children" class="form-control">
                										<option value="0" selected>0</option>
														<option value="1" >1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
													</select>
												</section>
											</div>
											<div class="col-xs-12">
												<input type="submit" class="btn btn-primary btn-block" value="Search Flight">
											</div>
										</div>
									 </div>
                                    </form>
									</div>
								</div>
							</div>
							<div class="desc2 animate-box">
								<div class="col-sm-7 col-sm-push-1 col-md-7 col-md-push-1">
									<p>HandCrafted by <a href="http://frehtml5.co/" target="_blank" class="fh5co-site-name">FreeHTML5.co</a></p>
									<h2>Exclusive Limited Time Offer</h2>
									<h3>Fly to Hong Kong via Los Angeles, USA</h3>
									<span class="price">$599</span>
									<!-- <p><a class="btn btn-primary btn-lg" href="#">Get Started</a></p> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!---------------------------------------------------------------------------<Script>-------------------------------------------------------------------------->
        <script>
        var obj, dbParam, xmlhttp, myObj, x, y, txt = ""; 

        obj = { "airport":["codeName","airportID","state","fullName"], "limit":10};

        dbParam = JSON.stringify(obj);
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                myObj = JSON.parse(this.responseText);
                //txt += "<select  name = \"airport\" onchange=\"showAirport(this.value)\"> <option value=\"\">Select</option>"
                txt += "<option value=\"\">Select</option>"
                for (x in myObj) {
                    txt += "<option value ="+myObj[x].airportID+">" +myObj[x].state + " - " + myObj[x].codeName + " < " +myObj[x].fullName + " > ";
                }
                //txt += "</select>"
                document.getElementById("demo1").innerHTML = txt;
            }
        };

        xmlhttp.open("GET", "getAirport.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("x=" + dbParam);

        function showAirport(str) {
          var xhttp;

          if (str == "") {
            document.getElementById("txtHint").innerHTML = txt;
            return;
          }
          xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("txtHint").innerHTML = this.responseText;
            }
          };
          xhttp.open("GET", "getLegID.php?q="+str, true);
          xhttp.send();
        }
        </script>
        <!---------------------------------------------------------------------------<Script>-------------------------------------------------------------------------->


		<div id="fh5co-contact" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Book A Flight</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
				<div class="row row-bottom-padded-md">
					<div class="col-md-12 animate-box">
						<h2 class="heading-title">Todays Flight Deal</h2>
					</div>
					<div class="col-md-6 animate-box">
						<div class="row">
							<div class="col-md-12">
								<h4>Better Deals, More Abilities</h4>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							</div>
							<div class="col-md-12">
								<h4>Keep up with the news of your airline</h4>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							</div>
							<div class="col-md-12">
								<h4>In-Flight Experience</h4>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							</div>
						</div>
					</div>
					<div class="col-md-6 animate-box">
						<img class="img-responsive" src="images/cover_bg_3.jpg" alt="travel">
						<a href="#" class="flight-book">
							<div class="plane-name">
								<span class="p-flight">United States Airways</span>
							</div>
							<div class="desc">
								<div class="left">
									<h4>HK-MNL</h4>
									<span>Dec 20 - Dec29</span>
								</div>
								<div class="right">
									<span class="price">
										<i class="icon-arrow-down22"></i>
										$1000
									</span>
								</div>
							</div>
						</a>
						<a href="#" class="flight-book">
							<div class="plane-name">
								<span class="p-flight">Qatar Airways</span>
							</div>
							<div class="desc">
								<div class="left">
									<h4>HK-MNL</h4>
									<span>Dec 20 - Dec29</span>
								</div>
								<div class="right">
									<span class="price">
										<i class="icon-arrow-down22"></i>
										$790
									</span>
								</div>
							</div>
						</a>
						<a href="#" class="flight-book">
							<div class="plane-name">
								<span class="p-flight">Philippine Airline</span>
							</div>
							<div class="desc">
								<div class="left">
									<h4>MNL-HK</h4>
									<span>Dec 20 - Dec29</span>
								</div>
								<div class="right">
									<span class="price">
										<i class="icon-arrow-down22"></i>
										$500
									</span>
								</div>
							</div>
						</a>
						<a href="#" class="flight-book">
							<div class="plane-name">
								<span class="p-flight">China Airways</span>
							</div>
							<div class="desc">
								<div class="left">
									<h4>HK-LAS</h4>
									<span>Dec 20 - Dec29</span>
								</div>
								<div class="right">
									<span class="price">
										<i class="icon-arrow-down22"></i>
										$900
									</span>
								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="row row-bottom-padded-md">
					<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
						<div href="#"><img src="images/place-1.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
							<div class="desc">
								<span></span>
								<h3>New York</h3>
								<span>3 nights</span>
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
								<span>4 nights</span>
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
								<span>2 nights</span>
								<span class="price">$1,000</span>
								<a class="btn btn-primary btn-outline" href="#">Book Now <i class="icon-arrow-right22"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
						<div href="#"><img src="images/place-4.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
							<div class="desc">
								<span></span>
								<h3>New York</h3>
								<span>3 nights</span>
								<span class="price">$1,000</span>
								<a class="btn btn-primary btn-outline" href="#">Book Now <i class="icon-arrow-right22"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
						<div href="#"><img src="images/place-5.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
							<div class="desc">
								<span></span>
								<h3>Philippines</h3>
								<span>4 nights</span>
								<span class="price">$1,000</span>
								<a class="btn btn-primary btn-outline" href="#">Book Now <i class="icon-arrow-right22"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
						<div href="#"><img src="images/place-6.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
							<div class="desc">
								<span></span>
								<h3>Hongkong</h3>
								<span>2 nights</span>
								<span class="price">$1,000</span>
								<a class="btn btn-primary btn-outline" href="#">Book Now <i class="icon-arrow-right22"></i></a>
							</div>
						</div>
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
						<p class="author">John Doe, CEO <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a> <span class="subtext">Creative Director</span></p>
					</div>
					
				</div>
				<div class="col-md-4">
					<div class="box-testimony animate-box">
						<blockquote>
							<span class="quote"><span><i class="icon-quotes-right"></i></span></span>
							<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.&rdquo;</p>
						</blockquote>
						<p class="author">John Doe, CEO <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a> <span class="subtext">Creative Director</span></p>
					</div>
					
					
				</div>
				<div class="col-md-4">
					<div class="box-testimony animate-box">
						<blockquote>
							<span class="quote"><span><i class="icon-quotes-right"></i></span></span>
							<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
						</blockquote>
						<p class="author">John Doe, Founder <a href="#">FREEHTML5.co</a> <span class="subtext">Creative Director</span></p>
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
	
	<!-- Main JS -->
	<script src="js/main.js"></script>

	</body>
</html>

