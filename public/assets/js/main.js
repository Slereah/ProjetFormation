jQuery(function ($){

    'use strict';

	/*==============================================================*/
    // Home
    /*==============================================================*/
   
    /*console.log(date);
    var dateArray = date.split("-");
    console.log(dateArray);
    var dateArray = [2]+"-"+[1]+"-"+[0];
    console.log(dateArray);*/
    /*$(function homeButton () {
    	$date = $("#dateTitle").attr("$date");
    	$now =
    	if ($date = ) {
    		$('#nextButton').show();
    	} else {
			$("#dateTitle").css({
				"margin-right": "20px"
			});
    	}

	home Button();
    });*/

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

$(function()
	{
		if($(".carousel").length)
		{		
			$(".carousel").carousel("pause");
		}
	});

function update(day, city, country, unit, source)
{
	if(source == "upButton")
	{
		city = $("input#city").val();
		country = $("select#country").val();
	}
	data = { day : day, city : city, country : country, unit : unit };
	$.ajax('update-weather', {
			type: 'POST',
			data: data,
			success:function(response)
			{
				console.log(response);
				if($("#locationError"))
					{
						$("#locationError").remove();
					}
				if(!response.errors.weather)
				{
					updateDisplay(response);
				}
				else
				{
					$("#locationDiv").prepend("<p id='locationError'>Couldn't find location</p>");
				}
				
				
			},
			error:function(response)
			{
				if($("#locationError"))
					{
						$("#locationError").remove();
					}
				$("#locationDiv").prepend("<p id='locationError'>Connection error</p>");
				
			}
		});
	return false;
}

function updateDisplay(data)
{
	$("#dateTitle").text("Le " + data.date);
	$("#weatherTitle").text("Prévisions météo pour " + data.city);
	$("#tmpMin").text("Température Minimale : " + data.weather.minTemp + " " + data.unit);
	$("#tmpMax").text("Température Maximale : " + data.weather.maxTemp + " " + data.unit);
	$("#weatherIcon").html(data.weather.icon);
	$("#datePicker h1").html("Le " + data.date);
	var day = parseInt(data.day);
	$("#prevButton").attr("onclick", "update(" + ((day == 0)?0:day-1).toString() + ", '" + data.city + "', '" + data.country + "', '" + data.unit + "', 'prevButton')");
	$("#nextButton").attr("onclick", "update(" + ((day < 6)?day+1:6).toString() + ", '" + data.city + "', '" + data.country + "', '" + data.unit + "', 'nextButton')");
	$("#mon-carrousel1 div").empty();
	$("#mon-carrousel2 div").empty();
	$("#mon-carrousel3 div").empty();

	var div =  $("<div></div>");
	div.addClass("carousel-caption");
	var h3 = $("<h3></h3>");
	h3.text("Haut");
	div.append(h3);
	if(data.upperClothes && data.upperClothes.length == 0)
	{
		data.upperClothes = [{picture : "/ProjetFormation/Public/assets/img/shirt.png"}];
	}
	if(data.lowerClothes && data.lowerClothes.length == 0)
	{
		data.lowerClothes = [{picture : "/ProjetFormation/Public/assets/img/jeans.png"}];
	}
	if(data.chaussures && data.chaussures.length == 0)
	{
		data.chaussures = [{picture : "/ProjetFormation/Public/assets/img/shoes.jpg"}];
	}
	for (var i = 0; i < data.upperClothes.length; i++) 
	{
		$("#mon-carrousel1>div").append(createCarouselElement(i, data.upperClothes[i]));
		$("#mon-carrousel1>div").append(div);
	}

	for (var i = 0; i < data.lowerClothes.length; i++) 
	{
		$("#mon-carrousel2>div").append(createCarouselElement(i, data.lowerClothes[i]));
		$("#mon-carrousel2>div").append(div);
	}

	for (var i = 0; i < data.chaussures.length; i++) 
	{
		$("#mon-carrousel3>div").append(createCarouselElement(i, data.chaussures[i]));
		$("#mon-carrousel3>div").append(div);
	}



}

function createCarouselElement(key, clothes)
{
	var div = $("<div></div>");
	div.addClass("item");
	if(key == 0)
	{
		div.addClass("active");
	}

	var img = $("<img></img>");
	img.addClass("img-responsive");
	img.addClass("imgClothes");
	img.attr("src", clothes.picture);
	div.append(img);
	return div;
}

