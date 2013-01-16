	//PRE-CODE TO DETERMINE WHAT TEXT INPUT TO USE
	

	
function reload_colors(nmb,data) {
		
		$colorFieldID = "colors"+nmb;
		$colorFieldPRNT = "friends"+nmb;
		
				
				var someThing = $('#friends'+nmb).find('span').remove(); //
				
				
					
					//for (i=0;i<someThing.length;i++) { //REPEATS FOR NUMBER OF OBJECTS FOUND FROM THE ABOVE
						//alert (someThing[i]);
						
					//	$(someThing[i]).remove(); //SETS VARIABLE 'value' TO THE TEXT OF THE OBJECT NUMBER CORRESPONDING WITH THE REPEAT FUNCTION 
						
						
						//alert(value);
						
						//$toArray_sub.push(value); //ADDS VALUE FORMATTED FROM ABOVE TO END OF THE ARRAY
						//alert($toArray_sub)
					//}
		
		
		
		
		var dataSplit = data.split("/");
		//alert(dataSplit[0]);
		
		//$colorFieldID = alt;
		
		
		//alert($colorFieldID+$colorFieldPRNT);
		
		//$("#"+$colorFieldID).autocomplete();
		
		
			for (r=0; r<dataSplit.length; r++) {
				if (dataSplit != "") {
						//alert(dataSplit[r]);
						var ui = {"item":{"label":dataSplit[r],"value":dataSplit[r]}}
						
						//create formatted friend
						var friend = ui.item.value,
							span = $("<span>").text(friend),
							a = $("<a>").addClass("remove").attr({
								href: "javascript:",
								title: "Remove " + friend
							}).text("x").appendTo(span);
						span.insertBefore("#"+$colorFieldID); //add friend to friend div
						$("#"+$colorFieldID).val("").css("top", 2);
				}		
			};

				
				$(".remove", document.getElementById($colorFieldPRNT)).live("click", function(){ //add live handler for clicks on remove links
					$(this).parent().remove(); //remove current friend
					//correct 'to' field position
					if($("#"+$colorFieldPRNT+" span").length === 0) {
						$("#"+$colorFieldID).css("top", 0);
					}				
				});				
			};
	