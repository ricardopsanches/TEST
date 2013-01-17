<?php

   // $stringData = $_POST['dataString']; 
   // echo $stringData;




$con = mysql_connect("localhost","root","");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

if ($_POST['rqstneed']) { $rqsts = implode('/', $_POST['rqstneed']); }
if ($_POST['apprvby']) { $apprvs = implode('/', $_POST['apprvby']); }
if ($_POST['style_colors0']) { $styCL0 = implode('/', $_POST['style_colors0']); }
if ($_POST['style_colors1']) { $styCL1 = implode('/', $_POST['style_colors1']); }
if ($_POST['style_colors2']) { $styCL2 = implode('/', $_POST['style_colors2']); }
if ($_POST['style_colors3']) { $styCL3 = implode('/', $_POST['style_colors3']); }
if ($_POST['style_colors4']) { $styCL4 = implode('/', $_POST['style_colors4']); }




mysql_select_db("artrqst", $con);


//SANITIZES POST RESULT INPUT BY USER
$artNum2 = mysql_real_escape_string($_POST['new_art_concept_num']);
$artName = mysql_real_escape_string($_POST['art_name']);
$due = mysql_real_escape_string($_POST['due_date']);
$subBY = mysql_real_escape_string($_POST['submitted_by']);

$asgnTo = mysql_real_escape_string($_POST['assign_to']);
$rtrnTo = mysql_real_escape_string($_POST['return_to']);
$note1 = mysql_real_escape_string($_POST['notes_1']);
$note2 = mysql_real_escape_string($_POST['notes_2']);


$sql="UPDATE `new_art_request` SET `image` = '$_POST[bgimage]', `approval` = '".$apprvs."', `page_type` = '$_POST[PGTradio]', `rqst_needed` = '".$rqsts."', `new_art_concept_num` = '".$artNum2."', 
`name` = '".$artName."', `hardcopies` = '$_POST[copynum]', `due_date` = '".$due."', `submitted_by` = '".$subBY."', `assign_to` = '".$asgnTo."', `return_to` = '".$rtrnTo."', `notes_1` = '".$note1."', `notes_2` = '".$note2."',
`style_number0` = '$_POST[style_number0]', `style_colors0` = '".$styCL0."',
 `style_number1` = '$_POST[style_number1]', `style_colors1` = '".$styCL1."', `style_number2` = '$_POST[style_number2]', `style_colors2` = '".$styCL2."',
  `style_number3` = '$_POST[style_number3]', `style_colors3` = '".$styCL3."', `style_number4` = '$_POST[style_number4]', `style_colors4` = '".$styCL4."' WHERE `new_art_request`.`id` =  '$_POST[id]'";

//(image, approval, page_type, rqst_needed, new_art_concept_num, name, hardcopies, due_date,

//style_number0, style_colors0,
//style_number1, style_colors1,
//style_number2, style_colors2,
//style_number3, style_colors3,
//style_number4, style_colors4)

//VALUES(
//'$_POST[bgimage]','".$apprvs."','$_POST[PGTradio]','".$rqsts."','".$artNum2."','".$artName."','$_POST[copynum]','".$due."',
//'$_POST[style_number0]','".$styCL0."',
//'$_POST[style_number1]','".$styCL1."',
//'$_POST[style_number2]','".$styCL2."',
//'$_POST[style_number3]','".$styCL3."',
//'$_POST[style_number4]','".$styCL4."'





if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }



mysql_close($con);




?>