(function($) {
    "use strict";
	
	$.fn.changeElementType = function(newType) {
        var attrs = {};
        if (!(this[0] && this[0].attributes))
            return;

        $.each(this[0].attributes, function(idx, attr) {
            attrs[attr.nodeName] = attr.nodeValue;
        });
        this.replaceWith(function() {
            return $("<" + newType + "/>", attrs).append($(this).contents());
        });
    }
    // Make sure you run this code under Elementor..
    $("#elementor-preview-iframe").on("load", function() {

		
		
		elementorFrontend.hooks.addAction('frontend/element_ready/better-mason-gallery.default', function($scope) {
			 $scope.find('.mason-gallery').imagesLoaded(function() { 
			 	$scope.find('.mason-gallery').isotope();
			 });
		});
		elementorFrontend.hooks.addAction('frontend/element_ready/better-post-four.default', function($scope) {
					
			$scope.find('.post-blog-slider').each(function() {
				$(this).slick({
					autoplay: true,
					dots: false,
					nextArrow: '<i class="fa fa-arrow-right"></i>',
					prevArrow: '<i class="fa fa-arrow-left"></i>',
					speed: 800,
					fade: true,
					pauseOnHover: false,
					pauseOnFocus: false
				});
			});
			
			//replace the data-background into background image
			$scope.find(".blog-img-bg").each(function() {
				var imG = $(this).data('background');
				$(this).css('background-image', "url('" + imG + "') "
		
				);
			});	
		});
		
        //for testimonial slider 
        elementorFrontend.hooks.addAction('frontend/element_ready/better-testimonial.default', function($scope) {
            $scope.find('.testi-slider').each(function() {
                $(this).slick({
                    autoplay: true,
                    dots: false,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    arrows: false,
                    autoplaySpeed: 3000,
                    speed:1500,
                    fade: false,
                    pauseOnHover: false,
                    pauseOnFocus: false,
                    responsive: [{
                            breakpoint: 1199,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 1,
                                infinite: true,
                                dots: false
                            }
                        },
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1,
                                infinite: true,
                                dots: false
                            }
                        },
                        {
                            breakpoint: 767,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        },
                    ]
                });
            });

        });
        //for img-box slider
        elementorFrontend.hooks.addAction('frontend/element_ready/better-image-box-slider.default', function($scope) {
            $scope.find('.img-box-slider').each(function() {
                $(this).slick({
                    autoplay: true,
                    dots: true,
                    slidesToShow: 3,
                    nextArrow: '<i class="fa fa-angle-right"></i>',
                    prevArrow: '<i class="fa fa-angle-left"></i>',
                    slidesToScroll: 1,
                    arrows: true,
                    autoplaySpeed: 2000,
                    speed:1000,
                    fade: false,
                    pauseOnHover: false,
                    pauseOnFocus: false,
                });
            });

        });
        //for img-box slider
        elementorFrontend.hooks.addAction('frontend/element_ready/better-work-process.default', function($scope) {
            $scope.find('.work-process').each(function() {
                $(this).slick({
                    autoplay: true,
                    dots: true,
                    slidesToShow: 3,
                    nextArrow: '<i class="fa fa-angle-right"></i>',
                    prevArrow: '<i class="fa fa-angle-left"></i>',
                    slidesToScroll: 1,
                    arrows: true,
                    autoplaySpeed: 2000,
                    speed:1000,
                    fade: false,
                    pauseOnHover: false,
                    pauseOnFocus: false,
                });
            });

        });
		
		//for post slider
        elementorFrontend.hooks.addAction('frontend/element_ready/better-post-slider.default', function($scope) {
            //slider client slider
			$scope.find('.post-slider').each(function() {
				var $slide = $scope.find('.post-slider').data('slide');
				var $tabs = $scope.find('.post-slider').data('slide-tablet');
				var $mobile = $scope.find('.post-slider').data('slide-mobile');
				$(this).slick({
					slidesToShow: $slide,
					slidesToScroll: 1,
					nextArrow: '<i class="fa fa-arrow-right"></i>',
                    prevArrow: '<i class="fa fa-arrow-left"></i>',
					autoplay: true,
					responsive: [{
							breakpoint: 1024,
							settings: {
								slidesToShow: $tabs,
								slidesToScroll: 1,
							}
						},
						{
							breakpoint: 480,
							settings: {
								slidesToShow: $mobile,
								slidesToScroll: 1,
							}
						}
					]
				});
			});

        });

        //for menu
        elementorFrontend.hooks.addAction('frontend/element_ready/better-menu.default', function($scope) {

            //remove empty href
			$scope.find(".fat-list a[href='#']").remove();
			$scope.find('.fat-list').changeElementType('ul');
			$scope.find( ".fat-list a" ).wrap( "<li></li>" );
            $scope.find(".fat-list .sub-menu").remove();
            //remove empty ul on mobile menu
            $scope.find('.fat-list ul').not(':has(li)').remove();

            $scope.find('.box-mobile').each(function() {
                $(this).find('.hamburger').on('click', function() {
                    $scope.find('.fat-nav').fadeToggle();
                    $scope.find('.fat-nav').toggleClass('active');
                    $(this).toggleClass('active');
                });
            })
            $scope.find('.menu-box ul').superfish({
                delay: 400, //delay on mouseout
                animation: {
                    opacity: 'show',
                    height: 'show'
                }, // fade-in and slide-down animation
                animationOut: {
                    opacity: 'hide',
                    height: 'hide'
                },
                speed: 200, //  animation speed
                speedOut: 200,
                autoArrows: false // disable generation of arrow mark-up
            })

        });

        //for slider in elementor editor
        elementorFrontend.hooks.addAction('frontend/element_ready/dsc-slider.default', function($scope) {


            $scope.find('.home-slider').each(function() {
                $(this).slick({
                    autoplay: true,
                    dots: false,
                    autoplay: true,
                    nextArrow: '<i class="fa fa-angle-right"></i>',
                    prevArrow: '<i class="fa fa-angle-left"></i>',
                    speed: 800,
                    fade: true,
                    pauseOnHover: false,
                    pauseOnFocus: false
                });
            });



            //slider animation
            $scope.find('.ani-slider').each(function() {
                $(this).on('init', function(e, slick) {
                    var $firstAnimatingElements = $(this).find('div.slide').find('[data-animation]');
                    doAnimations($firstAnimatingElements);
                });

                $(this).on('beforeChange', function(e, slick, currentSlide, nextSlide) {
                    var $animatingElements = $(this).find('div.slide[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
                    doAnimations($animatingElements);
                });

            });

            function doAnimations(elements) {
                var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
                elements.each(function() {
                    var $this = $(this);
                    var $animationDelay = $this.data('delay');
                    var $animationDuration = $this.data('duration');
                    var $animationType = 'p-tick ' + $this.data('animation');
                    $this.css({
                        'animation-delay': $animationDelay,
                        '-webkit-animation-delay': $animationDelay,
                        '-webkit-animation-duration': $animationDuration,
                        'animation-duration': $animationDuration,
                    });
                    $this.addClass($animationType).one(animationEndEvents, function() {
                        $this.removeClass($animationType);
                    });
                });
            }
        });
		
		//for portfolio info in elementor editor
        elementorFrontend.hooks.addAction('frontend/element_ready/better-portfolio-info.default', function($scope) {


            $scope.find('.home-slider').each(function() {
                $(this).slick({
                    autoplay: true,
                    dots: false,
                    autoplay: true,
                    nextArrow: '<i class="fa fa-arrow-right"></i>',
                    prevArrow: '<i class="fa fa-arrow-left"></i>',
                    speed: 800,
                    fade: true,
                    pauseOnHover: false,
                    pauseOnFocus: false
                });
            });



            //slider animation
            $scope.find('.ani-slider').each(function() {
                $(this).on('init', function(e, slick) {
                    var $firstAnimatingElements = $(this).find('div.slide').find('[data-animation]');
                    doAnimations($firstAnimatingElements);
                });

                $(this).on('beforeChange', function(e, slick, currentSlide, nextSlide) {
                    var $animatingElements = $(this).find('div.slide[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
                    doAnimations($animatingElements);
                });

            });

            function doAnimations(elements) {
                var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
                elements.each(function() {
                    var $this = $(this);
                    var $animationDelay = $this.data('delay');
                    var $animationDuration = $this.data('duration');
                    var $animationType = 'p-tick ' + $this.data('animation');
                    $this.css({
                        'animation-delay': $animationDelay,
                        '-webkit-animation-delay': $animationDelay,
                        '-webkit-animation-duration': $animationDuration,
                        'animation-duration': $animationDuration,
                    });
                    $this.addClass($animationType).one(animationEndEvents, function() {
                        $this.removeClass($animationType);
                    });
                });
            }
        });

        //for portfolio isotope
        elementorFrontend.hooks.addAction('frontend/element_ready/better-portfolio.default', function($scope) {

            //isotope setting(portfolio)
            $scope.find('.portfolio-body').isotope();

            // filter items when filter link is clicked
            $scope.find('.port-filter a').each(function() {
                $(this).on('click', function() {
                    $scope.find('.port-filter a').removeClass("active");
                    $(this).addClass("active");

                    var selector = $(this).attr('data-filter');
                    $scope.find('.portfolio-body').isotope({
                        itemSelector: '.port-item',
                        filter: selector
                    });


                    return false;
                });
            });

        });
		
		//for portfolio masonry isotope
        elementorFrontend.hooks.addAction('frontend/element_ready/better-portfolio-masonry.default', function($scope) {

            //isotope setting(portfolio)
            $scope.find('.portfolio-body').imagesLoaded( function() {$scope.find('.portfolio-body').isotope()});;

            // filter items when filter link is clicked
            $scope.find('.port-filter a').each(function() {
                $(this).on('click', function() {
                    $scope.find('.port-filter a').removeClass("active");
                    $(this).addClass("active");

                    var selector = $(this).attr('data-filter');
                    $scope.find('.portfolio-body').isotope({
                        itemSelector: '.port-item',
                        filter: selector
                    });


                    return false;
                });
            });

        });
		elementorFrontend.hooks.addAction('frontend/element_ready/better-sidebar.default', function($scope) {
			$scope.find(".dsc_widget_flickr")
			.each(function() {
				$(this).append ('<p class="alert alert-info">The Flickr Photos will appear on actual page</p>');
			});
		});

        elementorFrontend.hooks.addAction('frontend/element_ready/global', function($scope) {
			
			$scope.find("div[class*='elementor-widget-wp-'] h5").each(function() {
				$(this).addClass("elementor-heading-title");
			});
			
			// Video responsive
			$scope.find(".video,.audio").each(function() {
				$(this).fitVids();
			});
			
			$scope.find('.blog-body').imagesLoaded(function() { 
			 	$scope.find('.blog-body').isotope();
			 });

			
		});
		
		elementorFrontend.hooks.addAction('frontend/element_ready/better-texticon-hover.default', function($scope) {
			$scope.find('.box-padding').each(function() {
				$(this).closest('.elementor-column-wrap').addClass('hovering');
			});
		});
		
		elementorFrontend.hooks.addAction('frontend/element_ready/better-team-hover.default', function($scope) {
			$scope.find('.box-padding').each(function() {
				$(this).closest('.elementor-column-wrap').addClass('hovering');
			});
		});

    });

})(jQuery);