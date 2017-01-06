/** ===========================================
                File Included
============================================ */
$.getScript("js/e27animation.js");
$.getScript("js/scrolling-nav.js");

//$.getScript("js/jobs_script.js");

/** ===========================================
    Slider for Homepage *** Only apply for 3
============================================ */
	$(function(){
		//init first

		var pause = false;

		var i = 1;
		
		function fadeToDestinationSlide(			
			destinationItem,
			currentItem = {
				li : $('.home-slider-list li.active'),
				img : $('.home-slider-images img.home-slider-image-active'),
				title : $('.home-slider-title-active')
			}){
				currentItem.li.removeClass('active');
				destinationItem.li.addClass('active');

				currentItem.img.removeClass('home-slider-image-active');	
				
				//Show next image
				destinationItem.img.stop().fadeIn("fast",function(){
					
					//Hide Current image

					//Show next Title
					destinationItem.title.stop().fadeIn("fast").addClass('home-slider-title-active');	
					currentItem.title.removeClass('home-slider-title-active').hide();				
						
								
				}).addClass('home-slider-image-active');

				//Hide Title
				currentItem.title.stop().fadeOut("fast", function(){
					// currentItem.title.removeClass('home-slider-title-active').hide();				
				});

		}

		function fadeNext() {
			var currentSlide = {
				li : $('.home-slider-list li.active'),
				img : $('.home-slider-images img.home-slider-image-active'),
				title : $('.home-slider-title-active')
			}
			var nextSlide = {
				li : currentSlide.li.next(),
				img : currentSlide.img.next(),
				title : currentSlide.title.next()
			}

			var firstSlide = {
				li : $('.home-slider-list li:first-child'),
				img : $('.home-slider-images img:first-child'),
				title : $('.home-slider-title-container > div:first-child')
			}

			if( !currentSlide.li.is(':last-child') ){
				fadeToDestinationSlide( nextSlide);
			} else{
				fadeToDestinationSlide( firstSlide);			
			}
		}

		//Pause on Hover
		$('.home-slider').hover(function() {
			pause = true;
		},function() {
			pause = false;
		});

		$('.home-slider-list li').hover(
			function(){				
				var hoverIndex = $(this).index() + 1;
				var indexSlide = {
					li : $('.home-slider-list li:nth-child(' + hoverIndex + ')'),
					img : $('.home-slider-images img:nth-child(' + hoverIndex + ')'),
					title : $('.home-slider-title-container > div:nth-child(' + hoverIndex + ')')
				}
				
				if(indexSlide.li.hasClass('active') == false){
					// clearInterval(rotate);
					fadeToDestinationSlide(indexSlide);
				}
								
				
			},function(){
			})

		//Rotate
		function doRotate() {
			if(!pause) {
				fadeNext();
			}    
		}
		
		//Rotate image after 2sec
		var rotate = setInterval(doRotate, 5000);
	});




	


/** ===========================================
    Hide / show the master navigation menu
============================================ */
$(document).ready(function(){
	// console.log('Window Height is: ' + $(window).height());
	// console.log('Document Height is: ' + $(document).height());

	var previousScroll = 0;

	$(window).scroll(function(){

	var currentScroll = $(this).scrollTop();

	/*
	If the current scroll position is greater than 0 (the top) AND the current scroll position is less than the document height minus the window height (the bottom) run the navigation if/else statement.
	*/
	if (currentScroll > 0 && currentScroll < $(document).height() - $(window).height()){
		/*
		If the current scroll is greater than the previous scroll (i.e we're scrolling down the page), hide the nav.
		*/
		if (currentScroll > previousScroll){
			window.setTimeout(hideNav, 0);
			/*
			Else we are scrolling up (i.e the previous scroll is greater than the current scroll), so show the nav.
			*/
		} else {
			window.setTimeout(showNav, 0);
		}
		/* 
		Set the previous scroll value equal to the current scroll.
		*/
		previousScroll = currentScroll;
	}

	});

	function hideNav() {
		$(".secNav").removeClass("nav-visible").addClass("nav-hidden");
		$(".post-misc-mobile").removeClass("post-misc-visible").addClass("post-misc-hidden");
		
	}
	function showNav() {
		$(".secNav").removeClass("nav-hidden").addClass("nav-visible");
		$(".post-misc-mobile").removeClass("post-misc-hidden").addClass("post-misc-visible");
		
	}

	// This will prevent dropdown list's event when click

	setTimeout(function() {
		$('.navbar-mobile > .dropdown > .dropdown-menu').click(function(e){
			e.stopPropagation();
		});
		$('.navbar-click a').click(function(e){
			var ulElem = $(this).parent().find('ul');
			if (ulElem.hasClass('navbar-open')){
				ulElem.removeClass('navbar-open').addClass('navbar-close');
			}
			else{
				ulElem.removeClass('navbar-close').addClass('navbar-open');
			}
		});
	}, 2000);
	

	
});