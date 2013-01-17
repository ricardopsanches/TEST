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


	<form id="searchform" class="search-goog" action="" style="margin-top:10px">
		<input class="search-input" type="text" value="Concept Search..." id="search_term" autocomplete="off"/>
		<input class="search-reset" type="reset" value="" id="search_clear" />
	</form>
	<!--
    <form id="searchform" method="post"> 
		<div> 
        	<label for="search_term">Concept Number:</label> <br> 
        	<input type="text" name="search_term" id="search_term" /> 
			<input type="submit" value="search" id="search_button" /> 
		</div> 
    </form> --!>
   		<div id="search_results" margin-top="15px" style="overflow-y:scroll; max-height:248px; max-width:244px; width:100%"></div> 
</body>
</html>








<!-- ///////////////////////////////////////////////////////////////////// --!>
<script type='text/javascript'> 
$(document).ready(function(){ 

		$('#searchform').searchBox({
			activeClass: 'active-goog',
			inFocusClass: 'infocus-goog',
			disabledButtonClass: 'disabled-goog'
		});


$("#search_results").slideUp(); 
    
$("#search_button").click(function(e){ 
        e.preventDefault(); 
        ajax_search(); 
}); 

$("#search_clear").click(function(e){ 
        e.preventDefault(); 
        $("#search_term").attr('value', '');
        $("#search_results").html('');
        ajax_search(); 
});

$('#search_term').bind('keypress', function (e){
        if(e.keyCode == 13){
            return false;
        }
        return true;
});

$("#search_term").keyup(function(e){ 
        $("#search_results").html('');
        e.preventDefault(); 
        ajax_search(); 
    }); 

}); 




///
function ajax_search(){ 
  $("#search_results").show(); 
  var search_val=$("#search_term").val(); 
  
  if (search_val != "") {
  	$.post("tab/table_results.php", {search_term : search_val}, function(data){
  	
  	if (data.length>0){ 
    	$("#search_results").html(data); 
  	} 
  		
  
  	}); 
 }; 
  
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



</script>