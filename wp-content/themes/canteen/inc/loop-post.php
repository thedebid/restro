<?php
/**
 * Blog Post Loop
 */
?>
<!--BLOG POST START-->      
<article id="post-<?php  the_ID(); ?>" <?php  post_class('clearfix blog-post'); ?>> 
 
	<!--if post is standard-->
	
	<?php  if ( get_post_meta($post->ID, 'post_format', true) == '' && has_post_thumbnail()){
		echo'<div class="img-post">';
		the_post_thumbnail(); 
		echo'</div>';
	}

	if ( get_post_meta($post->ID, 'post_format', true) == 'post_standard'){
		the_post_thumbnail( 'full', array( 'class' => 'full-size-img' ) );
		//post is gallery
	} else if ( get_post_meta($post->ID, 'post_format', true) == 'post_gallery'){ 
		echo '<div class="blog-gallery clearboth clearfix">';
			$canteen_image_ids = get_post_meta(get_the_ID(), 'post_gallery_setting', true);
			$canteen_image_ids = explode( ',', $canteen_image_ids );
			foreach( $canteen_image_ids as $canteen_image_id ) {
				$canteen_image_title  = get_the_title( $canteen_image_id );
				$canteen_image_port = wp_get_attachment_image( $canteen_image_id, 'full' );
				$canteen_imageurl     =   wp_get_attachment_url( $canteen_image_id ); 
				echo '<div>
					<a class="blog-popup-img" href="' . esc_url( $canteen_imageurl ) . '">
						<span>
						<i class="fa fa-search"></i>
						</span>
						' . $canteen_image_port . '
					</a>
				</div>';
			} 
		echo'</div>';
	
	//if post is slider
	} else if ( get_post_meta($post->ID, 'post_format', true) == 'post_slider'){ ?>
	
		<div class="blog-slider ani-slider slider" data-slick='{"autoplaySpeed":<?php if ( class_exists('ReduxFrameworkPlugin') && canteen_option( 'canteen_blog_slide_delay' ) !='' ){echo esc_attr ( canteen_option( 'canteen_blog_slide_delay' ));} else {echo '8000'; } ?> }'>
			<?php $canteen_simage_ids = get_post_meta(get_the_ID(), 'post_slider_setting', true);
			$canteen_simage_ids = explode( ',', $canteen_simage_ids );
			foreach( $canteen_simage_ids as $canteen_simage_id ) {
				$canteen_simage_port = wp_get_attachment_image( $canteen_simage_id, 'full' );
				$canteen_simageurl =  esc_url( wp_get_attachment_url( $canteen_simage_id )); ?>
				<div class="slide">
					<div class="slider-mask" data-animation="slideLeftReturn" data-delay="0.1s">
					</div>
					<div class="slider-img-bg blog-img-bg" data-animation="fadeIn" data-delay="0.2s" data-animation-duration="0.7s"data-background="<?php echo esc_url($canteen_simageurl); ?>">
					</div>
					<div class="blog-slider-box">
						<div class="slider-content"></div>
					</div><!--/.blog-slider-box-->
				</div><!--/.slide-->
			<?php }
		echo'</div>'; 

	//if post video 
	} else if ( get_post_meta($post->ID, 'post_format', true) == 'post_video'){

		echo'<div class="video"><iframe width="560" height="315" src="'.esc_attr( get_post_meta($post->ID, 'post_video_setting', true)).'?wmode=opaque;rel=0;showinfo=0;controls=0;iv_load_policy=3"></iframe></div>';
				
	//if post audio
	} else if ( get_post_meta($post->ID, 'post_format', true) == 'post_audio'){ ?>
		<div class="audio">
			<?php $canteen_audio =get_post_meta($post->ID, 'post_audio_setting', true);
			echo wp_kses( $canteen_audio, array( 
				'iframe' => array(
					'src' => array(),
					'width' => array(),
					'height' => array(),
					'scrolling' => array(),
					'frameborder' => array(),
				),
			) ); ?>
		</div>
	<?php }?>

	<div class="spc-30 clearfix"></div>
	<a href="<?php the_permalink(); ?>">
		<h3 class="entry-title"><?php the_title(); ?></h3>
	</a>

	<ul class="post-detail">
			<li>
				<i class="lnr lnr-user fw-600"></i> <?php the_author_posts_link(); ?> 
			</li>
			<li>
				<i class="lnr lnr-history"></i> <?php echo get_the_date(); ?> 
			</li>
		<?php if(has_category()) { ?> 
			<li>
				<i class="lnr lnr-book"></i> <?php the_category(', '); ?>
			</li>
		<?php }?>

		<?php if(get_the_tag_list()) { ?>  
			<li>
				<i class="lnr lnr-tag"></i><?php the_tags('', ', '); ?>
			</li>
		<?php }?>

			<li>
				<i class="lnr lnr-bubble"></i> 
  					<?php 
  					if(get_comments_number()==1){
  					echo esc_attr($post->comment_count).esc_attr__(' Comment','canteen'); 
  					}else{
						echo esc_attr($post->comment_count).esc_attr__(' Comments','canteen'); 
						}
  					?>
			</li> 
	</ul>

	<div class="spc-20 clearfix"></div>
	<?php the_excerpt(); ?>
	<div class="spc-10 clearfix"></div>
	<a class="content-btn" href="<?php the_permalink(); ?>">
		<?php echo esc_html_e('Continue Reading','canteen') ?>
		<span class="content-btn-align-icon-right content-btn-button-icon">
			<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
		</span>
	</a>
	<div class="border-post clearfix"></div>
	<div class="clearboth spc-20"></div>
</article><!--/.blog-post-->
<!--BLOG POST END-->