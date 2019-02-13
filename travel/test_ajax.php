<!DOCTYPE html>
<html>
<body>

<h2>Search</h2>
<!--<form action=""> 
<select name="airport" onchange="showAirport(this.value)">
<option value="">Select a customer:</option>
<option  id="AirportID" value="1">NYI</option>
</select>
</form>-->
<br>
<form>
<select id ="demo1" onchange="showAirport(this.value)">
 <option value="">Select</option>   
</select><br>
<select id = "txtHint">
<option value="">Select</option>
</select>
<br><br>
<input type="submit" name="">
</form>
<!--<div id ="txtHint" ></div>-->
<!--<select name="ID">
<option value="" id="txtHint"></option>
</select>-->

<script>

var obj, dbParam, xmlhttp, myObj, x, y, txt = ""; 

obj = { "airport":["codeName","airportID","state","fullName"], "limit":10};

dbParam = JSON.stringify(obj);
xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);
        txt += "<select  name = \"airport\" onchange=\"showAirport(this.value)\"> <option value=\"\">Select</option>"
        for (x in myObj) {
            txt += "<option value ="+myObj[x].airportID+">" +myObj[x].state + " - " + myObj[x].codeName + " < " +myObj[x].fullName + " > ";
        }
        txt += "</select>"
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

</body>
</html>