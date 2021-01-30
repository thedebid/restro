<?php 
//preloader custom setting
function canteen_preloader_set() {
	if  ( class_exists('ReduxFrameworkPlugin')){
		$color =  canteen_option( 'canteen_loader_color' );
		$loader_bg = "
		.load-circle{border-top-color: $color;}
		";   
		if ( class_exists('ReduxFrameworkPlugin') && canteen_option( 'canteen_loader_color' )) {           
			wp_add_inline_style( 'canteen-style', $loader_bg );
		}
	}
} 

function canteen_preloader() {
	if  ( class_exists('ReduxFrameworkPlugin')){
		$preload = canteen_option( 'canteen_preloader_set' );
		if ( class_exists('ReduxFrameworkPlugin') ) : if ($preload == 'show_home') :
			wp_enqueue_script( 'preloader', get_template_directory_uri() . '/js/loader.js',array(),'', 'in_footer');
		endif ;  endif;
		
		if ( class_exists('ReduxFrameworkPlugin') ) : if ($preload == 'show_all') :
			wp_enqueue_script( 'preloader', get_template_directory_uri() . '/js/loader.js',array(),'', 'in_footer');
		endif ;  endif;
	}
}    