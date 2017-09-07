jQuery(function ($){

    'use strict';
    /*==============================================================*/
    // Contact
    /*==============================================================*/
		
   	function clearform()
	{
		document.getElementById("lastname").value=""; //don't forget to set the textbox ID
    	document.getElementById("firstname").value=""; //don't forget to set the textbox ID
    	document.getElementById("email").value=""; //don't forget to set the textbox ID
    	document.getElementById("message").value=""; //don't forget to set the textbox ID
	}

	/*==============================================================*/
    // Search
    /*==============================================================*/

    (function () {

        $('.fa-search').on('click', function() {
            $('.search').fadeIn(500, function() {
              $(this).toggleClass('search-toggle');
            });     
        });

        $('.search-close').on('click', function() {
            $('.search').fadeOut(500, function() {
                $(this).removeClass('search-toggle');
            }); 
        });

    }());
	
	
	
	/*==============================================================*/
    // Menu add class
    /*==============================================================*/
	(function () {	
		function menuToggle(){
			var windowWidth = $(window).width();
			if(windowWidth > 767 ){
				$(window).on('scroll', function(){
					if( $(window).scrollTop()>60 ){
						$('.navbar').addClass('navbar-fixed-top');
					} else {
						$('.navbar').removeClass('navbar-fixed-top');
					};
					if( $(window)){
						$('#home-three .navbar').addClass('navbar-fixed-top');
					} 
				});
			}else{
				
				$('.navbar').addClass('navbar-fixed-top');
					
			};	
		}

		menuToggle();
	}());
	
	
	
	/*==============================================================*/
    // Fun Facts
    /*==============================================================*/
	
	(function () {

        $('#fun-facts, #achievement').bind('inview', function(event, visible, visiblePartX, visiblePartY) {
            if (visible) {
                $(this).find('.timer').each(function () {
                    var $this = $(this);
                    $({ Counter: 0 }).animate({ Counter: $this.text() }, {
                        duration: 2000,
                        easing: 'swing',
                        step: function () {
                            $this.text(Math.ceil(this.Counter));
                        }
                    });
                });
                $(this).unbind('inview');
            }
        });

    }());
	
	
	/*==============================================================*/
    // Tabs Slide
    /*==============================================================*/
	(function () {
		$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {    
			var target = $(this).attr('href');  			  
			$(target).css('top','-'+$(window).width()+'px');   
			var top = $(target).offset().top;
			$(target).css({top:top}).animate({"top":"0px"}, "-20");
		})
	}());
	
	
	/*==============================================================*/
    // Magnific Popup
    /*==============================================================*/
	
	(function () {
		$('.image-link').magnificPopup({
			gallery: {
			  enabled: true
			},		
			type: 'image' 
		});
		$('.feature-image .image-link').magnificPopup({
			gallery: {
			  enabled: false
			},		
			type: 'image' 
		});
		$('.image-popup').magnificPopup({	
			type: 'image' 
		});
		$('.video-link').magnificPopup({type:'iframe'});
	}());
	
	
	/*==============================================================*/
    // Home Text Slide
    /*==============================================================*/
	(function () {
		var win = $(window),
			foo = $('#typer');
		foo.typer(["THERE’S NO SUCH THING AS BAD WEATHER, ONLY BAD CLOTHES", "Get New Idea's - New Concept", "Build Your Dream With"]);
		foo = $('#promotion h1');
		foo.typer(["Want to Work with Us?", "Make your dreams come true"]);	
	}());
	

	
	/*==============================================================*/
    // Twenty20 Plugin
    /*==============================================================*/
	(function () {
		$(window).on('load', function() {
			$(".layer-slide").twentytwenty();
		});
	}());
	
	
	/*==============================================================*/
    // Accordion
    /*==============================================================*/
	
	(function () {
		$('.faqs .collapse').on('shown.bs.collapse', function(){
		$(this).parent().find(".fa-plus-circle").removeClass("fa-plus-circle").addClass("fa-minus-circle");
		}).on('hidden.bs.collapse', function(){
		$(this).parent().find(".fa-minus-circle").removeClass("fa-minus-circle").addClass("fa-plus-circle");
		});
		
		$('.faqs .panel-heading').on('click', function() {
			if (!$(this).hasClass('active'))
			{
			  $('.panel-heading').removeClass('active');
			  $(this).addClass('active'); 
			  setIconOpened(this);
			}
			else
			{    
			  if ($(this).find('b').hasClass('opened'))
			  {
				setIconOpened(null);
			  }
			  else
			  {
				setIconOpened(this);
			  }
			}
		});
		
	}());
});

$(document).ready(function()
	{

	var myCropper;
	var image;
	initCropper();

	function addCropper()
	{
		image = $("#image");
		//console.log(image);
		myCropper = new Cropper(image, {
		  aspectRatio: 16 / 9,
		  crop: function(e) {
		    console.log(e.detail.x);
		    console.log(e.detail.y);
		    console.log(e.detail.width);
		    console.log(e.detail.height);
		    console.log(e.detail.rotate);
		    console.log(e.detail.scaleX);
		    console.log(e.detail.scaleY);
		  }
		});
	}


	function initCropper()
	{
		$("#loadImage").change(function(){
		    readURL(this);
		});
		addCropper();

	}



	function cropImage()
	{
		myCropper.getCroppedCanvas().toBlob(function(blob)
		{
			console.log(blob);
			var formData = new FormData();
			formData.append('croppedImage', blob);
	  		$.ajax('/crop/upload.php', {
		    	method: "POST",
		    	data: formData,
		    	processData: false,
		    	contentType: false,
		    	success: function (response) 
		    	{
		      		console.log(response);
		    	},
			    error: function () {
		    	  console.log('Upload error');
		    	}
		  	});
		  	

		});
	}

	function readURL(input) 
	{

	    if (input.files && input.files[0]) 
	    {
	        var reader = new FileReader();

	        reader.onload = function (e) {
	            image.attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	        addCropper();
	    }
	}


	}
);

function prevDay(day)
{
	var url = removeParam("day", window.location.href);  

	var prev = parseInt(day);
	prev = (prev == 0)?0:prev-1;
	if (url.indexOf('?') > -1)
	{
	   url += '&day=' + prev;
	}
	else
	{
	   url += '?day=' + prev;
	}
	window.location.href = url;
}


function nextDay(day)
{
	var url = removeParam("day", window.location.href); 

	var next = parseInt(day);
	next = (next < 5)?next+1:5;
	if (url.indexOf('?') > -1)
	{
	   url += '&day=' + next;
	}
	else
	{
	   url += '?day=' + next;
	}
	window.location.href = url;	var url = window.location.href;  

}

function removeParam(key, sourceURL) {
    var rtn = sourceURL.split("?")[0],
        param,
        params_arr = [],
        queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";
    if (queryString !== "") {
        params_arr = queryString.split("&");
        for (var i = params_arr.length - 1; i >= 0; i -= 1) {
            param = params_arr[i].split("=")[0];
            if (param === key) {
                params_arr.splice(i, 1);
            }
        }
        rtn = rtn + "?" + params_arr.join("&");
    }
    return rtn;
}