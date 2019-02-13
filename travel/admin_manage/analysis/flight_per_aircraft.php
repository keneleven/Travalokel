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

<!DOCTYPE html>
<html>
    <head>
        <title>Analysis form</title>
        <!--  Include the `fusioncharts.js` file. This file is needed to render the chart. Ensure that the path to this JS file is correct. Otherwise, it may lead to JavaScript errors. -->
        <script src="fusioncharts.js"></script>
    </head>
    <body>
        <?php
            /* `$arrData` is the associative array that is initialized to store the chart attributes. */
            
            $arrData = array(
                "chart" => array(
                    "caption"=> "Current number of flight for each aircraft",
                    "subCaption"=> "This year",
                    "enableSmartLabels"=> "0",
                    "showPercentValues"=> "1",
                    "showLegend"=> "1",
                    "decimals"=> "1",
                    "theme"=> "zune"
                )
            );
            /*
                The data to be plotted on the chart is stored in the `$actualData` array in the key-value form.
            */
            $strQuery = "SELECT aircraftID,COUNT(aircraftID) as AircraftCount FROM legs GROUP BY aircraftID LIMIT 10";

            // Execute the query, or else return the error message.
            $result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
            /*
                Convert the data in the `$actualData` array into a format that can be consumed by FusionCharts. The data for the chart should be in an array wherein each element of the array is a JSON object having the "label" and “value” as keys.
            */
            $arrData['data'] = array();
            // Iterate through the data in `$actualData` and insert in to the `$arrData` array.
            /*foreach ($row = mysqli_fetch_array($result) as $key => $value) {
                array_push($arrData['data'],
                    array(
                        'label' => $key,
                        'value' => $value
                    )
                );
            }*/
        while($row = mysqli_fetch_array($result)) {
        array_push($arrData["data"], array(
           'label' => $row["aircraftID"],
          'value' => $row["AircraftCount"]
            )
        );
        }

            /*
                JSON Encode the data to retrieve the string containing the JSON representation of the data in the array.
            */
            $jsonEncodedData = json_encode($arrData);
            /*
                Create an object for the pie chart  using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.
            */
            $pieChart = new FusionCharts("pie3D", "myFirstChart" , 800, 500, "chart-1", "json", $jsonEncodedData);
            // Render the chart
            $pieChart->render();
                    // Close the database connection
        $dbhandle->close();
?>
<body>
<h1 class="center">Analysis Report</h1><br>
<div id="chart-1" class="center"><!-- Fusion Charts will render here--></div> 
</body>