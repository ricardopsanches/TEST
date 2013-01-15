<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>CREATIVE ART REQUEST</title>
		<link href="css/example-page.css" rel="stylesheet" type="text/css" media="all" />
		<link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui-1.8.custom.css">
		<link rel="stylesheet" type="text/css" href="css/autocomplete.css">
		<link rel="stylesheet" href="assets/css/styles.css" />
		  <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />

	
	<!-- WHEN JQUERY DOES WEIRD THINGS, MAKE SURE THE LIBRARIES ARE COMPATABLE!!!! --!>
	
	<script src="http://code.jquery.com/jquery-latest.js"></script> 
	
		
	<script type="text/javascript" src="http://code.jquery.com/ui/1.8.24/jquery-ui.min.js"></script>	
		
		<!-- attempting to add the below into the above --!>
	<script type="text/javascript" src="js/jquery-ui-AF.js"></script>	
	
	
	<script src="assets/js/jquery.filedrop.js"></script><!-- Including the HTML5 Uploader plugin -->
																	
	<script src="assets/js/script.js"></script><!-- The main script file for file dropper -->
	
    <script src="jquery.tabSlideOut.v1.3.js"></script>
    
	<script src="js/autoFillparams.js"></script>     <!-- AUTO FILL SCRIPT --!>
	
	<script>
		var $dropFile = ""
		
         $(function(){
             $('.slide-out-div').tabSlideOut({
                 tabHandle: '.handle',                              //class of the element that will be your tab
                 pathToTabImage: 'images/contact_tab.gif',          //path to the image for the tab (optionaly can be set using css)
                 imageHeight: '122px',                               //height of tab image
                 imageWidth: '40px',                               //width of tab image    
                 tabLocation: 'left',                               //side of screen where tab lives, top, right, bottom, or left
                 speed: 300,                                        //speed of animation
                 action: 'click',                                   //options: 'click' or 'hover', action to trigger animation
                 topPos: '5px',                                   //position from the top
                 fixedPosition: false                               //options: true makes it stick(fixed position) on scroll
             });
         }); 
   
   //DELETE BELOW FUNCTION IF ACTING UP 
   
   //var altFormat = $( ".selector" ).datepicker( "option", "altFormat" );
   	
		$(function(){
    		$( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });

		 });


  $(document).ready(function() {
    //$("#sButton").buttonset();
    $( "#subButton" ).button({ label: "Submit" });
    $( "#subButton" ).css({ width: "80px", height: "22px", padding:"0px"});
    
  });


	</script>

    


<?php	
	require_once('sql_params.php');//Require our config file with our DB details
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);//Connect to our database
	//Return an error if we have connection issues
	if ($mysqli->connect_error) {
		die('Connect Error (' . $mysqli->connect_errno . ') '
				. $mysqli->connect_error);
	}
	$query = $mysqli->query("SELECT * FROM `style_numbers`");	//Query the database for the results we want
	while($array[] = $query->fetch_object());	//Create an array of objects for each returned row
	array_pop($array);	//Remove the blank entry at end of array
?>
	</head>
 
<body>

    <form method="post" enctype="multipart/form-data" id="formAll">
        
<div class="field2" background-color="black" width=750px> <div id ="c_n"> CREATIVE ART REQUEST


  </div>
  
  <div id="dropbox" align="center">


  </div>
  

 <div align="right" class="field2Sub" id="c_b">
  ART APPROVED BY:   
  <input name="apprvby[]" type="checkbox" id="chk1" accesskey="B" value="bill"/>
  BILL
  <input name="apprvby[]" type="checkbox" id="chk2" accesskey="B" value="desi" />
  DESI
  <input name="apprvby[]" type="checkbox" id="chk3" accesskey="B" value="ed" />
  ED
  <input name="apprvby[]" type="checkbox" id="chk4" accesskey="B" value="mitch" />
  MITCH
  </div>
</div>
  
  
<div class="field2" style="background-color:black">
	<table width="100%" align="left">
		 <tr> 
		 	<td width="50%" class="field1">
  				CONCEPT NUMBER:<input type="text" name="cNum" id="cNum" class="text ui-widget-content ui-corner-all">
  			</td>
  			<td width="50%" class="field1">
  				CONCEPT NAME:<input type="text" name="cName" id="cName" class="text ui-widget-content ui-corner-all">
  			</td>
  		</tr>
 		 </div>
 	</table>
  
  <table width="100%" border="2" align="left" cellpadding="5" class="tblBLNK_PARENT">
    <tr>      
<!--//      ISOLATED CELL FORMATTING-->    
  <td width="50%" valign="top" bgcolor="#FFFFFF" class="tblBLNK-solo">
      <div align="left" class="field3Sub2"> <span class="field3Sub1"><strong>PAGE TYPE:<br />
        </strong> </span>
        
        <input type="radio" name="PGTradio" id="pgTYP" value="grp" checked/>
        <label for="pgTYP">GRAPHIC</label>
        
        <input type="radio" name="PGTradio" id="pgTYP2" value="mkp"/>
        <label for="pgTYP2">MOCK-UP</label>
        
        <div class="hr"><hr align="center" width="99%" size="2" noshade="noshade" color="#000000"></div>
        <div id="d_f">
        <span class="field3Sub1"></span> <strong> NEEDED FOR REQUEST:<br>
        <input name="rqstneed[]" type="checkbox" id="rqBox1" value="fullsz">
        <label for="rqstNeed" class="field3Sub2">FULL SIZE COPY</label>
        <input name="rqstneed[]" type="checkbox" id="rqBox2" value="jpeg">
        <label for="rqstNeed" class="field3Sub2">JPEG</label>
        <input name="rqstneed[]" type="checkbox" id="rqBox3" value="pdf">
        <label for="rqstNeed" class="field3Sub2">PDF</label>
        </div>
          </strong></div>
    </td>
      
      
      <td width="50%" align="left" valign="top" bgcolor="#000000" class="tblBLNK">    
	<select name="styNM0" id="styNM0" onChange=styChange("0")>
	<?php foreach($array as $option) : ?>
		<option value="<?php echo $option->garment_name; ?>"><?php echo $option->garment_number; ?></option>
	<?php endforeach; ?>
	</select>   
	  
       <span class="color_input2" id="drpVal0">Select a garment style.</span>
       	<br />
      <span class="field3Sub1"><strong>GARMENT COLORS:</strong></span>
      <div id="friends0" class="tblBLNK">
        <input id="colors0" type="text" onFocus=selectedEF("colors0","friends0") onInput=autoFill()>
      </div>
      </td>
    </tr>


    <tr> 
        <td width="50%" align="left" valign="top" bgcolor="#FFFFFF" class="tblBLNK">
        
	<select name="styNM1" id="styNM1" onChange=styChange("1")>
	<?php foreach($array as $option) : ?>
		<option value="<?php echo $option->garment_name; ?>"><?php echo $option->garment_number; ?></option>
	<?php endforeach; ?>
	</select> 
          <span class="color_input2" id="drpVal1">Select a garment style.</span>
          <br />
          <span class="field3Sub1"><strong>GARMENT COLORS:</strong></span><br>
          <div id="friends1" class="tblBLNK">
            <input id="colors1" type="text" onFocus=selectedEF("colors1","friends1") onInput=autoFill()>
          </div>
		  </td>
          
          
      <td width="50%" class="tblBLNK">   
	<select name="styNM2" id="styNM2" onChange=styChange("2")>
	<?php foreach($array as $option) : ?>
		<option value="<?php echo $option->garment_name; ?>"><?php echo $option->garment_number; ?></option>
	<?php endforeach; ?>
	</select>      
        <span class="color_input2" id="drpVal2">Select a garment style.</span>
          <br />
        </span><span class="field3Sub1"><strong>GARMENT COLORS:</strong></span><br>
          <div id="friends2" class="tblBLNK">
			<input id="colors2" type="text" onFocus=selectedEF("colors2","friends2") onInput=autoFill()>
          </div>
	  </td>
    </tr>
	
	
    <tr>
      <td width="50%" class="tblBLNK">
      
	<select name="styNM3" id="styNM3" onChange=styChange("3")>
	<?php foreach($array as $option) : ?>
		<option value="<?php echo $option->garment_name; ?>"><?php echo $option->garment_number; ?></option>
	<?php endforeach; ?>
	</select>  	
        <span class="color_input2" id="drpVal3">Select a garment style.</span>
          <br />
        </span><span class="field3Sub1"><strong>GARMENT COLORS:</strong></span><br>
             <div id="friends3" class="tblBLNK">
				<input id="colors3" type="text" onFocus=selectedEF("colors3","friends3") onInput=autoFill()>
			</div>
	  </td>
	
	  
      <td width="50%" class="tblBLNK">   
	<select name="styNM4" id="styNM4" onChange=styChange("4")>
	<?php foreach($array as $option) : ?>
		<option value="<?php echo $option->garment_name; ?>"><?php echo $option->garment_number; ?></option>
	<?php endforeach; ?>
	</select>  
	      <span class="color_input2" id="drpVal4">Select a garment style.</span>
          <br />
        </span><span class="field3Sub1"><strong>GARMENT COLORS:</strong></span><br>
                <div id="friends4" class="tblBLNK">
            <input id="colors4" type="text" onFocus=selectedEF("colors4","friends4") onInput=autoFill()>
          </div>
		  </td>
    </tr>
	
	
    <tr>
      <td height="20" id="subButton3" valign="baseline" class="tblBLNK-solo"><span class="field3Sub1">NUMBER OF HARD COPIES: </span><input type="number" name="hCopies" id="hCopies" min="0" max="11" value="0"></td>
      
      <td height="20" valign="baseline" class="tblBLNK-solo" ><span class="field3Sub1">RETURN TO: </span><input type="text" size="29" class="text ui-widget-content ui-corner-all" /></td>
    </tr>
    
    <tr>
      <td height="20" id="subButton3" valign="baseline" class="tblBLNK-solo"><span class="field3Sub1">DUE DATE: </span><input type="text" id="datepicker" size="12" class="text ui-widget-content ui-corner-all" /></td>
      
      <td height="20" valign="baseline" class="tblBLNK-solo" >
      <span class="field3Sub1">ASSIGN TO: </span><input type="text" size="30" name="email_field" class="text ui-widget-content ui-corner-all" />
      	<input name="emailCHK" type="checkbox" id="emailCHK" value="y">Notify
      
  		</td>
    </tr>
    
  </table>

  	<table width="100%">

  			
  		<tr> 
		 	<td width="50%" align="left" class="field1">
				  	<div id="email_button"><input type="button" id="email_button" name="email_button" label="email">
				  	</div>
				  	<input type="button" id="clear_button" name="clear_button">
  			</td>
  			<td width="50%" align="right">
  				<div id="sButton"><input type="button" id="subButton"></div>
  			</td>
  		</tr>	
  			
 	</table>




    <input type="hidden" name="inclColors0[]" id="inclColors0" value="" >
    <input type="hidden" name="inclColors1[]" id="inclColors1" value="" >
    <input type="hidden" name="inclColors2[]" id="inclColors2" value="" >
    <input type="hidden" name="inclColors3[]" id="inclColors3" value="" >
    <input type="hidden" name="inclColors4[]" id="inclColors4" value="" >
	

  
<br>
 	
</div>
	
</form>

<!-- SLIDER TAB FORMATTING --!>
<div class="slide-out-div">
	<div id="sldTab">
	</div>
	<a class="handle" href="">Content</a>
<p>&nbsp;</p>
<p>&nbsp;</p>



</div>

<div id='message'></div>
	</body>
</html>


<?php 
//print_r($_POST); 
	//Free result set and close connection 
	$query->close();
	$mysqli->close();
?>

    
<script type="text/javascript">

var $strUser = new Array(0,0,0,0,0);
//var $toArray = new Array();







         
            $('.handle').click(function() {
					$("#sldTab").load("tab/tab_content.php");
             });  

//$(document).ready(function rldFNC() { // this runs as soon as the page is ready (DOM is loaded)
//  $("#sldTab") // selecting "div" (you can also select the element by its id or class like in css )
//   .load("tab/tab_content.html") // load in the file specified
//  });
  
  
//ADDS A BLANK/DEFAULT VALUE TO THE BEGINNING OF EACH SELECTION BOX (APPEND ADDS TO THE END)
$('#styNM0').prepend('<option value="0" selected="selected">STYLE #</option>');
$('#styNM1').prepend('<option value="0" selected="selected">STYLE #</option>');
$('#styNM2').prepend('<option value="0" selected="selected">STYLE #</option>');
$('#styNM3').prepend('<option value="0" selected="selected">STYLE #</option>');
$('#styNM4').prepend('<option value="0" selected="selected">STYLE #</option>');



//FUNCTION FOR CHANGING STYLE NUMBER TITLE BASED ON SELECTION CHANGE		
function styChange(number){
  		var item = $("#styNM"+number).val();
  		if (item == 0) {
   			$("#drpVal"+number).text("Select a garment style.");	
  		} else {

  			$("#drpVal"+number).text(item);
  		};
  		
var e = document.getElementById("styNM"+number);

$strUser[number] = e.options[e.selectedIndex].text;

	for (var b=0; b<5; b++) {
	
		if ($strUser[b] == "STYLE #") {
		
			$strUser[b] = "0";
			
		}
	}
};
	
	
	
		//FADE ON MOUSE OVER JQUERY SCRIPT	  
		$("#dropbox").hover(function() {
			$("#dropbox").fadeTo("slow", .9);
		  },
		  function(){
			$("#dropbox").fadeTo("slow", 1); 
		  });
		
		
		
$("#email_button").click(function() {	
		var eml = $('input[name=email_field]').val();
		//alert(eml);
		if (eml == "") {
			alert ("Missing Email!");
			return
		};	
	$.post("sub_email.php", {post_email : eml}, function(data){
     	alert("Mail Sent"); 
  	})
});
		
		
$("#clear_button").click(function() {	
	location.reload();
});		
		
		
		
		
		
		
		//GETS SPAN OBJECTS & FORMATS POST SUBMISSION
		$("#subButton").click(function() { //RESPONDS TO FORM SUBMISSION
			var $toArray = []; //MAKE NEW ARRAY VARIABLE 'toArray'
			
			
			for (var b=0; b<5; b++) {
				var $toArray_sub = [];
				var someThing = "";				
				var someThing = $('#friends'+b).find('span') //SETS VARIABLE 'someThing' TO THE DIV ELEMENT 'friends0' AND FINDS EVER SPAN-OBJECT WITHIN 
					
					for (i=0;i<someThing.length;i++) { //REPEATS FOR NUMBER OF OBJECTS FOUND FROM THE ABOVE
						
						var value = $(someThing[i]).text(); //SETS VARIABLE 'value' TO THE TEXT OF THE OBJECT NUMBER CORRESPONDING WITH THE REPEAT FUNCTION 
						//alert(value);
						value = value.slice(0, -1); //CUTS ONE LETTER OFF THE END (FORMATTING HACK)
						
						$toArray_sub.push(value); //ADDS VALUE FORMATTED FROM ABOVE TO END OF THE ARRAY
						//alert($toArray_sub)
					}
			
			$toArray[b] = $toArray_sub
			
			//alert($toArray[b]);		
			
			document.getElementById('inclColors'+b).value =  $toArray; //PUSHES 'toArray' JOINED BY ',' TO MAKE A STRING, TO THE HIDDEN FIELD 'inclColors0'
				///////document.getElementById('colors0').disabled = "disabled"; //REMOVES THE BLANK TEXT FIELD USED FOR AUTO FILLS FROM POST DATA SUBMISSION
				
				if(document.getElementById('styNM'+b).value == "0") {
					//alert("blank");
					//document.getElementById('styNM'+b).disabled = "disabled";
				}			
				//
				if(document.getElementById('inclColors'+b).value == "") {
					//alert("blank");
					//document.getElementById('inclColors'+b).disabled = "disabled";
				}				
			}
			///////////////////
			
			
			
			
			
			//var $PDGTradio = document.formAll[PGTradio];
			
		//alert ( PDGTradio );
		
		var page_type = $('input[name=PGTradio]:checked').val();
		//var approved_by = $('input[name=apprvby[]]:checked').val();
		
		
		var allVals = [];
         $('#c_b :checked').each(function() {
           allVals.push($(this).val());
         });
         
         //////
         var allVals2 = [];
         $('#d_f :checked').each(function() {
           allVals2.push($(this).val());
         });
         
        ///// 
		//var styCard0 = [];
        // $('#d_f :checked').each(function() {
        //   allVals2.push($(this).val());
        // });
		
		//////
		var cnum = $('input[name=cNum]').val();
		if (cnum == "") {
			alert ("Missing Concept Number!");
			return
		};
		
		//////
		var cname = $('input[name=cName]').val();
		if (cname == "") {
			alert ("Missing Concept Name!");
			return
		};
		
		//////
		//var stylnum0 = $('input[name=styNM0]').text();
		//if (stylnum0 == "STYLE #") {
		//	stylnum0 = ""
		//};
		//alert (stylnum0 );
		
		
		//////
		//var dDate = $('input[name=datepicker]').text();
		//$('#datepicker').text = dDate;
		var dDate = $( "#datepicker").datepicker({ dateFormat: 'yy-mm-dd' }).val();
		//$(dDate).datepicker({ dateFormat: "yy-mm-dd" });
		
		
		//if (cname == "") {
			//alert (dDate);
		//	return
		//};
		
		/////		
		if ($dropFile != "") {
			var BGimage = $dropFile;	
		}
		else
		{
			alert ("Missing Image!");
			return;
		};
		
		/////
		var cpyNum = $('input[name=hCopies]').val();
		if (cpyNum == "") {
			alert ("Invalid Quantity of Hard Copies!");
			return
		};
		
		/////
		if (allVals == "") {
			alert ("No Approval Indicated!");
			return
		};
		
		/////
		if (allVals2 == "") {
			alert ("No Request Type Indicated!");
			return
		};
		
	alert($strUser[2] + " " + $toArray[2])
		
			$.ajax({
    type: "POST",
    url: "submitForm.php",
    data: {'PGTradio':page_type, 'apprvby':allVals, 'rqstneed':allVals2,'bgimage':BGimage, 'new_art_concept_num':cnum, 'copynum':cpyNum, 'art_name':cname, 'due_date':dDate, 
    'style_number0':$strUser[0], 'style_colors0':$toArray[0], 
    'style_number1':$strUser[1], 'style_colors1':$toArray[1], 
    'style_number2':$strUser[2], 'style_colors2':$toArray[2], 
    'style_number3':$strUser[3], 'style_colors3':$toArray[3], 
    'style_number4':$strUser[4], 'style_colors4':$toArray[4], },
    cache: false,
    success: function()
        {
            alert("Order Submitted");
        }
    });
    
			
			
		});





function alertFunction() {
	alert("blank");
	};
	
function bgFunction(data) {
	alert(data);
	};	


</script>
