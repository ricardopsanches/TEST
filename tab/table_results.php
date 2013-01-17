<?php
define(HOST, "localhost");
define(USER, "root");
define(PW, "");
define(DB, "artrqst");

$connect = mysql_connect(HOST,USER,PW)
or die('Could not connect to mysql server.' );

mysql_select_db(DB, $connect)
or die('Could not select database.');

$term = strip_tags(substr($_POST['search_term'],0, 100));

$term = mysql_escape_string($term); 

$sql = "select id,new_art_concept_num,due_date from new_art_request where new_art_concept_num like '%$term%' order by new_art_concept_num asc";

$result = mysql_query($sql);

$string = '';



if (mysql_num_rows($result) > 0){
	while($row = mysql_fetch_object($result)){
	
//    $string .= "<b>".$row->color_name."</b> - ";
//    $string .= $row->hex_code."</a>";
//    $string .= "<br/>\n";
// 
  
          echo "
       			<style type='text/css'> #sqlRow-".$row->id." { background-color: white; color: black; } </style>
       			
        	<table border=0 cellspacing=1 cellpading=0>
        	
        		<tr id=sqlRow-".$row->id." onmouseover=msOver(".$row->id.") onmouseout=msOut(".$row->id.")>
        		
        			<td width=108px onclick=rowClick(".$row->id.")>".$row->new_art_concept_num."</td>
        			
        			<td  width=120px onclick=rowClick(".$row->id.")>".$row->due_date."</td>
        			
        			
        			<td><font color=red><a href= id='dltRow-".$row->id."' onclick=rowDLT(".$row->id.") onmouseover=rowDLTOVR(".$row->id.")>X</a></font></td>
        			
        		</tr>  		
        		";
  
  
  
  }
  

}else{
  $string = "No matches!";
} 

echo $string;
?>