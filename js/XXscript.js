$(document).ready(function(){
	$('.slide-out-div').tabSlideOut({
		tabHandle: '.handle',                              //class of the element that will be your tab
        pathToTabImage: 'images/contact_tab.gif',          //path to the image for the tab (optionaly can be set using css)
        imageHeight: '122px',                               //height of tab image
        imageWidth: '40px',                               //width of tab image    
    	tabLocation: 'left',                               //side of screen where tab lives, top, right, bottom, or left
        speed: 300,                                        //speed of animation
        action: 'click',                                   //options: 'click' or 'hover', action to trigger animation
        topPos: '200px',                                   //position from the top
    	fixedPosition: false                               //options: true makes it stick(fixed position) on scroll
    });
});