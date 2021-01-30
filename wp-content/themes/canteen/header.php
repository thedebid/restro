<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<link rel="profile" href="//gmpg.org/xfn/11" />
	<meta name="viewport" content="width=device-width, initial-scale=1" >   	
 
	<?php wp_head(); ?> 
</head>
	
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<div class="cursor"></div>

	<?php if ( class_exists('ReduxFrameworkPlugin') ) :
		if (canteen_option( 'canteen_preloader_set')) :  
		 $canteen_preload = canteen_option( 'canteen_preloader_set' ); 
		 $canteen_preloader_type = canteen_option( 'canteen_preloader_type' ); 
		 $canteen_svg_url = get_template_directory_uri().'/images/loader-svgs';
		 	if ( $canteen_preloader_type == "circle" ) { 
				$svg_html = '<div class="pre-loading"><div class="load-circle"></div></div>';
			} else if ( $canteen_preloader_type == "animated_logo" ) {
				$svg_html = '<div class="svg-pre-loading"><div class="pre-loader"> <object data="'.$canteen_svg_url.'/canteen_loader.svg" type="image/svg+xml"></object></div></div>';
			}
			$allow_html= 
				array(
					'div' => array(
						'class'	 => array(),
					), 
					'object'=> array(
						'data'=> array(
							array(
								'svg'     => array(
									'class'       => true,
									'xmlns'       => true,
									'width'       => true,
									'height'      => true,
									'viewbox'     => true,
									'aria-hidden' => true,
									'role'        => true,
									'focusable'   => true,
								),
								'path'    => array(
									'fill'      => true,
									'stroke'    => true,
									'stroke-miterlimit' => true,
									'fill-rule' => true,
									'd'         => true,
									'transform' => true,
									'class'     => true,
									'stroke-width' => true,
								),
								'polygon' => array(
									'fill'      => true,
									'fill-rule' => true,
									'points'    => true,
									'transform' => true,
									'focusable' => true,
								),
								'style' => array(
									'data-made-with'   => true,
								),
							),
						),
						'type'=> array(),
					),
				);

			 if ($canteen_preload == 'show_home') {  ?>	
				<?php  if (is_front_page() ){ echo wp_kses($svg_html,$allow_html); }	 
			} else if ($canteen_preload == 'show_all') {echo wp_kses($svg_html,$allow_html); } 
		endif ; 
	endif; ?>
				