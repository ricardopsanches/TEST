<?php
define(HOST, "localhost");
define(USER, "root");
define(PW, "");
define(DB, "artrqst");

$connect = mysql_connect(HOST,USER,PW)
or die('Could not connect to mysql server.' );

mysql_select_db(DB, $connect)
or die('Could not select database.');

$idRW = $_POST['row_id'];

$idRW = mysql_escape_string($idRW); 



$sqlINFO = "SELECT * FROM `new_art_request` WHERE id='{$idRW}'";

$info_row =  mysql_query($sqlINFO);
if (!$info_row) {
	echo "work";
    die('Could not query:' . mysql_error());
}
   
    
    //$output = "Record information: ";
	$output = mysql_result($info_row, 0, 'id');
	$output .= '|';
	$output .= mysql_result($info_row, 0, 'image');
	$output .= '|';
	$output .= mysql_result($info_row, 0, 'approval');
	$output .= '|';
	$output .= mysql_result($info_row, 0, 'due_date');
	$output .= '|';
	$output .= mysql_result($info_row, 0, 'page_type');
	$output .= '|';
	$output .= mysql_result($info_row, 0, 'rqst_needed');
	$output .= '|';
	$output .= mysql_result($info_row, 0, 'hardcopies');
	$output .= '|';
	$output .= mysql_result($info_row, 0, 'return_to');
	$output .= '|';
	$output .= mysql_result($info_row, 0, 'new_art_concept_num');
	$output .= '|';
	$output .= mysql_result($info_row, 0, 'name');
	$output .= '|';
	$output .= mysql_result($info_row, 0, 'style_number0');
	$output .= '|';
	$output .= mysql_result($info_row, 0, 'style_colors0');
		$output .= '|';
	$output .= mysql_result($info_row, 0, 'style_number1');
		$output .= '|';
	$output .= mysql_result($info_row, 0, 'style_colors1');
		$output .= '|';
	$output .= mysql_result($info_row, 0, 'style_number2');
		$output .= '|';
	$output .= mysql_result($info_row, 0, 'style_colors2');
		$output .= '|';
	$output .= mysql_result($info_row, 0, 'style_number3');
		$output .= '|';
	$output .= mysql_result($info_row, 0, 'style_colors3');
		$output .= '|';
	$output .= mysql_result($info_row, 0, 'style_number4');
		$output .= '|';
	$output .= mysql_result($info_row, 0, 'style_colors4');
		
    echo $output
    //echo $output
    

    
    
    

?>