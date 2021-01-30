( function( $ ) {
	
	/**
 	 * @param $scope The Widget wrapper element as a jQuery element
	 * @param $ The jQuery alias
	 */ 
	var WidgetHelloWorldHandler = function( $scope, $ ) {
		console.log( $scope );
	};
	
	// Make sure you run this code under Elementor.
	$( window ).on( 'elementor/frontend/init', function() {
		elementorFrontend.hooks.addAction( 'frontend/element_ready/hello-world.default', WidgetHelloWorldHandler );
	} );

    /* ===============================  Before & After  =============================== */
   
    	$(window).on("load", function(){ 
    		$(".twentytwenty-container").twentytwenty(); 
    	});

    /* ===============================  Relted items  =============================== */ 

    var active = false;

    $('.better-list-sider .bea-related-dropdown').on('click', function () {
        active = !active;

        $('.better-list-sider').toggleClass("active");
    });

    /* ===============================  Var Background image  =============================== */

    var pageSection = $(".bg-img, section");
    pageSection.each(function (indx) {

        if ($(this).attr("data-background")) {
            $(this).css("background-image", "url(" + $(this).data("background") + ")");
        }
    });

    /* ===============================  Var Slider 1  =============================== */

    function betterSlider1($scope, $) {

	    const slider = document.getElementById("js-cta-slider");
	    const sliderNext = document.getElementById("js-cta-slider-next");
	    const sliderPrevious = document.getElementById("js-cta-slider-previous");
	    const interleaveOffset = 0.75;

	    const swiper = new Swiper(slider, {
	    loop: true,
	    direction: "vertical",
	    speed: 800,
	    grabCursor: true,
	    watchSlidesProgress: true,
	    autoplay: {
	    delay: 2500,
	    disableOnInteraction: false
	    },
	    pagination: {
	        el: '.slid-half .swiper-pagination',
	        type: 'fraction',
	    },
	    navigation: {
	    nextEl: sliderNext,
	    prevEl: sliderPrevious
	    },
	    on: {
	    progress: function() {
	        let swiper = this;

	        for (let i = 0; i < swiper.slides.length; i++) {
	        let slideProgress = swiper.slides[i].progress;
	        let innerOffset = swiper.height * interleaveOffset;
	        let innerTranslate = slideProgress * innerOffset;

	        TweenMax.set(swiper.slides[i].querySelector(".slide-inner"), {
	            y: innerTranslate,
	        });
	        }
	    },
	    touchStart: function() {
	        let swiper = this;
	        for (let i = 0; i < swiper.slides.length; i++) {
	        swiper.slides[i].style.transition = "";
	        }
	    },
	    setTransition: function(speed) {
	        let swiper = this;
	        for (let i = 0; i < swiper.slides.length; i++) {
	        swiper.slides[i].style.transition = speed + "ms";
	        swiper.slides[i].querySelector(".slide-inner").style.transition =
	            speed + "ms";
	        }
	    }
	    }
	    });

    }

    jQuery(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/better-slider.default', betterSlider1);
    });
    
} )( jQuery ); 
