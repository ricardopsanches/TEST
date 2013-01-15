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
						$.getJSON("autoFill.php?callback=?", req, function(data) { //pass request to server
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