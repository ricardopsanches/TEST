//GETS SPAN OBJECTS & FORMATS POST SUBMISSION
function update_job(sentID) { //RESPONDS TO FORM SUBMISSION
	
	//SETS SCRIBBLE NOTES VARIABLE
	var noteImageData = $("#paintCanvas").wPaint("image");
	//alert(noteImageData);
	
	        if ($('#emailCHK').is(":checked")) {
				var eml = $('input[name=email_field]').val();
				if (eml == "") {
					alert ("Enter a username to the 'assign to' field, or un-check the email option.");
					return
				};	
			};
	
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
			alert ("Please complete the 'Concept Number' field.");
			return
		};
		
		//////
		var cname = $('input[name=cName]').val();
		//if (cname == "") {
		//	alert ("Missing Concept Name!");
		//	return
		//};

	//////////
		var asgnFROM = $('input[name=subBY]').val();
		if (asgnFROM == "") {
			alert ("Please complete the 'Submitted By' field.");
			return
		};
		
		//////
		var asgnTO = $('input[name=email_field]').val();
		//if (asgnTO == "") {
		//	alert ("Missing Assign To!");
		//	return
		//};		
		
		//////
		var rtrnTO = $('input[name=return_to]').val();
		//if (rtrnTO == "") {
		//	alert ("Missing Return To!");
		//	return
		//};
		
		//////
		var notes1 = $('#notesField1').val();
		//if (rtrnTO == "") {
		//	alert ("Missing Assign To!");
		//	return
		//};		
		
		//////
		var notes2 = $('#notesField2').val();
		//if (rtrnTO == "") {
		//	alert ("Missing Assign To!");
		//	return
		//};	
		
				
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
		var BGimage = $('#dropbox').css('background-image').replace(/^url|[\(\)]/g, '');	
			if (BGimage != "") {
			//var BGimage = crntImage;
					BGimageF = BGimage.split('TEST/'); //USE NAME OF PARENT FOLDER HERE!
					BGimage = BGimageF[1];
			}
			else
		
			{
				//alert ("Missing Image!");
				//return;
			};
		
		
		
		
		//alert("12");
		
		
		
		
		
		
		
		/////
		var cpyNum = $('input[name=hCopies]').val();
		if (cpyNum == "") {
			alert ("Invalid Quantity of Hard Copies!");
			return
		};
		
		/////
		//if (allVals == "") {
		//	alert ("No Approval Indicated!");
		//	return
		//};
		
		/////
		//if (allVals2 == "") {
		//	alert ("No Request Type Indicated!");
		//	return
		//};
		
		//alert("3");
		
			$.ajax({
    type: "POST",
    url: "updateForm.php",
    data: {'id':sentID, 'PGTradio':page_type, 'apprvby':allVals, 'rqstneed':allVals2,'bgimage':BGimage, 'new_art_concept_num':cnum, 'copynum':cpyNum, 'art_name':cname, 'due_date':dDate, 
    'submitted_by':asgnFROM, 'assign_to':asgnTO,
    'return_to':rtrnTO, 'notes_1':notes1, 'notes_2':notes2, 'scrib':noteImageData,
    'style_number0':$strUser[0], 'style_colors0':$toArray[0], 
    'style_number1':$strUser[1], 'style_colors1':$toArray[1], 
    'style_number2':$strUser[2], 'style_colors2':$toArray[2], 
    'style_number3':$strUser[3], 'style_colors3':$toArray[3], 
    'style_number4':$strUser[4], 'style_colors4':$toArray[4], },
    cache: false,
    success: function()
        {
        	if ($('#emailCHK').is(":checked")) {
        		//var cnum = ;
        		//var cnam = $('input[name=cNam]').val();
			 	//var $emailConfirm = 
			 	submitEmail(sentID,$('input[name=cNum]').val(),$('input[name=cName]').val(),$('input[name=subBY]').val(),$( "#datepicker").datepicker().val());
			 	$('#emailCHK').prop('checked', false);
			}
            alert("Job Information Updated");
        }
    });
    
			
			
};