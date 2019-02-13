<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Analysis form index</title>
	<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
	<style>
		.topright {
		    position: absolute;
		    top: 100px;
		    left: 600px;
		    font-size: 18px;
		}
		.load{
		    top: 100px;
		    left: 600px;
		    font-size: 18px;
		    z-index: 10; position: absolute;
		    background-color: white;
		    height:650px;width:910px;
		    text-align: center;
		    line-height: 90px;
		}
		font{
			display: inline-block;
			width: 450px;
		}
		p{
			border-bottom: 1px solid #aaa;
		}
		.vertical-menu {
		    width: 450px;
		}

		.vertical-menu a {
		    background-color: #eee;
		    color: black;
		    display: block;
		    padding: 12px;
		    text-decoration: none;
		}

		.vertical-menu a:hover {
		    background-color: #ccc;
		}

		.vertical-menu a.active {
		    background-color: salmon;
		    color: white;
		}

	</style>
</head>
<body>
<div class="vertical-menu">
	<a href="" class="active"><font size="4px">List of Analysis Report</font></a>
	<a onclick="link_1()"><font size="4px">Number of airline in each airport:</font></a>
	<a onclick="link_2()"><font size="4px">Number of customer per class:</font></a>
	<a onclick="link_3()"><font size="4px">Amount of Customer Gender:</font></a>
	<a onclick="link_4()"><font size="4px">Number of airport usage on dependenture trip this year:</font></a> 
	<a onclick="link_5()"><font size="4px">Current number of flight for each aircraft this year:</font></a> 
	<a onclick="link_6()"><font size="4px">Number of airport usage on landing trip this year:</font></a> 
	<a onclick="link_7()"><font size="4px">Number of Aircraft in each Airline:</font></a>
	<a onclick="link_8()"><font size="4px">Most popular landmark:</font></a>
	<a onclick="link_9()"><font size="4px">Most promotion use by customer:</font></a>
	<a onclick="link_10()"><font size="4px">Revenue on each airline:</font></a>
	<a onclick="link_11()"><font size="4px">Amount of seat per class:</font></a>
	<a onclick="link_12()"><font size="4px">Time spend on each class:</font></a>
	<a onclick="link_13()"><font size="4px">Number of customer in each month:</font></a>
	<a onclick="link_14()"><font size="4px">Revenue on each aitline:</font></a>
	<a onclick="link_15()"><font size="4px">Number of customer on each airline:</font></a>
</div>
<div id = "load" class="load">
	Analysis Form
</div>
<div id = "visible" class="hidden">
<iframe id="Link1" class="topright 2 3 4 5 6 7 8 9 10 11 12 13 14 15" src = "airline_airport.php" style="height:600px;width:900px;" style="display:block; visibility:hidden">
</iframe>
<iframe id="Link2" class="topright 1 3 4 5 6 7 8 9 10 11 12 13 14 15" src = "customer_class.php" style="height:600px;width:600px;" style="display:block; visibility:hidden">
</iframe>
<iframe id="Link3" class="topright 1 2 4 5 6 7 8 9 10 11 12 13 14 15" src = "customer_gender.php" style="height:600px;width:900px;" style="display:block; visibility:hidden">
</iframe>
<iframe id="Link4" class="topright 1 2 3 5 6 7 8 9 10 11 12 13 14 15" src = "departure_airport.php" style="height:600px;width:900px;" style="display:block; visibility:hidden">
</iframe>
<iframe id="Link5" class="topright 1 2 3 4 6 7 8 9 10 11 12 13 14 15" src = "flight_per_aircraft.php" style="height:600px;width:900px;" style="display:block; visibility:hidden">
</iframe>
<iframe id="Link6" class="topright 1 2 3 4 5 7 8 9 10 11 12 13 14 15" src = "landing_airport.php" style="height:600px;width:900px;" style="display:block; visibility:hidden">
</iframe>
<iframe id="Link7" class="topright 1 2 3 4 5 6 8 9 10 11 12 13 14 15" src = "num_aircraft_airline.php" style="height:600px;width:900px;" style="display:block; visibility:hidden">
</iframe>
<iframe id="Link8" class="topright 1 2 3 4 5 6 7 9 10 11 12 13 14 15" src = "popular_landmark.php" style="height:600px;width:900px;" style="display:block; visibility:hidden">
</iframe>
<iframe id="Link9" class="topright 1 2 3 4 5 6 7 8 10 11 12 13 14 15" src = "popular_promotion.php" style="height:600px;width:900px;" style="display:block; visibility:hidden">
</iframe>
<iframe id="Link10" class="topright 1 2 3 4 5 6 7 8 9 11 12 13 14 15" src = "revenue_airline.php" style="height:600px;width:900px;" style="display:block; visibility:hidden">
</iframe>
<iframe id="Link11" class="topright 1 2 3 4 5 6 7 8 9 10 12 13 14 15" src = "seat_class.php" style="height:600px;width:900px;" style="display:block; visibility:hidden">
</iframe>
<iframe id="Link12" class="topright 1 2 3 4 5 6 7 8 9 10 11 13 14 15" src = "timespend_class.php" style="height:600px;width:900px;" style="display:block; visibility:hidden">
</iframe>
<iframe id="Link13" class="topright 1 2 3 4 5 6 7 8 9 10 11 12 14 15" src = "customer_month.php" style="height:600px;width:900px;" style="display:block; visibility:hidden">
</iframe>
<iframe id="Link14" class="topright 1 2 3 4 5 6 7 8 9 10 11 12 13 15" src = "revenue_month.php" style="height:600px;width:900px;" style="display:block; visibility:hidden">
</iframe>
<iframe id="Link15" class="topright 1 2 3 4 5 6 7 8 9 10 11 12 13 14" src = "customer_airline.php" style="height:600px;width:900px;" style="display:block; visibility:hidden">
</iframe>
</div>
<script>
function link_1() {
    var x = document.getElementById("Link1");
    var y = document.getElementsByClassName("1");
    var a = document.getElementById("load");
    a.style.display = "none";
    for (var i = 0; i <14; i++) {
    	y[i].style.display = "none";
    }
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
function link_2() {
    var x = document.getElementById("Link2");
    var y = document.getElementsByClassName("2");
    var a = document.getElementById("load");
    a.style.display = "none";
    for (var i = 0; i <14; i++) {
    	y[i].style.display = "none";
    }
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
    	x.style.display === "none"
    }
}
function link_3() {
    var x = document.getElementById("Link3");
    var y = document.getElementsByClassName("3");
    var a = document.getElementById("load");
    a.style.display = "none";
    for (var i = 0; i <14; i++) {
    	y[i].style.display = "none";
    }
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
    	x.style.display === "none"
    }
}
function link_4() {
    var x = document.getElementById("Link4");
    var y = document.getElementsByClassName("4");
    var a = document.getElementById("load");
    a.style.display = "none";
    for (var i = 0; i <14; i++) {
    	y[i].style.display = "none";
    }
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
    	x.style.display === "none"
    }
}
function link_5() {
    var x = document.getElementById("Link5");
    var y = document.getElementsByClassName("5");
    var a = document.getElementById("load");
    a.style.display = "none";
    for (var i = 0; i <14; i++) {
    	y[i].style.display = "none";
    }
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
    	x.style.display === "none"
    }
}
function link_6() {
    var x = document.getElementById("Link6");
    var y = document.getElementsByClassName("6");
    var a = document.getElementById("load");
    a.style.display = "none";
    for (var i = 0; i <14; i++) {
    	y[i].style.display = "none";
    }
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
    	x.style.display === "none"
    }
}
function link_7() {
    var x = document.getElementById("Link7");
    var y = document.getElementsByClassName("7");
    var a = document.getElementById("load");
    a.style.display = "none";
    for (var i = 0; i <14; i++) {
    	y[i].style.display = "none";
    }
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
    	x.style.display === "none"
    }
}
function link_8() {
    var x = document.getElementById("Link8");
    var y = document.getElementsByClassName("8");
    var a = document.getElementById("load");
    a.style.display = "none";
    for (var i = 0; i <14; i++) {
    	y[i].style.display = "none";
    }
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
    	x.style.display === "none"
    }
}
function link_9() {
    var x = document.getElementById("Link9");
    var y = document.getElementsByClassName("9");
    var a = document.getElementById("load");
    a.style.display = "none";
    for (var i = 0; i <14; i++) {
    	y[i].style.display = "none";
    }
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
    	x.style.display === "none"
    }
}
function link_10() {
    var x = document.getElementById("Link10");
    var y = document.getElementsByClassName("10");
    var a = document.getElementById("load");
    a.style.display = "none";
    for (var i = 0; i <14; i++) {
    	y[i].style.display = "none";
    }
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
    	x.style.display === "none"
    }
}
function link_11() {
    var x = document.getElementById("Link11");
    var y = document.getElementsByClassName("11");
    var a = document.getElementById("load");
    a.style.display = "none";
    for (var i = 0; i <14; i++) {
    	y[i].style.display = "none";
    }
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
    	x.style.display === "none"
    }
}
function link_12() {
    var x = document.getElementById("Link12");
    var y = document.getElementsByClassName("12");
    var a = document.getElementById("load");
    a.style.display = "none";
    for (var i = 0; i <14; i++) {
    	y[i].style.display = "none";
    }
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
    	x.style.display === "none"
    }
}
function link_13() {
    var x = document.getElementById("Link13");
    var y = document.getElementsByClassName("13");
    var a = document.getElementById("load");
    a.style.display = "none";
    for (var i = 0; i <14; i++) {
    	y[i].style.display = "none";
    }
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
    	x.style.display === "none"
    }
}
function link_14() {
    var x = document.getElementById("Link14");
    var y = document.getElementsByClassName("14");
    var a = document.getElementById("load");
    a.style.display = "none";
    for (var i = 0; i <14; i++) {
    	y[i].style.display = "none";
    }
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
    	x.style.display === "none"
    }
}
function link_15() {
    var x = document.getElementById("Link15");
    var y = document.getElementsByClassName("15");
    var a = document.getElementById("load");
    a.style.display = "none";
    for (var i = 0; i <14; i++) {
    	y[i].style.display = "none";
    }
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
    	x.style.display === "none"
    }
}

</script>
</body>
</html>
