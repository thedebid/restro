<?php 
//function for custom footer 
function canteen_footer_start () {
	if (is_singular()) { 
		//if single page/post
		global $post;
		global $canteen_theme_settings;
		if (get_post_meta( $post->ID, 'canteen_footer_format', true ) =='custom_footer' && get_post_meta( $post->ID, 'canteen_footer_list', true ) ) { 
			$footer_id =  get_post_meta( $post->ID, 'canteen_footer_list', true );  
			$canteen_footer = new WP_Query( array(
				'posts_per_page'   => 1,
				'post_type' =>  'footer',
				 'p'         => $footer_id,
			) ); 
			
			if ( $canteen_footer->have_posts() ) : 
				while  ( $canteen_footer->have_posts() ) : $canteen_footer->the_post();
					global $post ; ?>
					<footer class="canteen-custom-footer clearfix <?php echo esc_attr($footer_id); ?>"> 
						<?php the_content(); ?>
					</footer>
				<?php endwhile; ?> 
			<?php endif; wp_reset_postdata();
		} 

		//if page setting choose footer global
		else if (get_post_meta( $post->ID, 'canteen_footer_format', true ) =='global'){ 
		
			//if custom footer & list are selected in theme options
			if (canteen_option( 'canteen_footer_set' ) =='custom' && canteen_option( 'canteen_footer_set_list' ) !='' ) {

				$footer_id =  canteen_option( 'canteen_footer_set_list' );   
				$canteen_footer = new WP_Query(array(
					'posts_per_page'   => 1,
					'post_type' =>  'footer',
					'p'         => $footer_id,
				)); 
			  
				if ( $canteen_footer->have_posts() ) : 
					while  ( $canteen_footer->have_posts() ) : $canteen_footer->the_post();
						global $post ; ?>
						<footer class="canteen-custom-footer clearfix">
						<?php the_content(); ?>
						</footer>
					<?php endwhile; 
				endif; 
				wp_reset_postdata();

			} else {
			  get_template_part( 'inc/bottom','footer');
			}
		
		//if no footer
		} else if (get_post_meta($post->ID, 'canteen_footer_format', true) =='no_footer'){ 

		//do nothing
		} else {  
			//if else (standard footer)
			get_template_part( 'inc/bottom','footer'); 
		}
	
	//if not single page/post
	} else {
		//if custom footer & list are selected in theme options
		if ( canteen_option( 'canteen_footer_set' ) =='custom' && canteen_option( 'canteen_footer_set_list' ) !='' ) {
			$footer_id = canteen_option( 'canteen_footer_set_list' );  
		
			$canteen_footer = new WP_Query( array(
				'posts_per_page'   => 1,
				'post_type' =>  'footer',
				'p'         => $footer_id,
			) ); 
			  
			if ( $canteen_footer->have_posts()) : 
				while  ( $canteen_footer->have_posts() ) : $canteen_footer->the_post();
					global $post ; ?>
					<nav class="canteen-custom-footer clearfix <?php echo esc_attr ( get_post_meta( $post->ID, 'head_position', true ) )?>">
						<?php the_content(); ?>
					</nav>
				<?php endwhile; 
			endif; 
			wp_reset_postdata();
		} else { 
			//standard footer
			get_template_part( 'inc/bottom','footer'); 
		}
	}
}