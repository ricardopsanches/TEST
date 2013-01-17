<?php

//check for post data
$getemailTO = $_POST['post_email']."@perrinwear.com";
$getemailFROM = $_POST['post_from']."@perrinwear.com";
$getid = $_POST['post_id'];
$getcnum = $_POST['post_cnum'];
$getcnam = $_POST['post_cnam'];
$getdate = $_POST['post_date'];


//formats username to email


// The message
$message = "You have received a creative art request for the concept:";
$message .= "\r\n";
$message .= $getcnum." ".$getcnam;
$message .= "\r\n";
$message .= "Due Date: ".$getdate."\r(y-m-d)";
$message .= "\r\n";
$message .= "Click the link below to open this form.";
$message .= "\r\n";
$message .= "http://192.168.3.130/TEST/index.php?formID=";
$message .= $getid;
$message .= "&edt=1";


// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70, "\r\n");

$headers .= 'From: '.$getemailFROM  . "\r\n";

// Send

mail($getemailTO, 'Creative Art Request - '.$getcnum.' '.$getcnam, $message, $headers);
    


?>