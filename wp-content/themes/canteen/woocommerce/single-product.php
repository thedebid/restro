<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); 
		
	//custom header
	if ( class_exists('ReduxFrameworkPlugin') ) { 
		do_action('canteen-custom-header','canteen_header_start') ;        
	} else { ?>
		<!--Fall back if no reduxoptions instalcanteen-->
		<div class="default-header clearfix">
			<?php get_template_part( 'inc/menu'); ?>
		</div><!--/home end-->		
	<?php } ?> 
	<div class="content shop-wrapper">  
	<div class="container clearfix">
		<div class="row clearfix">
			<div class="col-md-12 shop-content">

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

					<div class="spc-40 clearfix"></div>
				</div><!--/.col-md-12-->
				
			</div><!--/.row-->
		</div><!--/.container-->
	</div><!--/.blog-wrapper-->


	<?php //custom footer
	if ( class_exists('ReduxFrameworkPlugin') ) { 
		do_action('canteen-custom-footer','canteen_footer_start');
	} else {
		//Fall back if no reduxoptions instalcanteen
		get_template_part( 'inc/bottom','footer'); 
	}
		
get_footer(); 

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */

