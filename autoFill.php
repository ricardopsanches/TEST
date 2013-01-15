<?php

	//connection information
	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "csv_db";
	$param = $_GET["term"];
	
	//make connection
	$server = mysql_connect($host, $user, $password);
	$connection = mysql_select_db($database, $server);
	
	//query the database
	$query = mysql_query("SELECT * FROM garment_colors WHERE color_name REGEXP '^$param'");
	
	//build array of results
	for ($x = 0, $numrows = mysql_num_rows($query); $x < $numrows; $x++) {
		$row = mysql_fetch_assoc($query);
    
		$friends[$x] = array("color_name" => $row["color_name"]);		
	}
	
	//echo JSON to page
	$response = $_GET["callback"] . "(" . json_encode($friends) . ")";
	echo $response;
	
	mysql_close($server);
	
?>