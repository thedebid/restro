<?php

add_action( 'elementor/editor/after_enqueue_scripts', function() {
   wp_enqueue_script(
   	'better-elementor',
   	plugin_dir_url( __FILE__ ) .'/assets/js/better-elementor.js', 
   		array('jquery'),
   	'1',
   	true // in_footer
   );
} );


