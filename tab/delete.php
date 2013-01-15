<?php
define(HOST, "localhost");
define(USER, "root");
define(PW, "");
define(DB, "artrqst");

$connect = mysql_connect(HOST,USER,PW)
or die('Could not connect to mysql server.' );

mysql_select_db(DB, $connect)
or die('Could not select database.');

$id = $_POST['delete_id'];

$id = mysql_escape_string($id); 



$sqlDLT = "delete from new_art_request where id='{$id}'";

$sqlINFO = "SELECT `new_art_concept_num` FROM `new_art_request` WHERE id='{$id}'";

$deleted_row =  mysql_query($sqlINFO);
if (!$deleted_row) {
    die('Could not query:' . mysql_error());
}






//$row['new_art_concept_num']

@mysql_query($sqlDLT);
    
    
    
    
    $output = "Record deleted: ";
    $output .= mysql_result($deleted_row, 0);
    echo $output
    //echo $output
    

    
    
    

?>