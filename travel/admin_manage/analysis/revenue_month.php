<?php

/* Include the fusioncharts.php file that contains functions to embed the charts. */

include("fusioncharts.php");

/* The following 4 code lines contain the database connection information. Alternatively, you can move these code lines to a separate file and include the file here. You can also modify this code based on your database connection. */

$hostdb = "localhost"; // MySQl host
$userdb = "root"; // MySQL username
$passdb = ""; // MySQL password
$namedb = "projectdb"; // MySQL database name

// Establish a connection to the database
$dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);

/*Render an error message, to avoid abrupt failure, if the database connection parameters are incorrect */
if ($dbhandle->connect_error) {
exit("There was an error with your connection: ".$dbhandle->connect_error);
}
?>


<!-- You need to include the following JS file to render the chart.
When you make your own charts, make sure that the path to this JS file is correct.
Else, you will get JavaScript errors. -->

<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>

<?php

    // Form the SQL query that returns the top 10 most populous countries
    $strQuery = "SELECT MONTHNAME(dateStart) as Month,SUM(totalAmount) as Revenue from payment_and_bill pb 
 INNER JOIN passenger ps ON pb.passengerID = ps.passengerID
    INNER JOIN booking b ON ps.bookingID = b.bookingID
    INNER JOIN legs l ON b.legID = l.legID
    INNER JOIN aircraft ac ON l.aircraftID = ac.aircraftID
    INNER JOIN airline al ON ac.airlineID = al.airlineID
    GROUP BY MONTHNAME(dateStart)
    ORDER BY SUM(totalAmount) DESC
     LIMIT 10";

    // Execute the query, or else return the error message.
    $result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");

    // If the query returns a valid response, prepare the JSON string
    if ($result) {
        // The `$arrData` array holds the chart attributes and data
        $arrData = array(
            "chart" => array(
              "caption" => "Revenue on each airline",
                        "paletteColors" => "#F70D1A,#F87217,#FFD801,#52D017,#4EE2EC",
               "bgColor" => "#ffffff",
              "borderAlpha"=> "20",
              "canvasBorderAlpha"=> "0",
              "usePlotGradientColor"=> "1",
              "plotBorderAlpha"=> "10",
              "showXAxisLine"=> "1",
              "xAxisLineColor" => "#ff4500",
              "showValues" => "1",
              "divlineColor" => "#999999",
              "divLineIsDashed" => "1",
              "showAlternateHGridColor" => "0",
              "canvasbgColor" => "#ffffff",
              "xAxisName" => "Month Name",
              "yAxisName" => "Amount (unit: dollars($))", 
              "placeValuesInside" => "1",
              "xAxisNameFont" => "Arial",
              "xAxisNameFontSize" => "12",
              "xAxisNameFontColor" => "#993300",
              "xAxisNameFontBold" => "1",
              "xAxisNameFontItalic" => "1",
              "yAxisNameFont" => "Arial",
              "yAxisNameFontSize" => "12",
              "yAxisNameFontColor" => "#993300",
              "yAxisNameFontBold" => "1",
              "yAxisNameFontItalic" => "1",
              "valueFont" => "Arial",
              "valueFontColor" => "#ffffff",
              "valueFontSize" => "14",
              "valueFontBold" => "1",
              "valueFontItalic"=> "1",
              "valueFontAlpha" => "90",
              "numberprefix" => "$",
               "rotateValues" => "1"
            )
        );

        $arrData["data"] = array();

// Push the data into the array

        while($row = mysqli_fetch_array($result)) {
        array_push($arrData["data"], array(
           "label" => $row["Month"],
          "value" => $row["Revenue"]
            )
        );
        }

        /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

        $jsonEncodedData = json_encode($arrData);

/*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

        $columnChart = new FusionCharts("column2D", "myFirstChart" , 800, 500, "chart-1", "json", $jsonEncodedData);
        // Render the chart
        $columnChart->render();

        // Close the database connection
        $dbhandle->close();
    }

?>
<body>
<h1 class="center">Analysis Report</h1><br>
<div id="chart-1" class="center"><!-- Fusion Charts will render here--></div> 
</body>