<?php
/*
* Bottom Footer
*/
global $canteen_theme_settings;
?>

<footer class="footer">
	<div class="container-fluid">
		
		<?php if ( class_exists( 'ReduxFrameworkPlugin' ) && canteen_option( 'canteen_footer_logo_white' ) != '' ) { ?>
			<img class="footer-img" src="<?php $canteen_footer_logo_white = canteen_option('canteen_footer_logo_white');
			echo esc_url ( $canteen_footer_logo_white['url']); ?>" alt="<?php esc_attr_e ('LogoWhite','canteen'); ?>">
		<?php } elseif ( class_exists('ReduxFrameworkPlugin' ) && canteen_option( 'canteen_footer_logo_dark' ) != '') { ?>
			<img class="footer-img" src="<?php 
			$canteen_footer_logo_dark = canteen_option('canteen_footer_logo_dark');
			echo esc_url ( $canteen_footer_logo_dark['url']); ?>"   alt="<?php esc_attr_e ('LogoDark','canteen'); ?>">
		<?php } else {echo '';}?>

		<div class="clearboth clearfix"></div>

		<ul class="footer-icon hidden-sm hidden-xs">
			<?php if ( class_exists( 'ReduxFrameworkPlugin' ) ) : 
				if ( canteen_option( 'canteen_footer_enable_social' ) == true && canteen_option( 'canteen_footer_facebook' )) : ?>
					<li><a href="<?php  echo esc_url( canteen_option( 'canteen_footer_facebook' ) ); ?>">
							<i class="fa fa-facebook"></i>
						</a>
					</li>
				<?php endif; ?>
			<?php endif; ?>

			<?php if ( class_exists( 'ReduxFrameworkPlugin' ) ) :
				if ( canteen_option( 'canteen_footer_enable_social' ) == true && canteen_option( 'canteen_footer_googleplus' ) ) : ?>
					<li>
						<a href="<?php  echo esc_url(canteen_option( 'canteen_footer_googleplus' )); ?>">
							<i class="fa fa-google-plus"></i>
						</a>
					</li>
				<?php endif; ?>
			<?php endif; ?>

			<?php if ( class_exists( 'ReduxFrameworkPlugin' ) ) :
				if ( canteen_option( 'canteen_footer_enable_social' ) == true && canteen_option( 'canteen_footer_twitter' ) ) : ?>
					<li>
						<a href="<?php  echo esc_url(canteen_option( 'canteen_footer_twitter' )); ?>">
							<i class="fa fa-twitter"></i>
						</a>
					</li>
				<?php endif; ?>
			<?php endif; ?>

			<?php if (class_exists('ReduxFrameworkPlugin')) :
					if (canteen_option('canteen_footer_enable_social') == true && canteen_option( 'canteen_footer_instagram' )) :  ?>
						<li>
							<a href="<?php  echo esc_url(canteen_option( 'canteen_footer_instagram' )); ?>">
								<i class="fa fa-instagram"></i>
							</a>
						</li>
					<?php endif; ?>
			<?php endif; ?>

			<?php if (class_exists('ReduxFrameworkPlugin')) :
					if (canteen_option('canteen_footer_enable_social') == true && canteen_option( 'canteen_footer_pinterest')) :  ?>
						<li>
							<a href="<?php  echo esc_url(canteen_option( 'canteen_footer_pinterest') ); ?>">
								<i class="fa fa-pinterest"></i>
							</a>
						</li>
					<?php endif; ?>
			<?php endif; ?>

			<?php if ( class_exists( 'ReduxFrameworkPlugin' ) ) :
					if ( canteen_option( 'canteen_footer_enable_social' ) == true && canteen_option( 'canteen_footer_xing' ) ) : ?>
						<li>
							<a href="<?php  echo esc_url(canteen_option( 'canteen_footer_xing') ); ?>">
								<i class="fa fa-xing"></i>
							</a>
						</li>
					<?php endif; ?>
			<?php endif; ?>

			<?php if ( class_exists( 'ReduxFrameworkPlugin' ) ) :
					if ( canteen_option( 'canteen_footer_enable_social' ) == true && canteen_option( 'canteen_footer_linkedin' ) ) : ?>
						<li>
							<a href="<?php  echo esc_url(canteen_option( 'canteen_footer_linkedin') ); ?>">
								<i class="fa fa-linkedin"></i>
							</a>
						</li>
					<?php endif; ?>
			<?php endif; ?>
		</ul><!-- /.footer-icon -->

		<?php 
		if ( class_exists( 'ReduxFrameworkPlugin' ) && canteen_option( 'canteen_footer_text' ) ) { 
			$canteen_footer_text = canteen_option( 'canteen_footer_text' );
			echo wp_kses_post( $canteen_footer_text ); 
		} else {
			echo '<p>'.esc_html__( 'Copyright 2020 by Design_Story All Rights Reserved.', 'canteen' ).'</p>';
		} 
		?>

	</div><!--/.container-fluid-->
</footer><!--/.footer--> 