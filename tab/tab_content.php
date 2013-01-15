<html>
    <head>
<!-- ///////////////////////////////////////////////////////////////////// --!>
<script type="text/javascript">
function msOver(rowNum){
	//alert("mouse in");
	$("#sqlRow-"+rowNum).css({"backgroundColor": "#DDDDDD", "color": "black"});
};

///
function msOut(rowNum){
	//alert("mouse in");
	$("#sqlRow-"+rowNum).css({"backgroundColor": "white", "color": "black"});
};

///
function rowDLTOVR(rowNum){
	//alert("mouse in");
	$("#dltRow-"+rowNum).css({"color": "green"});
};

</script>
<!-- ///////////////////////////////////////////////////////////////////// --!>

</head>
   
<body>
<h1>Concept Search</h1> 
    <form id="searchform" method="post"> 
		<div> 
        	<label for="search_term">Concept Number:</label> <br> 
        	<input type="text" name="search_term" id="search_term" /> 
			<input type="submit" value="search" id="search_button" /> 
		</div> 
    </form> 
   		<div id="search_results"></div> 
</body>
</html>

<!-- ///////////////////////////////////////////////////////////////////// --!>
<script type='text/javascript'> 
$(document).ready(function(){ 

$("#search_results").slideUp(); 
    $("#search_button").click(function(e){ 
        e.preventDefault(); 
        ajax_search(); 
    }); 
    $("#search_term").keyup(function(e){ 
        e.preventDefault(); 
        ajax_search(); 
    }); 

}); 

///
function ajax_search(){ 
  $("#search_results").show(); 
  var search_val=$("#search_term").val(); 
  $.post("tab/sec.php", {search_term : search_val}, function(data){
   if (data.length>0){ 
     $("#search_results").html(data); 
   } 
  }) 
} 

///
function ajax_dlt(){ 
  $("#search_results").show(); 
  
  var dltID=$("#search_term").val();
  
  $("#search_results").show(); 
  $.post("tab/delete.php", {delete_id : rowNum}, function(data){
   if (data.length>0){ 
     alert(data); 
   } 
  }) 
}

///
function rowDLT(rowNum){
	event.preventDefault();
	$("#sqlRow-"+rowNum).css({"backgroundColor": "black", "color": "red"});
	var r=confirm("Are you sure you want to delete this record?");
		if (r==true) {		
			$.post("tab/delete.php", {delete_id : rowNum}, function(data){
   				if (data.length>0){ 
    				 alert(data); 
    				 ajax_search(); 
  				} 
  			}) 
  		}
};

///
function rowClick(rowNum){
	//alertFunction()
	$.post("tab/getinfo.php", {row_id : rowNum}, function(data){
   		
   		if (data.length>0){ 
   			//alert(data);		
   				//bgFunction(data)
   				var Fdata = data.split("|");
   				
   				//DATA = 0-9
   				//0 = ID
   				//1 = IMAGE
   				//2 = APPROVAL
   				//3 = DUE_DATE
   				//4 = PAGE_TYPE
   				//5 = RQST_NEEDED
   				//6 = HARDCOPIES
   				//7 = RETURN_TO
   				//8 = NEW_ART_CONCEPT_NUM
   				//9 = NAME
   				//10 = STYLE_COLORS0
   				//11 = STYLE_NUMBER0
   				//12 = STYLE_COLORS1
   				//13 = STYLE_NUMBER1
   				//14 = STYLE_COLORS2
   				//15 = STYLE_NUMBER2
   				//16 = STYLE_COLORS3
   				//17 = STYLE_NUMBER3
   				//18 = STYLE_COLORS4
   				//19 = STYLE_NUMBER4
   				
   				
    			//alert("FD10: "+Fdata[10]); 
    			//alert("FD11: "+Fdata[11]);
    			//alert("FD12: "+Fdata[12]);
    			//alert("FD13: "+Fdata[13]);
    			
    			
    			/////CHECKS IMAGE
    			if (Fdata[1] != "") {
    				$('#dropbox').css('background-image', 'url(' + Fdata[1] + ')').css('background-repeat', 'no-repeat').css('background-position', 'center top').css('background-size', 'auto 100%');
    			} else {
    				$('#dropbox').css('background-image', 'none');
    			}
    			
    			/////CHECKS APPROVAL
    			if (Fdata[2] != "") {
    				$('#chk1').prop('checked', false);
    				$('#chk2').prop('checked', false);
    				$('#chk3').prop('checked', false);
    				$('#chk4').prop('checked', false);
    				var APby = Fdata[2].split("/");
    					for (i=0; i<APby.length; i++) {
    						var curAPby = APby[i];
    							if (curAPby == "bill") {
    								$('#chk1').prop('checked', true);
    							} else if (curAPby == "ed") {
    								$('#chk2').prop('checked', true);
    							} else if (curAPby == "desi") {
    								$('#chk3').prop('checked', true);
    							} else if (curAPby == "mitch") {
    								$('#chk4').prop('checked', true);
    							};
    					};
    			} else {
    				$('#chk1').prop('checked', false);
    				$('#chk2').prop('checked', false);
    				$('#chk3').prop('checked', false);
    				$('#chk4').prop('checked', false);
    			};	
    			
    			/////CHECKS DUE_DATE
    			if (Fdata[3] != "") {
    				$( "#datepicker").datepicker('setDate', Fdata[3]);
    			} else {
    				$('#datepicker').val('');
					$('#datepicker').datepicker('option', {minDate: null, maxDate: null});
    			};
    			    			
    			/////CHECKS PAGE_TYPE
    			if (Fdata[4] != "") {
    				if (Fdata[4] == "grp") {
    					$('#pgTYP').prop('checked', true);
    					$('#pgTYP2').prop('checked', false);
    				} else if (Fdata[4] == "mkp") {
    					$('#pgTYP2').prop('checked', true);
    					$('#pgTYP').prop('checked', false);
    				};
    			};
    			
    			/////CHECKS RQST_NEEDED
    			if (Fdata[5] != "") {
    				$('#rqBox1').prop('checked', false);
    				$('#rqBox2').prop('checked', false);
    				$('#rqBox3').prop('checked', false);
    				var RQty = Fdata[5].split("/");
    					for (i=0; i<RQty.length; i++) {
    						var curRQty = RQty[i];
    							if (curRQty == "fullsz") {
    								$('#rqBox1').prop('checked', true);
    								
    							} else if (curRQty == "jpeg") {
    								$('#rqBox2').prop('checked', true);
    									
    							} else if (curRQty == "pdf") {
    								$('#rqBox3').prop('checked', true);
    							};
    					};
    			} else {
    				$('#rqBox1').prop('checked', false);
    				$('#rqBox2').prop('checked', false);
    				$('#rqBox3').prop('checked', false);
    			};
    			
    			/////CHECKS HARDCOPIES
    			if (Fdata[6] != "") {
    				$( "#hCopies").val(Fdata[6]);
    			} else {
    				$('#datepicker').val('0');
    			};
    			
    			/////CHECKS RETURN_TO
    			//Fdata[7]
    			/////
    			
    			/////CHECKS NEW_ART_CONCEPT_NUM
    			if (Fdata[8] != "") {
    				$( "#cNum").val(Fdata[8]);
    			} else {
    				$('#cNum').val('');
    			};
    			
    			/////CHECKS NAME
    			if (Fdata[9] != "") {
    				$( "#cName").val(Fdata[9]);
    			} else {
    				$('#cName').val('');
    			};
    			
    			var job_id = Fdata[0];
    			
    			$( "#subButton" ).button({ label: "Update" });
    			$( "#subButton" ).attr('onclick', 'update_job('+job_id+')' );
    			
    			
    				var stN = [];
    				var stC = [];
    				
    				stN[0] = Fdata[10];
    				stC[0] = Fdata[11];
    				stN[1] = Fdata[12];
    				stC[1] = Fdata[13];
    				stN[2] = Fdata[14];
    				stC[2] = Fdata[15];
    				stN[3] = Fdata[16];
    				stC[3] = Fdata[17];
    				stN[4] = Fdata[18];
    				stC[4] = Fdata[19];
    				
    				
    				
    				
    			for (var m=0; m<5; m++) {
    				//alert (stN[m]);
    				reload_colors(m,stC[m])
    				
    			};
    			
    			//$("#subButton").hide();
    			//"#subButton".id = 'updateButton'
    			//jQuery("#subButton").attr("id", "updateButton");
    			
    			
    			
    		//ajax_search(); 
  		} else {
  			alert("No Data Returned!");
  		}
  	}) 
};

</script>