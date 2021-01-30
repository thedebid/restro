<?php
// single portfolio script
function dsc_single_portfolio_script() {
	global $post;
	if ( is_singular( 'portfolio' ) ) {
		wp_enqueue_script('jquery-isotope',CANTEEN_URL .'widgets/js/isotope.pkgd.js', array('jquery'), null, true  );
		wp_enqueue_script('jquery-slick' ,CANTEEN_URL . 'widgets/js/slick.min.js' , array('jquery'), null, true );
		wp_enqueue_script('slick-slider-animation' ,CANTEEN_URL . 'widgets/js/slick-animation.js' , array('jquery'), null, true );
        wp_enqueue_script('imgbg-script',CANTEEN_URL . 'widgets/js/imgbg.js' , array('jquery'), null, true );
		wp_enqueue_script('single-portfolio',CANTEEN_URL . 'widgets/js/single-portfolio.js' , array('jquery'), null, true );
		wp_enqueue_script('slider-script',CANTEEN_URL . 'widgets/js/slider.js' , array('jquery'), null, true );
		if (get_post_meta($post->ID, 'port_format', true) == 'port_two' && get_post_meta($post->ID, 'top_type', true) == 'top_content_slider' ){
			wp_enqueue_script('sliderbg-script',CANTEEN_URL . 'widgets/js/sliderbg.js' , array('jquery'), null, true );
		}
		if (get_post_meta($post->ID, 'port_format', true) == 'port_two' && get_post_meta($post->ID, 'top_type', true) == 'top_content_youtube' ){
			wp_enqueue_script( 'canteen_ytPlayer', CANTEEN_URL . 'widgets/js/jquery.mb.YTPlayer.js' ,array(),'', 'in_footer');
			wp_enqueue_script( 'canteen_homeyt', CANTEEN_URL . 'widgets/js/homeyt.js' ,array(),'', 'in_footer');
		}
		if (get_post_meta($post->ID, 'port_format', true) == 'port_two' && get_post_meta($post->ID, 'top_type', true) == 'top_content_video' ){
			wp_enqueue_script('jquery-videojs',CANTEEN_URL . 'widgets/js/video.js' , array('jquery'), null, true );
			wp_enqueue_script('jquery-big-video',CANTEEN_URL . 'widgets/js/bigvideo.js' , array('jquery'), null, true );
			wp_enqueue_script('canteen-single-portfolio-video',CANTEEN_URL . 'widgets/js/singleport-video.js' , array('jquery'), null, true );
		}
		
    }

}

add_action( 'wp_enqueue_scripts', 'dsc_single_portfolio_script',100 );



