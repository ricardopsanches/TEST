$(function(){
	
	var dropbox = $('#dropbox'),
		message = $('.message', dropbox);
	
	dropbox.filedrop({
		// The name of the $_FILES entry:
		paramname:'pic',
		
		maxfiles: 1,
    	maxfilesize: 2,
		url: 'post_file.php',
		
		uploadFinished:function(i,file,response){
			$.data(file).addClass('done');
			$dropFile = response
			// response is the JSON object that post_file.php returns
		},
		
    	error: function(err, file) {
			switch(err) {
				case 'BrowserNotSupported':
					showMessage('Your browser does not support HTML5 file uploads!');
					break;
				case 'TooManyFiles':
					alert('Too many files! Please select 5 at most! (configurable)');
					break;
				case 'FileTooLarge':
					alert(file.name+' is too large! Please upload files up to 2mb (configurable).');
					break;
				default:
					break;
			}
		},
		
		// Called before each upload is started
		beforeEach: function(file){
			if(!file.type.match(/^image\//)){
				alert('Only images are allowed!');
				
				// Returning false will cause the
				// file to be rejected
				return false;
			}
		},
		
		uploadStarted:function(i, file, len){
			createImage(file);
		},
		
		progressUpdated: function(i, file, progress) {
			$.data(file).find('.progress').width(progress);
		},
		
    	
    	docLeave: function() {
    	fadeAnimationOUT();
    	},
    	
    	
    	drop: function() {
    	
    	fadeAnimationOUT();
        // user drops file
   		},
   		
   		
    	docOver: function() {
	    fadeAnimationIN();
    	},
    	
    	afterAll: function() {
    	
    	//alert("fin");
    	$('#upldHolder').fadeTo("slow",0, function() {
    		$('#upldHolder').remove();
    	
    	});
    	
    	
    	//$imageUrl2 = $dropImage
    	
    	//imgFormat = "<img id=jobImage src="
    	//imgFormat .= $dropFile
    	//imgFormat .= " />"
    	
    	$('#dropbox').css('background-image', 'url(' + $dropFile + ')').css('background-repeat', 'no-repeat').css('background-position', 'center top').css('background-size', 'auto 100%');
    	
    	
    	//$('#dropbox').prepend('<img id="jobIMG" src="' + $dropFile + '" />');
    	
    	//
    	
    	
    	////CHANGE THE ABOVE FROM A DATA URL TO SOMETHING ELSE, IT WILL NOT PLAY WELL IN THE FUTURE!!!
    	
    	
    	
    	
        // runs after all files have been uploaded or otherwise dealt with
    	}
	});
	
	var template = '<div class="preview" id="upldHolder">'+
						'<span class="imageHolder">'+
							'<img />'+
							'<span class="uploaded"></span>'+
						'</span>'+
						'<div class="progressHolder">'+
							'<div class="progress"></div>'+
						'</div>'+
					'</div>'; 
	
	
	function createImage(file){

		var preview = $(template), 
			image = $('img', preview);
			
			
			
		var reader = new FileReader();
		
		image.width = 100;
		image.height = 100;
		
		reader.onload = function(e){
			
			// e.target.result holds the DataURL which
			// can be used as a source of the image:
			
			image.attr('src',e.target.result);
			imageUrl = e.target.result;
		};
		
		// Reading the file as a DataURL. When finished,
		// this will trigger the onload function above:
		reader.readAsDataURL(file);
		
		message.hide();
		preview.appendTo(dropbox);
		
		// Associating a preview container
		// with the file, using jQuery's $.data():
		
		$.data(file,preview);
		//imgURL = this.getClass().getResource(file);
		//alert(imgURL);
	}

	function showMessage(msg){
		message.html(msg);
	}
	
	function fadeAnimationIN(){
			     $('#dropbox').fadeTo("normal", .4, function() {
	    		 
	    		 $('#dropbox').stop(true,false);
	    		 }); 
	}
	function fadeAnimationOUT(){
				$('#dropbox').stop(true,false);
				$('#dropbox').fadeTo("normal", 1, function() {
	    		 
	    		 //$('#dropbox').stop(true,false);
	    		 //alert("out");
	    		 }); 
	}

});