<?php
    $con = mysql_connect("localhost","root","");
    if (!$con) { die('Could not connect: '); }
    mysql_select_db("artrqst", $con);

    $result = mysql_query("select * from new_art_request");   


		//BELOW SPITS SQL RESULTS and echos to the index SONN
    while($rs3 = mysql_fetch_array($result)) {
    
        //echo $rs3["new_art_concept_num"]." ".$rs3["name"]." ".$rs3["hardcopies"]." ";
        
        //echo "<a href='delete.php?id=".$rs3[id]."' data-ids='".$rs3[id]."'>Delete</a>";
        
        //echo "<br />";
        
        
        
        
        	//echo JSON to page
				//$response = $_GET["callback"] . "(" . json_encode($friends) . ")";
				//echo $response;
        
        
        
        echo "
       			<style type='text/css'> #sqlRow-".$rs3[id]." { background-color: white; color: black; } </style>
        	<table border=0 cellspacing=1 cellpading=0>
        		<tr id=sqlRow-".$rs3[id]." onmouseover=msOver(".$rs3[id].") onmouseout=msOut(".$rs3[id].")>
        			<td width=100px  onclick=rowClick(".$rs3[id].")>".$rs3["new_art_concept_num"]."</td>
        			<td>".$rs3["hardcopies"]."</td>
        			<td><font color=red><a href= id='dltRow-".$rs3[id]."' onclick=rowDLT(".$rs3[id].") onmouseover=rowDLTOVR(".$rs3[id].")>X</a></font></td>
        		</tr>  		
        		";
        		
        		
        		    	
        
    }
?>
