<head>

		<link rel="stylesheet" href="assets/css/styles.css" />
        
        
        <style type="text/css">

        </style>

<script type="text/javascript">
      //  var $colorFieldID = "colors0"
	//	var $colorFieldPRNT = "friends0"
</script>
        
	</head>
    
    
    
    
<body>

    <form action="index.php" method="post" enctype="multipart/form-data" id="formAll">
    
    
<div class="field2" background-color="black" width=750px>  CREATIVE ART REQUEST
  
  <div id="dropbox"></div>

  </div>
  
  
<div class="field2" style="background-color:black">

</div>
	



        
	</body>
</html>


        
<script src="http://code.jquery.com/jquery-latest.js"></script>


<!-- DELETE BELOW FOR AUTOCORRECT FIX -->

<!-- <script src="http://code.jquery.com/jquery-1.6.3.min.js"></script> --!>
		
<!-- DELETE ABOVE FOR AUTOCORRECT FIX -->	
		
		<!-- Including the HTML5 Uploader plugin -->
<script src="assets/js/jquery.filedrop.js"></script>
		
		<!-- The main script file -->
<script src="assets/js/script.js"></script>





    
<script type="text/javascript">
		

		//GETS SPAN OBJECTS & FORMATS POST SUBMISSION
		$("#formAll").submit(function() { //RESPONDS TO FORM SUBMISSION
			for (var b=0; b<5; b++) {
				var $toArray = []; //MAKE NEW ARRAY VARIABLE 'toArray'
				var someThing = $('#friends'+b).find('span') //SETS VARIABLE 'someThing' TO THE DIV ELEMENT 'friends0' AND FINDS EVER SPAN-OBJECT WITHIN 
					for (i=0;i<someThing.length;i++) { //REPEATS FOR NUMBER OF OBJECTS FOUND FROM THE ABOVE
						var value = $(someThing[i]).text(); //SETS VARIABLE 'value' TO THE TEXT OF THE OBJECT NUMBER CORRESPONDING WITH THE REPEAT FUNCTION 
						value = value.slice(0, -1); //CUTS ONE LETTER OFF THE END (FORMATTING HACK)
						$toArray.push(value); //ADDS VALUE FORMATTED FROM ABOVE TO END OF THE ARRAY
					}
				document.getElementById('inclColors'+b).value =  $toArray; //PUSHES 'toArray' JOINED BY ',' TO MAKE A STRING, TO THE HIDDEN FIELD 'inclColors0'
				///////document.getElementById('colors0').disabled = "disabled"; //REMOVES THE BLANK TEXT FIELD USED FOR AUTO FILLS FROM POST DATA SUBMISSION
				
				//
			
				if(document.getElementById('styNM'+b).value == "0") {
					//alert("blank");
					document.getElementById('styNM'+b).disabled = "disabled";
				}
				
				//
				if(document.getElementById('inclColors'+b).value == "") {
					//alert("blank");
					document.getElementById('inclColors'+b).disabled = "disabled";
				}				
			}
			

		});
		
		
		
		
		
		
		//////////////////










/////////





		
		<!--AUTO FILL CODE START-->
		
	//PRE-CODE TO DETERMINE WHAT TEXT INPUT TO USE
	function selectedEF(alt,blt) {
		$colorFieldID = alt;
		$colorFieldPRNT = blt;
		//alert($colorFieldID+$colorFieldPRNT);
		$("#"+$colorFieldID).autocomplete();
		};
		
	//AUTO FILL CODE
	function autoFill() {	
			$(function(){
				//alert("working0")
				//var selectedElement = options[selectedIndex].id
				//alert(selectedElement)
				
				$("#"+$colorFieldID).autocomplete({ //attach autocomplete listener
				
					//EACH INLINE COMMAND SEEMS TO BE PART OF ".autocomplete" AND DEFINED BY JQUERY
					source: function(req, add){ //define callback to format results
						//alert("working1")
						$.getJSON("friends.php?callback=?", req, function(data) { //pass request to server
							var suggestions = []; //create array for response objects
							//process response
							$.each(data, function(i, val){								
								suggestions.push(val.color_name);
							});
						add(suggestions); //pass array to callback
						});
					},
					
					//
					select: function(e, ui) { //define select handler
						//create formatted friend
						var friend = ui.item.value,
							span = $("<span>").text(friend),
							a = $("<a>").addClass("remove").attr({
								href: "javascript:",
								title: "Remove " + friend
							}).text("x").appendTo(span);
						span.insertBefore("#"+$colorFieldID); //add friend to friend div
					},
					
					//
					change: function() { //define select handler
						$("#"+$colorFieldID).val("").css("top", 2); //clears input field of prior text and corrects position
					}
					
				});
				//				
				
				$("#"+$colorFieldPRNT).click(function(){ //add click handler to friends0 div
					$("#"+$colorFieldID).focus(); //focus 'to' field
				});
				//
				
				$(".remove", document.getElementById($colorFieldPRNT)).live("click", function(){ //add live handler for clicks on remove links
					$(this).parent().remove(); //remove current friend
					//correct 'to' field position
					if($("#"+$colorFieldPRNT+" span").length === 0) {
						$("#"+$colorFieldID).css("top", 0);
					}				
				});				
			});
	};		
</script>
