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

$sql = "select id,image,new_art_concept_num,name from new_art_request where new_art_concept_num like '%$term%' order by new_art_concept_num asc";

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
       			
        	<table width=229px border=0 cellspacing=1 cellpading=0 style='table-layout:fixed;'>
        	
        		<tr id=sqlRow-".$row->id." onmouseover=msOver(".$row->id.",'".$row->image."') onmouseout=msOut(".$row->id.",'".$row->image."') style='height:1em;'>
        		
        			<td style='width: 90px; overflow:hidden; white-space:nowrap; cursor:pointer;' onclick=rowClick(".$row->id.")>".$row->new_art_concept_num."</td>
        			
        			<td style='width: auto; overflow:hidden; white-space:nowrap; cursor:pointer;' onclick=rowClick(".$row->id.")>".$row->name."</td>
        			
        			</tr>  		
        		";
        			//<td width=9px><font color=red><a href= id='dltRow-".$row->id."' onclick=rowDLT(".$row->id.") onmouseover=rowDLTOVR(".$row->id.")>X</a></font></td>
        			
        		
  
  
  
  }
  

}else{
  $string = "No matches!";
} 

echo $string;
?>