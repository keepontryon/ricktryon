//'use strict';
$ = jQuery;

function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
jQuery(window).ready(function($){
    /*Ajax Contact Form*/
        jQuery("body").on("submit","form.contactForm",function(e){			
			
			$('.error').removeClass('error');
			
			var name = $(this).find("#name");
            var email = $(this).find("#email");
			var website = $(this).find("#website");
            var message = $(this).find("#comment");           
			
			var return_state = true;
            var form = $(this);
			

            if(name.val() == ""){
                name.addClass("error");
                return_state = false;
            }
            if(email.val() == "" || !validateEmail(email.val())){
                email.addClass("error");
                return_state = false;
            }
			if(website.val() == ""){
                website.addClass("error");
                return_state = false;
            }
            if(message.val() == ""){
                message.addClass("error");
                return_state = false;
            }
		    if(ajaxDisabled==="1"){
			
                if(return_state){
                         var data = {
                             sth_name : name.val(),
                             sth_email : email.val(),
							 sth_website : website.val(),
                             sth_message : message.val()
                        }
						
	                    jQuery.post(document.URL,data,function(data){
							  form.fadeOut("normal",function(){									
	                            $('.sth_message').html(data);
	                            $(".sth_message").fadeIn("normal");
	                        });
							
	                    }).error(function(){
								alert('errorr');								
						});
                }
			
         		return false;
        	};
          
    /*Ajax Contact Form*/
	});

	
	$('.responsive-nav a').on('click', function(e){
		e.preventDefault();
		$('ul.menu').slideToggle();
	});

	adjustPageSize();
	
});

jQuery(window).load(function($){
	jQuery('.loading-container').fadeOut(function(){
		jQuery('.loading-container').css('z-index', 0);
	});
});

function adjustPageSize(){
	if($('footer').length != 0){
		if($('.main_container').hasClass('no-scroll')){
			var footer = $('footer').height();
			$('.main_container').css('height', 'calc(100% - ' + (80 + footer) +'px)');	
		}
		else{
			var footer = $('footer').height();
			$('.main_container').css('min-height', 'calc(100% - ' + (80 + footer) +'px)');	
		}
	}
}

function menuAnimation(){
	var item;
	$('.main-menu ul.menu > li').hover(
		function(){
			item = $(this);

			item.find('ul.sub-menu').addClass('animated');
			item.find('ul.sub-menu').addClass('fadeInLeftMenu');

			item.find('ul.sub-menu').first().addClass('animated');
			item.find('ul.sub-menu').first().addClass('fadeInUpMenu');
		},
		function(){
			item.find('ul.sub-menu').first().removeClass('fadeInUpMenu');
			item.find('ul.sub-menu').first().removeClass('fadeInLeftMenu');
		}
	)
}
menuAnimation();

function createCss3Animations(){
	var first = true,current = 0, itemsCount, canAnimate = true;
  	$.fn.superslides.fx = $.extend({
        css3Animations: function(orientation, complete) {
	      	var that = this,

			$children = that.$container.children(),
			itemsCount = $children.length,
			$outgoing = $children.eq(orientation.outgoing_slide),
			$target = $children.eq(orientation.upcoming_slide);
			support = { animations : Modernizr.cssanimations },
			animEndEventNames = {
				'WebkitAnimation' : 'webkitAnimationEnd',
				'OAnimation' : 'oAnimationEnd',
				'msAnimation' : 'MSAnimationEnd',
				'animation' : 'animationend'
			},
			// animation end event name
			animEndEventName = animEndEventNames[ Modernizr.prefixed( 'animation' ) ];

			$target.css({
				left: this.width
			})

			if(first){
				canAnimate = true;				
			}
			if(!first){
				if(canAnimate){
					canAnimate = false;
		            var currentItem = $($children[ current ]);
		            console.log($children[ current ]);
		            if( orientation.direction === 'next' ) {
		              	current = current < itemsCount - 1 ? current + 1 : 0;
		            }
		            else if( orientation.direction === 'prev' ) {
		              	current = current > 0 ? current - 1 : itemsCount - 1;
		            }

		            var nextItem = $($children[ current ]);

		          	var onEndAnimationCurrentItem = function() {
			            $(this).off( animEndEventName, onEndAnimationCurrentItem );
			            $(this).removeClass('current');
			            $(this).removeClass( orientation.direction === 'next' ? 'navOutNext' : 'navOutPrev' );
			            //canAnimate = true;
		          	}

		          	var onEndAnimationNextItem = function() {
			            $(this).off( animEndEventName, onEndAnimationNextItem );
			            $(this).addClass('current');
			            $(this).removeClass( orientation.direction === 'next' ? 'navInNext' : 'navInPrev' );
						$('body').trigger('custom');
						canAnimate = true;
		          	}

		          	currentItem.on( animEndEventName, onEndAnimationCurrentItem );
		          	nextItem.on( animEndEventName, onEndAnimationNextItem );

		      		currentItem.addClass( orientation.direction === 'next' ? 'navOutNext' : 'navOutPrev' );
		      		nextItem.addClass( orientation.direction === 'next' ? 'navInNext' : 'navInPrev' ); 
		      	}
	      	}

	      	first = false;

	      	complete();
        }

  	}, $.fn.superslides.fx);
}

function owlAddNavigationTriggers(instance){
	$('.next').click(function(e) {
		e.preventDefault();
	    instance.trigger('next.owl.carousel');
	});

	$('.prev').click(function(e) {
		e.preventDefault();
	    instance.trigger('prev.owl.carousel');
	});

	$(document).keyup(function(e){
		if (e.keyCode == 37){ 
			instance.trigger('prev.owl.carousel');
		}
	});

	$(document).keyup(function(e){
		if (e.keyCode == 39){ 
			instance.trigger('next.owl.carousel');
		}
	});


}

function owlAddNavigationTriggers2(instance){
	$('#next').click(function(e) {
		e.preventDefault();
	    instance.trigger('next.owl.carousel');
	});

	$('#prev').click(function(e) {
		e.preventDefault();
	    instance.trigger('prev.owl.carousel');
	});

	$(document).keyup(function(e){
		if (e.keyCode == 37){ 
			instance.trigger('prev.owl.carousel');
		}
	});

	$(document).keyup(function(e){
		if (e.keyCode == 39){ 
			instance.trigger('next.owl.carousel');
		}
	});
}

function aboutMe() {
   (function($){
   		function updateResult(current, all){
			$('.slide-controls span').remove();
		    $('<span>'+(current+1)+'/'+all+'</span>').insertAfter('.prev');
	  	}

    	var owl = $(".member-imgs");

		owl.on('initialized.owl.carousel', function(event) {
		   updateResult(event.item.index, event.item.count);
		})

		owl.owlCarousel({
		  	items:1
		});		

		owl.on('translated.owl.carousel', function(event){
			updateResult(event.item.index, event.item.count);
		})

		owlAddNavigationTriggers(owl);

    }(jQuery))
}

function aboutFull() {
	(function($){

		createCss3Animations();

		var sliderInherit;
		if($(window).width() < 768){
			sliderInherit = 'body';
		}else{
			sliderInherit = '.main_container';
		}

		$('#slides').superslides({
			animation: 'css3Animations',
			inherit_height_from: sliderInherit,
			pagination: 0,
			play:(autoplay_duration*1000)
		});

		var $slides = $('#slides');
		var hammertime = Hammer(document.getElementById("slides"),{swipe_velocity: 0.1});

	 	hammertime.on("swipeleft", function(e) {
    		$slides.data('superslides').animate('next');
  		});

  		hammertime.on("swiperight", function(e) {
    		$slides.data('superslides').animate('prev');
  		});

	  	$('.slides-container div').first().addClass('current');

	    $('#slides').on('animated.slides', function(){
	    	var current = $('#slides').superslides('current');
	    	var size = $('#slides').superslides('size');
	    	$('.slides-navigation span').html((current + 1) +'/' +size);
	    });

		var current = $('#slides').superslides('current');
		var size = $('#slides').superslides('size');
		$('.slides-navigation span').html((current + 1) +'/' + size);

		$('.full-screen').on('click', function(){
			$('#shutter-info').toggleClass('disappear');
	    	$('.about-full-slider-container').toggleClass('appear');
	    	window.resize;
		});

		function hideShowHeaderFooter(){
			$('.main-menu').slideToggle();
			$('footer').slideToggle();
			$('.main_container').toggleClass('full-height');
			$('body').css('overflow', 'hidden');
			$(window).trigger('resize');
		}

		jQuery('.full-screen').on('click', function(){
			hideShowHeaderFooter();

		});

    }(jQuery))
}

//PortfolioMasonery
function portfolioMasonery(col) {
	$( function() {			
		$('.portfolio').isotope({
			itemSelector: '.item',
			layoutMode: 'masonry',
			masonry:{
		    		columnWidth: col
		    	}			
		});
	});
		
	projectLike();
	
	//Categorisation
	$('body').on('click', '#filter li > a', function(e){			
		e.preventDefault();
		portfolio_categorisation($(this).html(),$('.portfolio'));
		$("a.loadMoreBtn").fadeOut();		
	});	
	$('body').on('click', '#popular', function(e){			
		e.preventDefault();
		portfolio_views($('.portfolio'));
		$("a.loadMoreBtn").fadeOut();
	});	
	$('body').on('click', '#latest', function(e){			
		e.preventDefault();		
		portfolio_categorisation('latest',$('.portfolio'));
		$("a.loadMoreBtn").fadeOut();
	});	

	$('.alt-filtering > a').on('click', function(e){
		e.preventDefault();
		$(this).parents('.alt-filtering').find('ul').slideToggle(400);
	});

	$('.alt-filtering ul li a').on('click', function(e){			
		e.preventDefault();
		portfolio_categorisation($(this).html(),$('.portfolio'));
		$(this).parents('.alt-filtering').find('ul').slideToggle(400);
		$("a.loadMoreBtn").fadeOut();		
	});

	loadMore($('.portfolio'));
}
//PortfolioMosaic
function portfolioMosaic() {
	$( function() {  
		$('.portfolio').isotope({
			itemSelector: '.item',
			layoutMode: 'masonry',
			masonry:{
				columnWidth: '.col-sm-3'
			}
		});
	});
		
	projectLike();
	
	//Categorisation
	$('body').on('click', '#filter li > a', function(e){			
		e.preventDefault();
		portfolio_categorisation($(this).html(),$('.portfolio'));
		$("a.loadMoreBtn").fadeOut();		
	});	
	$('body').on('click', '#popular', function(e){			
		e.preventDefault();
		portfolio_views($('.portfolio'));
		$("a.loadMoreBtn").fadeOut();
	});	
	$('body').on('click', '#latest', function(e){			
		e.preventDefault();		
		portfolio_categorisation('latest',$('.portfolio'));
		$("a.loadMoreBtn").fadeOut();
	});	

	$('.alt-filtering > a').on('click', function(e){
		e.preventDefault();
		$(this).parents('.alt-filtering').find('ul').slideToggle(400);
	});

	$('.alt-filtering ul li a').on('click', function(e){			
		e.preventDefault();
		portfolio_categorisation($(this).html(),$('.portfolio'));
		$(this).parents('.alt-filtering').find('ul').slideToggle(400);
		$("a.loadMoreBtn").fadeOut();		
	});

	loadMore($('.portfolio'));
}

//PortfolioSquare3
function portfolioSquare3(col) {
	$( function() {			
		$('#portfolio-content').isotope({
			itemSelector: '.item',
			layoutMode: 'masonry',
			masonry:{
				columnWidth: col
			}	
		});
	});	
		
	projectLike();
	
	//Categorisation
	$('body').on('click', '#filter li > a', function(e){			
		e.preventDefault();
		portfolio_categorisation($(this).html(),$('#portfolio-content'));
		$("a.loadMoreBtn").fadeOut();
	});	
	$('body').on('click', '#popular', function(e){			
		e.preventDefault();
		portfolio_views($('#portfolio-content'));
		$("a.loadMoreBtn").fadeOut();
	});	
	$('body').on('click', '#latest', function(e){			
		e.preventDefault();		
		portfolio_categorisation('latest',$('#portfolio-content'));
		$("a.loadMoreBtn").fadeOut();
	});	

	$('.alt-filtering > a').on('click', function(e){
		e.preventDefault();
		$(this).parents('.alt-filtering').find('ul').slideToggle(400);
	});

	$('.alt-filtering ul li a').on('click', function(e){			
		e.preventDefault();
		portfolio_categorisation($(this).html(),$('#portfolio-content'));
		$(this).parents('.alt-filtering').find('ul').slideToggle(400);
		$("a.loadMoreBtn").fadeOut();		
	});

	loadMore($('#portfolio-content'));
}

//PortfolioSquare4
function portfolioSquare4(col) {
	$( function() {			
		$('#portfolio-content').isotope({
			itemSelector: '.item',
			layoutMode: 'masonry',
			masonry:{
				columnWidth: col
			}
		});
	});
		
	projectLike();
	
	//Categorisation
	$('body').on('click', '#filter li > a', function(e){			
		e.preventDefault();
		portfolio_categorisation($(this).html(),$('#portfolio-content'));
		$("a.loadMoreBtn").fadeOut();
	});	
	$('body').on('click', '#popular', function(e){			
		e.preventDefault();		
		portfolio_views($('#portfolio-content'));
		$("a.loadMoreBtn").fadeOut();
	});	
	$('body').on('click', '#latest', function(e){			
		e.preventDefault();		
		portfolio_categorisation('latest',$('#portfolio-content'));
		$("a.loadMoreBtn").fadeOut();
	});	

	$('.alt-filtering > a').on('click', function(e){
		e.preventDefault();
		$(this).parents('.alt-filtering').find('ul').slideToggle(400);
	});

	$('.alt-filtering ul li a').on('click', function(e){			
		e.preventDefault();
		portfolio_categorisation($(this).html(),$('#portfolio-content'));
		$(this).parents('.alt-filtering').find('ul').slideToggle(400);
		$("a.loadMoreBtn").fadeOut();		
	});
	
	loadMore($('#portfolio-content'));
}

//Project like & Iterate to add liked items	
function projectLike(){

	//Iterate to add liked items	
	$('.like').each(function(i, obj) {			
		if(readCookie('Viewed' + $(this).attr("data-id")) === $(this).attr("data-id"))
		{ 
			$(this).addClass('portfolio-active');
			$(this).find('i').remove();
			$(this).append('<i class="fa fa-heart"></i>');
		}
	});

	//Project like
	$('body').on('click', '.like', function(e){	
		e.preventDefault();
		if($(this).hasClass('portfolio-active')){
			//$(this).removeClass('portfolio-active');
		}
		else{
			insert_like($(this).attr("data-id"));
			$(this).addClass('portfolio-active');
			$(this).find('i').remove();
			$(this).append('<i class="fa fa-heart"></i>');
		}
	});	
}

function portfolio_categorisation($category,container){
	var $container = $(container);
	var ajax_categorisation = {
		category : $category,
		sth_categorisation : true
	};
	$container.html('');
	$.post(document.URL,ajax_categorisation,function(data){
		if($(data).length>0){
			$(data).imagesLoaded( function(){					
				$container.isotope( 'insert', $(data));
				//$('.portfolio').isotope( 'reLayout');											
			});
		}
		}).error(function(){
		   console.log('error'); 
		});	
}
function portfolio_views(container){
	var $container = $(container);
	var ajax_views = {
		sth_views : true
	};
	$container.html('');
	$.post(document.URL,ajax_views,function(data){
		if($(data).length>0){
				$(data).imagesLoaded( function(){					
						$container.isotope( 'insert', $(data), function(){
							$container.isotope( 'reLayout');							
						})							
										
					});	
		}
		}).error(function(){
		   console.log('error'); 
		});	
}

//Gallery Horizontal
function gallery_horizontal(){

	var height = $(window).height() * 0.6;

	$('.gallery-horizontal').carouFredSel({
		width: '100%',
		height: height,
		align: false,
		auto: false,
		prev: '#prev',
		next: '#next',
		scroll: {
			easing: 'quadratic'

		},
		items: {
			visible: 1,
			width: 'variable',
			height: height
		},
		swipe: {
			onTouch:true
		},
		mousewheel: true
	});

	$('.gallery-horizontal').trigger('updateSizes');

	$('body').on('click', '#filter li > a', function(e){			
		e.preventDefault();
		categorisation($(this).html());	

	});

	$('.alt-filtering > a').on('click', function(e){
		e.preventDefault();
		$(this).parents('.alt-filtering').find('ul').slideToggle(400);
	});

	$('.alt-filtering ul li a').on('click', function(e){			
		e.preventDefault();
		categorisation($(this).html());	
		$(this).parents('.alt-filtering').find('ul').slideToggle(400);
	});
		
	if($(this).width() <= 768){
		$('.gallery-horizontal').trigger("configuration", {
			height: 200,
			items:{
				height: 200
			}
	    });
	    $('.gallery-horizontal').trigger('updateSizes');
	}

	$('#navi a').on('click', function(){
		$('.overlay-container').removeClass('scaleAnimation');
	});
}

//Gallery HorizontalSmall
function gallery_horizontalSmall(){
 $(function() {
    	var owl = $("#small-gallery");

    	if (owl.hasClass('home-products')){
    		owl.owlCarousel({
				stagePadding: 50,
			    items: 6,
			    loop: true,
				nav : false,
			    margin : 30,
				pagination : false,
				responsive : {
				    0 : {
				        items: 1
				    },
				    768 : {
				       items: 2
				    },
				    // breakpoint from 768 up
				    992 : {
				       items: 3
				    },
				    1200 : {
				       items: 4
				    },
				    1400 : {
				       items: 5
				    },
				    1600 : {
				       items: 6
				    }
				}
			});
    	} else {
			owl.owlCarousel({
				stagePadding: 50,
			    items: 6,
			    loop: true,
				nav : false,
			    margin : 30,
				pagination : false,
				responsive : {
				    // breakpoint from 0 up
				    0 : {
				        items: 2
				    },
				    // breakpoint from 480 up
				    480 : {
				        items: 3
				    },
				    // breakpoint from 768 up
				    768 : {
				       items: 4
				    },
				    // breakpoint from 768 up
				    992 : {
				       items: 5
				    },
				    1200 : {
				       items: 6
				    }
				}
			});
    	}

		owl.on('mousewheel', '.owl-stage', function (e) {
		    if (e.deltaY>0) {
		        owl.trigger('prev.owl');
		    } else {
		        owl.trigger('next.owl');
		    }
		    e.preventDefault();
		});

		

		owlAddNavigationTriggers2(owl);

		$('.owl-item').not('.active').find('.intro-animation').css('opacity', 1);

		$(window).on('load', function(){
			$('.active .intro-animation').each(function (index) {
			  	var item = $(this);
			  	var anim = item.data('animation');
				setTimeout(function () {
					item.addClass('animated ' + anim);
				}, index * 200);
			});
		});
	    
		$('body').on('click', '#filter li > a', function(e){			
			e.preventDefault();	
			var $category = $(this).html();
			console.log($(this));
			var ajax_categorisation = {
				category : $category,
				sth_categorisation : true
			};
			$('.owl-item').animate({"opacity": 0})
			$.post(document.URL,ajax_categorisation,function(data){
				if($(data).length>0){
					var items = $(data).filter('.item');
					var toDisplay = '';
					$.each(items, function(){
						var $this = $(this).css('opacity', 0);
						toDisplay += $this[0].outerHTML;
					});
					owl.trigger('replace.owl.carousel', toDisplay);
					owl.find('.item').each(function (index) {
					  	var item = $(this);
					  	var anim = item.data('animation');
						setTimeout(function () {
							item.addClass('animated ' + anim);
						}, index * 200);
					});
					owl.trigger('refresh.owl.carousel');
				}
			}).error(function(){
			   console.log('error'); 
			});	
		});	

		$('.alt-filtering > a').on('click', function(e){
			e.preventDefault();
			$(this).parents('.alt-filtering').find('ul').slideToggle(400);
		});

		$('.alt-filtering ul li a').on('click', function(e){			
			e.preventDefault();	
			var $category = $(this).html();
			console.log($(this));
			var ajax_categorisation = {
				category : $category,
				sth_categorisation : true
			};
			//$('#small-gallery').html('');
			$.post(document.URL,ajax_categorisation,function(data){
				if($(data).length>0){
					//$('#small-gallery').html(data);	
					console.log(data)
					owl.trigger('replace.owl.carousel', data);
					owl.trigger('refresh.owl.carousel');
				}
			}).error(function(){
			   console.log('error'); 
			});	
			$(this).parents('.alt-filtering').find('ul').slideToggle(400);
		});

		if($('.text-presentation').length == 0){
			$('.main_container').css('height', 'calc(100% - 80px)');
			$('.main_container').removeClass('scroll').addClass('no-scroll');
			$('.small-gallery-container').css('margin', '0');
		}

	});
}

//Gallery Circle
function gallery_circle(){
(function($){

			var owl = $(".circle-gallery");

			owl.owlCarousel({
				pagination : false,
				loop : true,
				center: true,
				items: 3
			});

			$('#next').click(function(e) {
				e.preventDefault();
				owl.trigger('next.owl.carousel');
			})

			$('#prev').click(function(e) {
				e.preventDefault();
				owl.trigger('prev.owl.carousel');
			})

			//fuks();
		}(jQuery))
		
	$('body').on('click', '#filter li > a', function(e){			
		e.preventDefault();
		categorisationCircle($(this).html());	
	});		
	$('.alt-filtering > a').on('click', function(e){
		e.preventDefault();
		$(this).parents('.alt-filtering').find('ul').slideToggle(400);
	});

	$('.alt-filtering ul li a').on('click', function(e){			
		e.preventDefault();
		categorisationCircle($(this).html());	
		$(this).parents('.alt-filtering').find('ul').slideToggle(400);
	});
}
//Gallery Slider
function gallery_slider(){

	createCss3Animations();

	$('#slides').superslides({
		animation: 'css3Animations',
		inherit_height_from: '.main_container',
		pagination: 0,
		play:(autoplay_duration*1000)
		
	});

	var $slides = $('#slides');
	var hammertime = Hammer(document.getElementById("slides"),{swipe_velocity: 0.1});

 	hammertime.on("swipeleft", function(e) {
		$slides.data('superslides').animate('next');
		});

		hammertime.on("swiperight", function(e) {
		$slides.data('superslides').animate('prev');
		});
	$('.slides-container div').first().addClass('current');

	$('body').on('custom', function(){
		var current = $('#slides').superslides('current');
		var size = $('#slides').superslides('size');
		$('.slides-navigation span').html((current + 1) +'/' +size);
		console.log(current);
	});

	var current = $('#slides').superslides('current');
	var size = $('#slides').superslides('size');
	$('.slides-navigation span').html((current + 1) +'/' + size);

	var itemsToAnimate = $('.current').find('.intro-animation');

	var differnce = 500;

	itemsToAnimate.each( function(k, v) {
	    var el = this;
	    var anim = $(el).data('animation');
	        setTimeout(function () {
	        $(el).addClass('animated ' + anim);
	    }, k*differnce);
	});

  	$('body').on('custom', function() {

  		setTimeout(function () {

      		$('.intro-animation').removeClass('animated');
      		$('.intro-animation').removeClass('bounce');
      		$('.intro-animation').removeClass('flash');
      		$('.intro-animation').removeClass('pulse');
      		$('.intro-animation').removeClass('rubberBand');
      		$('.intro-animation').removeClass('shake');
      		$('.intro-animation').removeClass('swing');
      		$('.intro-animation').removeClass('tada');
      		$('.intro-animation').removeClass('wobble');
      		$('.intro-animation').removeClass('bounceIn');
      		$('.intro-animation').removeClass('bounceInDown');
      		$('.intro-animation').removeClass('bounceInLeft');
      		$('.intro-animation').removeClass('bounceInRight');
      		$('.intro-animation').removeClass('bounceInUp');
      		$('.intro-animation').removeClass('fadeIn');
      		$('.intro-animation').removeClass('fadeInDown');
      		$('.intro-animation').removeClass('fadeInDownBig');
      		$('.intro-animation').removeClass('fadeInLeft');
      		$('.intro-animation').removeClass('fadeInLeftBig');
      		$('.intro-animation').removeClass('fadeInRight');
      		$('.intro-animation').removeClass('fadeInRightBig');
      		$('.intro-animation').removeClass('fadeInUp');
      		$('.intro-animation').removeClass('fadeInUpBig');
      		$('.intro-animation').removeClass('flipInX');
      		$('.intro-animation').removeClass('flipInY');
      		$('.intro-animation').removeClass('lightSpeedIn');
      		$('.intro-animation').removeClass('rotateIn');
      		$('.intro-animation').removeClass('rotateInDownLeft');
      		$('.intro-animation').removeClass('rotateInDownRight');
      		$('.intro-animation').removeClass('rotateInUpLeft');
      		$('.intro-animation').removeClass('rotateInUpRight');
      		$('.intro-animation').removeClass('slideInDown');
      		$('.intro-animation').removeClass('slideInLeft');
      		$('.intro-animation').removeClass('slideInRight');
      		$('.intro-animation').removeClass('hinge');
      		$('.intro-animation').removeClass('rollIn');

      		var itemsToAnimate = $('.current').find('.intro-animation');

			counter = 0;

			itemsToAnimate.each( function() {
			    var el = this;
			    var anim = $(el).data('animation');
			    if(counter == 0){
			    	setTimeout(function () {
				        $(el).addClass('animated ' + anim);
				    }, 1);
			    }else{
			    	setTimeout(function () {
				        $(el).addClass('animated ' + anim);
				    }, 500);
			    }
		        counter++;
			});
		}, 100);

  	});


  	var fullScreenMode = true;
		var oldSliderHeight = $('#slides').height();
  	function hideShowHeaderFooter(){
		$('.main-menu').slideToggle();
		$('footer').slideToggle();
		$('.main_container').toggleClass('full-height');
		$('body').css('overflow', 'hidden');
		$(window).trigger('resize');
	}

	jQuery('.full-screen').on('click', function(){
		hideShowHeaderFooter();

	});
}


//Gallery SliderSmall
function gallery_slidersmall(sliderAnimation){
	(function($){
    	var owl = $("#gallery-slider-small");

    	owl.on('initialized.owl.carousel', function(event) {
		   updateResult(event.item.index, event.item.count);
		});

    	var animateIn, animateOut;

		if(sliderAnimation == 'fxFade'){
			animateIn = 'fadeIn';
			animateOut = 'fadeOut';
		}else{
			animateIn = false;
			animateOut = false;
		}

		owl.owlCarousel({
		    items: 1,
		    autoHeight: true,
		    animateIn: animateIn,
		    animateOut: animateOut

		});

		function hide(){
			$('.nav1').css('display', 'none');
		}

		function display(){
			$('.nav1').css('display', 'block');
		}

		owl.on('play.owl.video', function(){
			$('.nav1').css('display', 'none');
			$('body').on('mouseenter', '#gallery-slider-small', hide);
			$('body').on('mouseleave', '#gallery-slider-small', display);
			$('.item').removeClass('intro-animation fadeIn animated');
		});

		owl.on('stop.owl.video', function(){
			$('.nav1').css('display', 'block');
			$('body').off('mouseenter', '#gallery-slider-small', hide);
			$('body').off('mouseleave', '#gallery-slider-small', display);
		});

		owlAddNavigationTriggers(owl);

		function updateResult(current, all){
			$('.slide-controls span').remove();
		    $('<span>'+(current+1)+'/'+all+'</span>').insertAfter('.prev');
	  	}

		var owlPagination = $("#slider-small-pagination");

		owlPagination.owlCarousel({
		    items:8,
		    margin:10,
		    responsive:{
		    	0:{
			    	items: 4
			    },
			    480:{
			    	items: 7
			    },
			    768:{
			    	items:8
			    }
		    }
			    
		});

		$('#slider-small-pagination .item').on('click', function(e){
			e.preventDefault();
			$('#slider-small-pagination .item div').removeClass('dark');
			$(this).find('div').addClass('dark');
			var itemIndex = $(this).find('a').data('current');
			console.log(itemIndex)
			owl.trigger('to.owl.carousel', itemIndex);
		});

		owl.on('changed.owl.carousel', function(event){
			updateResult(event.item.index, event.item.count);
		})

		owl.on('translate.owl.carousel', function(event){
			var to = event.item.index;
			console.log(to);
			owlPagination.trigger('to.owl.carousel', [to, 200, true]);
			owlPagination.find('.item div').removeClass('dark');
			var itemToOverlayed = $(owlPagination.find('.item div').get(to));
			itemToOverlayed.addClass('dark');
		})

		var makeFullScreen = function(){

			$('.gallery-pagination-container').toggleClass('container');
			$('.gallery-pagination-container').toggleClass('col-md-12');
			$('.text-presentation').toggle();
			
			$('#main-container').toggleClass('container');

			$('.gallery-pagination-container').toggleClass('dissapear');

			$('.main-menu').slideToggle();
			$('footer').slideToggle();

			$('.gallery-container').toggleClass('full-height');
			$('.main_container').toggleClass('full-height');

			$('.full-screen i').animate({opacity:0}, 100, function(){
				$('.full-screen i').animate({opacity:1})

				$('.full-screen i').toggleClass('fa-expand');

				$('.full-screen i').toggleClass('fa-compress');
			});

			owl.trigger('refresh.owl.carousel');

		}

		$('.full-screen').on('click', makeFullScreen);	
		$('img').on('dblclick', makeFullScreen);	

		$('.owl-item').not('.active').find('.intro-animation').css('opacity', 1);

		$('#gallery-slider-small .active .intro-animation').each(function (index) {
		  	var item = $(this);
		  	var anim = item.data('animation');
			setTimeout(function () {
				item.addClass('animated '+ anim);
			}, index * 200);
		});

		//$('#slider-small-pagination').not('.active').css('opacity', 1)

		$('#slider-small-pagination .active .intro-animation').each(function (index) {
		  	var item = $(this);
		  	var anim = item.data('animation');
			setTimeout(function () {
				item.addClass('animated '+ anim);
			}, index * 200);
		});

	}(jQuery))
}

//Gallery SliderSmallThumbs
function gallery_sliderThumbs(sliderAnimation){
	(function($){
		$(window).on('load resize', function(){
			var contentHeight = $(window).height() - $('.main-menu').height() - $('footer').height();
			console.log($(window).height() +" "+ $('.main-menu').height() +" "+ $('footer').height() +" "+contentHeight)
			var bigSlider = $('.gallery-container.thumbs-gallery');
			var smallSlider = $('.gallery-pagination-container.thumbs-gallery');
			var smallSliderHeight = smallSlider.outerHeight();
			bigSlider.height(contentHeight - smallSliderHeight - 60);
		});

    	var owl = $("#gallery-slider-small");

    	owl.on('initialized.owl.carousel', function(event) {
		   updateResult(event.item.index, event.item.count);
		})

		var animateIn, animateOut;

		if(sliderAnimation == 'fxFade'){
			animateIn = 'fadeIn';
			animateOut = 'fadeOut';
		}else{
			animateIn = false;
			animateOut = false;
		}

		owl.owlCarousel({
		    items: 1,
		    autoHeight: true,
		    animateIn: animateIn,
		    animateOut: animateOut,
		    lazyLoad: true
		});

		function hide(){
			$('.nav1').css('display', 'none');
		}

		function display(){
			$('.nav1').css('display', 'block');
		}

		owl.on('play.owl.video', function(){
			$('.nav1').css('display', 'none');
			$('body').on('mouseenter', '#gallery-slider-small', hide);
			$('body').on('mouseleave', '#gallery-slider-small', display);
			$('.item').removeClass('intro-animation fadeIn animated');
		});

		owl.on('stop.owl.video', function(){
			$('.nav1').css('display', 'block');
			$('body').off('mouseenter', '#gallery-slider-small', hide);
			$('body').off('mouseleave', '#gallery-slider-small', display);
		});

		owlAddNavigationTriggers(owl);

		function updateResult(current, all){
			$('.slide-controls span').remove();
		    $('<span>'+(current+1)+'/'+all+'</span>').insertAfter('.prev');
	  	}

		var owlPagination = $("#slider-small-pagination");

		owlPagination.owlCarousel({
		    items:8,
		    margin:30,
		    responsive:{
		    	0:{
			    	items: 3
			    },
			    480:{
			    	items: 4
			    },
			    768:{
			    	items: 6
			    },
			    992:{
			    	items: 8
			    }
		    }
		});

		$('#slider-small-pagination .item').on('click', function(e){
			e.preventDefault();
			$('#slider-small-pagination .item div').removeClass('dark');
			$(this).find('div').addClass('dark');
			var itemIndex = $(this).find('a').data('current');
			console.log(itemIndex)
			owl.trigger('to.owl.carousel', itemIndex);
		});

		owl.on('changed.owl.carousel', function(event){
			updateResult(event.item.index, event.item.count);
		})

		owl.on('translate.owl.carousel', function(event){
			var to = event.item.index;
			console.log(to);
			owlPagination.trigger('to.owl.carousel', [to, 200, true]);
			owlPagination.find('.item div').removeClass('dark');
			var itemToOverlayed = $(owlPagination.find('.item div').get(to));
			itemToOverlayed.addClass('dark');
		})

		var makeFullScreen = function(){

			$('.gallery-pagination-container').toggleClass('col-md-12');

			$('.gallery-pagination-container').toggleClass('dissapear');

			$('.main-menu').slideToggle();
			$('footer').slideToggle();

			$('.gallery-container').toggleClass('full-height');
			$('.main_container').toggleClass('full-height');

			$('.full-screen i').animate({opacity:0}, 100, function(){
				$('.full-screen i').animate({opacity:1})

				$('.full-screen i').toggleClass('fa-expand');

				$('.full-screen i').toggleClass('fa-compress');
			});

			owl.trigger('refresh.owl.carousel');
		}

		$('.full-screen').on('click', makeFullScreen);
		$('img').on('dblclick', makeFullScreen);

		$('.owl-item').not('.active').find('.intro-animation').css('opacity', 1);

		$('#gallery-slider-small .active .intro-animation').each(function (index) {
		  	var item = $(this);
		  	var anim = item.data('animation');
			setTimeout(function () {
				item.addClass('animated '+ anim);
			}, index * 200);
		});

		//$('#slider-small-pagination').not('.active').css('opacity', 1)

		$('#slider-small-pagination .active .intro-animation').each(function (index) {
		  	var item = $(this);
		  	var anim = item.data('animation');
			setTimeout(function () {
				item.addClass('animated '+ anim);
			}, index * 200);
		});


    }(jQuery))
}

//Gallery SliderThumbsVertical
function gallery_sliderThumbsVertical(sliderAnimation){
	$(function() {
		
		$('#gallery-thumbs-vertical').carouFredSel({
			circular: false, 
			infinite : false,
			direction: 'down',
			height: '100%',
			auto: false,
			prev: '#prev',
			next: '#next',
			align: "top",
			scroll:{
				items: 1,
				easing: 'linear'
			},
			swipe:{
				onTouch:true,
				onMouse:true
			}
		});

		function updateResult(current, all){
			$('.slide-controls span').remove();
		    $('<span>'+(current+1)+'/'+all+'</span>').insertAfter('.prev');
	  	}

		var owl = $("#gallery-slider-small");

		owl.on('initialized.owl.carousel', function(event) {
		   updateResult(event.item.index, event.item.count);
		})

		var animateIn, animateOut;

		if(sliderAnimation == 'fxFade'){
			animateIn = 'fadeIn';
			animateOut = 'fadeOut';
		}else{
			animateIn = false;
			animateOut = false;
		}

		owl.owlCarousel({
		    items: 1,
		    autoHeight: true,
		    animateIn: animateIn,
		    animateOut: animateOut

		});

		function hide(){
			$('.nav1').css('display', 'none');
		}

		function display(){
			$('.nav1').css('display', 'block');
		}

		owl.on('play.owl.video', function(){
			$('.nav1').css('display', 'none');
			$('body').on('mouseenter', '#gallery-slider-small', hide);
			$('body').on('mouseleave', '#gallery-slider-small', display);
			$('.item').removeClass('intro-animation fadeIn animated');
		});

		owl.on('stop.owl.video', function(){
			$('.nav1').css('display', 'block');
			$('body').off('mouseenter', '#gallery-slider-small', hide);
			$('body').off('mouseleave', '#gallery-slider-small', display);
		});

		$('.next').click(function(e) {
			e.preventDefault();
		    owl.trigger('next.owl.carousel');
		})

		$('.prev').click(function(e) {
			e.preventDefault();
		    owl.trigger('prev.owl.carousel');
		})

		owl.on('play.owl.video', function(){
			$('.item').removeClass('intro-animation fadeIn animated');
		});

	  	owl.on('changed.owl.carousel', function(event){
			updateResult(event.item.index, event.item.count);
		})

		$('#gallery-thumbs-vertical .item').on('click', function(e){
			e.preventDefault();
			$('#gallery-thumbs-vertical .item div').removeClass('dark5');
			$(this).find('div').addClass('dark5');
			var itemIndex = $(this).find('a').data('current');
			owl.trigger('to.owl.carousel', itemIndex);
		});

		owl.on('translate.owl.carousel', function(event){
			var to = event.item.index;
			$('#gallery-thumbs-vertical').trigger('slideTo', [to, true]);

			$('#gallery-thumbs-vertical').find('.item div').removeClass('dark5');

			$.each($('#gallery-thumbs-vertical').find('a'), function(){
				if($(this).data('current') == to){
					console.log($(this).siblings('div.overlay').addClass('dark5'));
				}
			})
		})

		var makeFullScreen = function(){

			$('.gallery-thumbs-vertical-container').toggleClass('dissapear');
			$('.main-slider.vertical-slider').toggleClass('full-width');
			
			$('.main-menu').slideToggle();
			$('footer').slideToggle();

			$('.main_container').toggleClass('full-height');

			$('.full-screen i').animate({opacity:0}, 100, function(){
				$('.full-screen i').animate({opacity:1})

				$('.full-screen i').toggleClass('fa-expand');

				$('.full-screen i').toggleClass('fa-compress');
			});

			owl.trigger('refresh.owl.carousel');
		}

		$('.full-screen').on('click', makeFullScreen);
		$('img').on('dblclick', makeFullScreen);
	});
}

//Gallery Categorisation
function categorisation($category){
	var ajax_categorisation = {
		category : $category,
		sth_categorisation : true
	};
	$('#gallery_container').html('');
	$.post(document.URL,ajax_categorisation,function(data){
		if($(data).length > 0){
			$('#gallery_container').html(data);	
		}
	}).done(function(){
		$('.gallery-horizontal').trigger('updateSizes');
	}).error(function(){
	   console.log('error'); 
	});	
}

//Gallery CategorisationHorizontalSmall
function categorisationHorizontalSmall($category){
	var ajax_categorisation = {
		category : $category,
		sth_categorisation : true
	};
	$('#small-gallery').html('');
	$.post(document.URL,ajax_categorisation,function(data){
		if($(data).length>0){
				$('#small-gallery').html(data);	
				return data;
		}
		}).error(function(){
		   console.log('error'); 
		});	
}

//Gallery
function categorisationCircle($category){	
	var owl = $("#gallery_container");
	var $category = $category;
	console.log($(this));
	var ajax_categorisation = {
		category : $category,
		sth_categorisation : true
	};
	
	$.post(document.URL,ajax_categorisation,function(data){
		if($(data).length>0){			
			//console.log(data)
			owl.trigger('replace.owl.carousel', data);
			owl.trigger('refresh.owl.carousel');
		}
		}).error(function(){
		   console.log('error'); 
		});	
}
function displayLightBox(to, images, desc, sbEffect){
	var hasContainer = true,
	isCentered = true,
	animateIn,
	animateOut,
	stonedBox = $('<div/>').addClass('stonedBox dark'),
	stonedBoxBackdrop = $('<div/>').addClass('stonedBoxBackdrop'),
	container = $('<div/>').addClass('container'),
	centerHelper = $('<div/>').addClass('center-helper-container2'),
	centerInside = $('<div/>').addClass('center-helper-inside2');

	$('body').append(stonedBox);
	$('body').addClass('fxSoftScale');
	stonedBox.append('<div class="loading-lightbox brand-color">loading...</div>');
	
	var images = images;
	var owlStonedBox = $('<div/>').addClass('owl-stoned-box');
	owlStonedBox.css('visibility', 'hidden');
	stonedBox.append(stonedBoxBackdrop);
	stonedBox.append(container);
	container.append(owlStonedBox);
	owlStonedBox.css('display', 'block');
	if(desc != undefined){
		var i=0;
		images.each(function(){
			var itemToLightBox = $(this);
			if(itemToLightBox.hasClass('video-item')){
				owlStonedBox.append(
					'<div class="item">'+
						'<div class="center-helper-container2">'+
							'<div class="center-helper-inside2" style="height: 80%;">'+
								'<div class="lightbox-content" style="height: 100%; max-height: 100%; width:100%;">'+
									'<a href="'+$( this ).data('video')+'" class="owl-video"><img class="owl-lazy" data-src="'+ $($( this )[0].outerHTML).attr('src') +'" alt=""></a>'+
									'<div class="gallery-desc">'+
										'<h6 class="text-light no-margin text-left">'+desc[i]+'</h6>'+
									'</div>'+
								'</div>'+
							'</div>'+
						'</div>'+
					'</div>'
				);
			}
			else{
				console.log($($( this )[0].outerHTML).attr('src'))
				owlStonedBox.append(
					'<div class="item">'+
						'<div class="center-helper-container2">'+
							'<div class="center-helper-inside2">'+
								'<div class="lightbox-content">'+
									// $( this )[0].outerHTML+
									'<img class="owl-lazy" data-src="'+ $($( this )[0].outerHTML).attr('src') +'" alt="">' +
									'<div class="gallery-desc">'+
										'<h6 class="text-light no-margin text-left">'+desc[i]+'</h6>'+
									'</div>'+
								'</div>'+
							'</div>'+
						'</div>'+
					'</div>'
				);	
			}
			i++;
		});
	}else{
		var i=0;
		images.each(function(){
			owlStonedBox.append(
				'<div class="item">'+
					'<div class="center-helper-container2">'+
						'<div class="center-helper-inside2">'+
							'<div class="lightbox-content">'+
								$( this )[0].outerHTML+
							'</div>'+
					'</div>'+
				'</div>'+
			'</div>'
			);
			i++;
		});
	}

	$('.item').imagesLoaded(function(){
		$('.loading-lightbox').remove();
		owlStonedBox.css('visibility', 'visible');
	});
	

	function updateResult(current, all){
		$('.slide-controls span').remove();
	    $('<span>'+(current+1)+'/'+all+'</span>').insertAfter('.prev');
  	}

	$('.owl-stoned-box').on('initialized.owl.carousel', function(event){
		stonedBox.addClass('navInNext');
		stonedBox.append('<nav class="slides-navigation nav1"><div class="slide-controls"><a href="#" class="prev"><i class="fa fa-angle-left"></i></a><span>06/12</span><a href="#" class="next"><i class="fa fa-angle-right"></i></a></div><div class="full-screen"><i class="fa fa-times"></i></div></nav>');
		updateResult(event.item.index, event.item.count);
	});

	if(sbEffect == 'fxFade'){
		animateIn = 'fadeIn';
		animateOut = 'fadeOut';
	}else{
		animateIn = false;
		animateOut = false;
	}

	// owl initialization
	$('.owl-stoned-box').owlCarousel({
		items: 1,
		lazyLoad:true,
		animateIn: animateIn,
	    animateOut: animateOut

	});

	$('.owl-stoned-box').on('play.owl.video', function(){
		$('.stonedBox').removeClass('navInNext navOutNext');
	});

	owlAddNavigationTriggers($('.owl-stoned-box'));

	$('.owl-stoned-box').on('changed.owl.carousel', function(event){
		updateResult(event.item.index, event.item.count);
	});

	$('.owl-stoned-box').trigger('to.owl.carousel', [to, 1, true]);
	console.log(to);
	

	var closeStoneBox = function(){
		var support = { animations : Modernizr.cssanimations },
			animEndEventNames = {
				'WebkitAnimation' : 'webkitAnimationEnd',
				'OAnimation' : 'oAnimationEnd',
				'msAnimation' : 'MSAnimationEnd',
				'animation' : 'animationend'
			},
			// animation end event name
			animEndEventName = animEndEventNames[ Modernizr.prefixed( 'animation' ) ];

		var onEndAnimation = function() {
            stonedBox.css('display', 'none');
            stonedBox.remove();
      	}

		stonedBox.removeClass('navInNext');
		stonedBox.addClass('navOutNext');
		stonedBox.on( animEndEventName, onEndAnimation );
  	
	}

	$(document).keyup(function(e){
		if (e.keyCode == 27) { closeStoneBox(); }
	});

	stonedBoxBackdrop.on('click', closeStoneBox);
	$('body').on('click', '.full-screen', closeStoneBox);
}

function services(){
	$('.intro-animation').each(function (index) {
	  	var item = $(this);
	  	var anim = item.data('animation');
		setTimeout(function () {
			item.addClass('animated ' + anim);
		}, 1 * 200);
	});
}

function blog1(){

	$('body').on('click', '#pagination a', function(e){
		e.preventDefault();
		var link = $(this).attr('href');	
		$('.blog_container').fadeOut(500, function(){
			$(this).load(link + ' .blog_container', function() {
				$(this).fadeIn(500);				
			});
		});
	});	

	$('body').on('click', '#filter li > a', function(e){			
			e.preventDefault();
			console.log($(this).html());
			blog_categorisation($(this).html());
		});	
	$('body').on('click', '#blog_views', function(e){			
			e.preventDefault();
			blog_views();
		});	
	$('body').on('click', '#blog_latest', function(e){			
			e.preventDefault();			
			blog_categorisation('all categories');
		});	
		
	$('.alt-filtering > a').on('click', function(e){
		e.preventDefault();
		$(this).parents('.alt-filtering').find('ul').slideToggle(400);
	});

	$('.alt-filtering ul li a').on('click', function(e){			
		e.preventDefault();
		console.log($(this).html());
		blog_categorisation($(this).html());
		$(this).parents('.alt-filtering').find('ul').slideToggle(400);
		$("a.loadMoreBtn").fadeOut();		
	});
	
	loadMoreBlog1($('.row'));	
				
}

//Blog1 Categorisation
function blog_categorisation($category){
	var ajax_categorisation = {
		category : $category,
		sth_categorisation : true
	};
	$('.blog_container').html('');
	$.post(document.URL,ajax_categorisation,function(data){
		if($(data).length>0){
				$('.blog_container').html(data);	
		}
		}).error(function(){
		   console.log('error'); 
		});	
}
//Blog1 views
function blog_views(){
	var ajax_views = {
		sth_views : true
	};
	$('.blog_container').html('');
	$.post(document.URL,ajax_views,function(data){
		if($(data).length>0){
				$('.blog_container').html(data);	
		}
		}).error(function(){
		   console.log('error'); 
		});	
}


function blog2(){
	$( function() {	 
		$('#blog2-container').isotope({
			itemSelector: '.col-md-4',
			layoutMode: 'masonry',
			masonry:{
		    		columnWidth: '.col-md-4'
		    	}
		});		
	});
		
	$('body').on('click', '#popular', function(e){	
        e.preventDefault();     
		var ajax_views = {
				sth_views : true
			};
			$('#blog2-container .col-md-4').remove();
			$.post(document.URL,ajax_views,function(data){
				if($(data).length>0){
					$(data).imagesLoaded( function(){					
						$('#blog2-container').isotope( 'insert', $(data), function(){
							$('#blog2-container').isotope( 'reLayout');							
						})							
						$("a.loadMoreBtn").fadeOut();					
					});
				}
				}).error(function(){
				   console.log('error'); 
			});	        
    });	
	//Order by date
	$('body').on('click', '#latest', function(e){	
        e.preventDefault();  
			var ajax_views = {
				sth_latest : true
			};
			$('#blog2-container .col-md-4').remove();
			$.post(document.URL,ajax_views,function(data){
				if($(data).length>0){
					$(data).imagesLoaded( function(){					
						$('#blog2-container').isotope( 'insert', $(data), function(){
							$('#blog2-container').isotope( 'reLayout');							
						})							
						$("a.loadMoreBtn").fadeOut();					
					});
				}
				}).error(function(){
				   console.log('error'); 
			});	  
    });	
	$('.alt-filtering > a').on('click', function(e){
		e.preventDefault();
		$(this).parents('.alt-filtering').find('ul').slideToggle(400);
	});

	$('.alt-filtering ul li a').on('click', function(e){			
		e.preventDefault();
		 var selector = $(this).attr('data-filter');
		$('#blog2-container').isotope({ filter: selector });
		$(this).parents('.alt-filtering').find('ul').slideToggle(400);					
	});
	loadMore($('#blog2-container'));	
	sth_isotope($('#blog2-container'));	
}

function loadMore(container){
	var container = container;
	 $(".loadMoreBtn").click(function(e){
        e.preventDefault();
		$('.button.loadMoreBtn').find('span').css('opacity', 0);
		$('.button.loadMoreBtn').find('i').css('opacity', 1);
        page++;
        var ajax_data = {
            paged : page,
            sth_page : true
        };
        $.post(document.URL,ajax_data,function(data){
            if(data){
                $(data).imagesLoaded( function(){					
					$(container).isotope( 'insert', $(data), function(){
						$(container).isotope( 'reLayout');
					})			
	                $('.button.loadMoreBtn').find('span').css('opacity', 1);
					$('.button.loadMoreBtn').find('i').css('opacity', 0);		
                });
                if(last_page == page ){
                    $("a.loadMoreBtn").fadeOut();
                }
            }
		
        }).error(function(){
                jQuery("a.loadMoreBtn").fadeOut();
        });
        
    });
}

function loadMoreBlog1(container){
	var container = container;
	 $(".loadMoreBtn").click(function(e){
        e.preventDefault();
		$('.button.loadMoreBtn').find('span').css('opacity', 0);
		$('.button.loadMoreBtn').find('i').css('opacity', 1);
        page++;
        var ajax_data = {
            paged : page,
            sth_page : true
        };
        $.post(document.URL,ajax_data,function(data){
            if(data){
                $(data).imagesLoaded( function(){					
						$(container).append(  $(data));					
                });
                if(last_page == page ){
                    $("a.loadMoreBtn").fadeOut();
                }
                
                $('.button.loadMoreBtn').find('span').css('opacity', 1);
				$('.button.loadMoreBtn').find('i').css('opacity', 0);
            }
		
        }).error(function(){
                jQuery("a.loadMoreBtn").fadeOut();
        });
        
    });
}

function sth_isotope(container){
	var $container = $(container);
	$container.isotope({layoutMode : 'masonry' });
	$('#filter li > a').click(function(){
	  var selector = $(this).attr('data-filter');
	  $container.isotope({ filter: selector });
	  return false;
	});
}

function singleProject(){
	var owl = $(".single-slider");

	
	owl.on('initialized.owl.carousel', function(event) {
	   updateResult(event.item.index, event.item.count);
	})

	owl.owlCarousel({
	    items:1,
	    autoHeight: true
	});

	owlAddNavigationTriggers(owl);

	function updateResult(current, all){
		$('.slide-controls span').remove();
	    $('<span>'+(current+1)+'/'+all+'</span>').insertAfter('.prev');
  	}

	owl.on('changed.owl.carousel', function(event){
		updateResult(event.item.index, event.item.count);
	})
	
	if(slider_type!=="slider"){
		$('.single-project-media').isotope({
			itemSelector: '.item',
			layoutMode: 'masonry'
		});
	}
	if(readCookie('Viewed' + $(this).attr("data-id")) === $(this).attr("data-id"))
	{ 
		$(this).addClass('portfolio-active');
	}
	//Project like
	$('body').on('click', '.like1', function(e){	
		e.preventDefault();
		if($(this).hasClass('portfolio-active')){
			//$(this).removeClass('portfolio-active');
		}
		else{
			insert_like($(this).attr("data-id"));
			$(this).addClass('portfolio-active');
		}
	});	
}

function pageScript(){
	console.log('te shortcodet');
	var owl = $(".slider-shortcode");
	owl.on('initialized.owl.carousel', function(event) {
	   updateResult(event.item.index, event.item.count);
	})

	owl.owlCarousel({
	    items:1
	});

	owlAddNavigationTriggers(owl);

	function updateResult(current, all){
		$('.slide-controls span').remove();
	    $('<span>'+(current+1)+'/'+all+'</span>').insertAfter('.prev');
  	}

	owl.on('changed.owl.carousel', function(event){
		updateResult(event.item.index, event.item.count);
	})
}

function centerHeightHelper(){
	var h = $(window).height()
	$('.main_container .center-helper-container').css('height', h-166);
}

function home_mix(){
	(function($){

			$('#slides').superslides({
				animation: 'fade',
				pagination:0,
				inherit_height_from: '.home-alt',
				play:(autoplay_duration*1000)
			});		

			$('#slides').on('animated.slides', function(){
				var current = $('#slides').superslides('current');
				var size = $('#slides').superslides('size');
				$('.slides-navigation span').html((current + 1) +'/' +size);
			});

			var current = $('#slides').superslides('current');
			var size = $('#slides').superslides('size');
			$('.slides-navigation span').html((current + 1) +'/' + size);

			function portfolioPick(){
				dotInterval = setInterval(function(){
					$('.ha-portfolio .images').each(function(){
						//alert('test');
						var $cur = $(this).find('.active').removeClass('active');
						var $next = $cur.next().length?$cur.next():$(this).children().eq(0);
						$next.addClass('active');
					});
				},3000);	
			}

			var owl = $('.ha-services');
			owl.owlCarousel({
				items: 1
			});

			$('.next2').click(function(e) {
				e.preventDefault();
			    owl.trigger('next.owl.carousel');
			});

			$('.prev2').click(function(e) {
				e.preventDefault();
			    owl.trigger('prev.owl.carousel');
			});

			var owl2 = $('.ha-portfolio');
			owl2.owlCarousel({
				items: 1
			});

			$('.next1').click(function(e) {
				e.preventDefault();
			    owl2.trigger('next.owl.carousel');
			});

			$('.prev1').click(function(e) {
				e.preventDefault();
			    owl2.trigger('prev.owl.carousel');
			});

			function hideShowHeaderFooter(){
				$('.main-menu').slideToggle(function(){
					$(window).trigger('resize');
				});
				$('.main_container').toggleClass('full-height');
				$('.home-alt').toggleClass('full-height');
				$('footer').slideToggle();
				$(window).trigger('resize');
			}

			jQuery('.full-screen').on('click', function(){
				hideShowHeaderFooter();

			});

		}(jQuery))
}

function singleBlog(){
	var owl = $('.blog-slider');
	
	owl.on('initialized.owl.carousel', function(event) {
	   updateResult(event.item.index, event.item.count);
	});

	owl.owlCarousel({
		items: 1,
	    autoHeight: true
	});

	owlAddNavigationTriggers(owl);


	function updateResult(current, all){
		$('.slide-controls span').remove();
	    $('<span>'+(current+1)+'/'+all+'</span>').insertAfter('.prev');
  	}

	owl.on('changed.owl.carousel', function(event){
		updateResult(event.item.index, event.item.count);
	})
}

/*
*	single product gallery
*/
(function($){
	"use strict";
	var $this = $('.single-product .product .images');
	console.log($this.find('img').length)
	if($this.find('img').length > 1){
		var thumbsCnt = $('<div></div>').addClass('thumbs-container');
		thumbsCnt.insertAfter($this);
		var imagesForThumb = $this.find('img');
		var imgSrcs = [];
		var r1 = /\d{3}/g;
		var r2 = new RegExp(r1.source + 'x' + r1.source);

		$.each(imagesForThumb, function(i){
			var thumbImgSrc = $(this).attr('src');
			var thumbSrcReplace = thumbImgSrc.replace(r2, '180x180');
			if(i == 0){
				thumbsCnt.append($('<img>').attr('src', thumbSrcReplace).addClass('active'));
			}else{
				thumbsCnt.append($('<img>').attr('src', thumbSrcReplace));
			}
		});

		$this.addClass('owl-carousel');
		thumbsCnt.addClass('owl-carousel');

		$(window).on('load', function(){
			$this.owlCarousel({
				items: 1,
				nav: true,
				autoHeight: true,
				navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>']
			});
			thumbsCnt.owlCarousel({
				items: 6,
				margin: 1,
				nav: false
			});
		});

		thumbsCnt.find('img').on('click', function(){
			var images = thumbsCnt.find('img')
			var clickedImageIndex = images.index(this);
			if(!($(this).hasClass('active'))){
				images.removeClass('active');
				$(this).addClass('active');
			}
			$this.trigger("to.owl.carousel", [clickedImageIndex, 250, true]);
		});

		$this.on('changed.owl.carousel', function(event){
			var images = thumbsCnt.find('img');
			var currentItemIndex = event.page.index;
			if(currentItemIndex >= 0 && !(thumbsCnt.find('img').eq(currentItemIndex).hasClass('active'))){
				images.removeClass('active');
				thumbsCnt.find('img').eq(currentItemIndex).addClass('active');	
			}
		});
	}

})(jQuery);

/*
*	adjust single product summary
*/
(function($){
	"use strict";
	$(window).on('load', function(){
		var images = $('.single-product .product .images');
		var thumbs = $('.single-product .product .thumbs-container');
		var summary = $('.single-product .product .summary');
		if((images.innerHeight() + thumbs.innerHeight()) > summary.innerHeight()){
			summary.css('min-height', images.innerHeight() + thumbs.innerHeight());
		}
	});

	var refreshRate = 200;
	var calculate = true;
	$(window).on('resize', function(){
		if(calculate){
			calculate = false;
			setTimeout(function(){
				var images = $('.single-product .product .images');
				var thumbs = $('.single-product .product .thumbs-container');
				var summary = $('.single-product .product .summary');
				// if((images.innerHeight() + thumbs.innerHeight()) > summary.innerHeight()){
				summary.css('min-height', images.innerHeight() + thumbs.innerHeight());
				// }
				calculate = true;
			}, refreshRate);
		}
	});
})(jQuery);