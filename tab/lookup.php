<?php

$param = $_POST["rownum"];
$con = mysql_connect("localhost","root","");
if (!$con) {
  die('Could not connect: ' . mysql_error());
}
mysql_select_db("artrqst", $con);


$query = mysql_query("SELECT `image` FROM `new_art_request` WHERE `id` = '^$param'");


	for ($x = 0, $numrows = mysql_num_rows($query); $x < $numrows; $x++) {
		$row = mysql_fetch_assoc($query);
		$friends[$x] = array("new_art_request_num" => $row["new_art_request_num"]);		
	}


mysql_close($con);




?>