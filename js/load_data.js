///
function rowClick(rowNum){
	//alert("rowClick started");
	var $imageArea = $('#dropbox').css('background-image')
	
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
     			//20 = SUBMITTED_BY
   				//21 = ASSIGN_TO
   				//22 = RELATED_ID
   				//23 = NOTES_1  				
   				//24 = NOTES_2  				
   				
    			//alert("FD10: "+Fdata[10]); 
    			//alert("FD11: "+Fdata[11]);
    			//alert("FD12: "+Fdata[12]);
    			//alert("FD13: "+Fdata[13]);
    			
    			
    			/////CHECKS IMAGE
    			if (Fdata[1] != "") {
    				$('#dropbox').css('background-image', 'url(' + Fdata[1] + ')').css('background-repeat', 'no-repeat').css('background-position', 'center top').css('background-size', 'auto 100%');
    				$dropFile = Fdata[1]
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
    			
    			
    			//20 = SUBMITTED_BY
   				//21 = ASSIGN_TO
   				//22 = RELATED_ID
   				//23 = NOTES_1  				
   				//24 = NOTES_2  
    			
     			/////CHECKS SUBMITTED_BY
    			if (Fdata[20] != "") {
    				$( "#subBY").val(Fdata[20]);
    			} else {
    				$('#subBY').val('');
    			};   			
    			
     			/////CHECKS ASSIGN_TO
    			if (Fdata[21] != "") {
    				$( "#email_field").val(Fdata[21]);
    			} else {
    				$('#email_field').val('');
    			};    			
    			
     			/////CHECKS NOTES_1
    			if (Fdata[23] != "") {
    				$( "#notesField1").val(Fdata[23]);
    			} else {
    				$('#notesField1').val('');
    			};       			
    			
     			/////CHECKS NOTES_2
    			if (Fdata[24] != "") {
    				$( "#notesField2").val(Fdata[24]);
    			} else {
    				$('#notesField2').val('');
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
    				
    				$("#styNM"+m).val('0');
    				
    				if (stN[m] != "") {

    					 $("#styNM"+m).find("option:contains("+stN[m]+")").each(function(){
    					 	if( $(this).text() == stN[m] ) {
      							$(this).attr("selected","selected");
      							styChange(m);
    						}
						 });

    				} else {
    					
					}
    				
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