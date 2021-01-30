<?php 

//function custom header by global settings
function canteen_custom_header_global () {

	global $post ;  
	global $canteen_theme_settings;  
	$header_id =  canteen_option( 'canteen_header_set_list' );  

	$canteen_header = new WP_Query(array(
		'posts_per_page' => -1,
		'post_type' =>  'header',
		'p' => $header_id, 
	)); 
	
	if ($canteen_header->have_posts()) : 
		while  ($canteen_header->have_posts()) : $canteen_header->the_post();$header_id; ?>
			<nav class="canteen-custom-header clearfix <?php echo esc_attr ( get_post_meta($post->ID, 'head_position', true))?> ">
				<?php the_content(); ?>
			</nav>
	
		<?php endwhile; 
	endif; 
	wp_reset_postdata();
}

//function custom header by page settings
function canteen_custom_header_page () {
	global $post ;
	$header_id =  get_post_meta( $post->ID, 'canteen_header_list', true ); 
	$canteen_header = new WP_Query( array(
		'posts_per_page' => 1,
		'post_type' =>  'header',
		'p' => $header_id,
	) ); 
	
	if ($canteen_header->have_posts()) : 
		while  ($canteen_header->have_posts()) : $canteen_header->the_post();?>
			<nav class="canteen-custom-header clearfix <?php echo esc_attr ( get_post_meta($post->ID, 'head_position', true))?>">
				<?php the_content(); ?>
			</nav>
		<?php endwhile; 
	endif; 
	wp_reset_postdata();
}

//function for output custom header
function canteen_header_start () {
	if ( is_singular()) { //if single page/post
		global $post;
		global $canteen_theme_settings; 
		if (get_post_meta($post->ID, 'canteen_header_format', true) =='custom_header' && get_post_meta($post->ID, 'canteen_header_list', true)) {
			//if page setting choose header custom
			do_action('canteen-header-page','canteen_custom_header_page') ;  
		} 
			 
		//if page setting choose header global
		else if (get_post_meta($post->ID, 'canteen_header_format', true) =='global'){ 
			//if custom header & list are selected in theme options
			if (canteen_option( 'canteen_header_set' ) =='custom' && canteen_option( 'canteen_header_set_list' ) !='' ) {
				do_action('canteen-header-global','canteen_custom_header_global') ; 
			} else {
				get_template_part( 'inc/menu','normal');
			} 
		}
			 
	//if page setting choose no header 
	else if (get_post_meta($post->ID, 'canteen_header_format', true) =='no_header'){
		//display nothing       
	}
			 
	//if page setting choose header standard
	else { ?>
		<?php get_template_part( 'inc/menu');
	}
			
	} else { //if not single page/post

		//if custom header & list are selected in theme options
		if (canteen_option( 'canteen_header_set' ) =='custom' && canteen_option( 'canteen_header_set_list' ) !='' ) {
			do_action('canteen-header-global','canteen_custom_header_global') ;  

		} else { 
			//if not use normal menu
			get_template_part( 'inc/menu','normal');
		}
	}
}

//function custom header by page settings
function canteen_custom_menu_page ($menu) {
	global $post ;
	$canteen_header_menu =  canteen_option( $menu );
	if (!empty($canteen_header_menu)):
		wp_nav_menu( array(
			'menu'            => $canteen_header_menu,
			'items_wrap' => '<ul id="%1$s" class="home-nav nn navigation %2$s">%3$s</ul>',
			'menu_id'         => '',
			'echo'            => true,
		) );
	else:
		wp_nav_menu( array(
			'menu_id'         => '',
			'items_wrap' => '<ul id="%1$s" class="home-nav navigation %2$s">%3$s</ul>',
			'theme_location' => 'primary_menu' 
		) );
	endif;
}

//function custom header by page settings
function canteen_custom_flat_menu_page ($flatmenu) {
	global $post ;
	$canteen_header_flat_menu = canteen_option( $flatmenu );
	if ( !empty($canteen_header_flat_menu) ):
		$menuParameters_flat = array(
			'menu' => $canteen_header_flat_menu,
			'container'       => true,
			'items_wrap'      => '<ul id="%1$s" class="mob-nav  %2$s">%3$s</ul>',
			'depth'           => 0,
		);
	else:
		$menuParameters_flat = array(
			'theme_location' => 'primary_menu',
			'container'       => false,
			'items_wrap'      => '<ul id="%1$s" class="mob-nav  %2$s">%3$s</ul>',
			'depth'           => 0,
		);
	endif;
	echo strip_tags(wp_nav_menu( $menuParameters_flat ), '<a>' );
}



