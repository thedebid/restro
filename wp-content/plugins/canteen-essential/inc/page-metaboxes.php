<?php
/**
 * Initialize the Post Post Meta Boxes. 
 */
add_action( 'admin_init', 'canteen_page_mb' ); 
function canteen_page_mb() {
  
  /**
   * Create a custom meta boxes array that we pass to 
   * the reduxoptions Meta Box API Class.
   */
  $canteen_page_mb = array(
    'id'          => 'page_meta_box',
    'title'       => esc_html__( 'Page Settings', 'canteen-essential' ),
    'desc'        => '',
    'pages'       => array( 'page','portfolio','post'),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
	
	  array(
        'id'          => 'custom_footer_header_note',
        'label'       => esc_html__('Please Note', 'canteen-essential' ),
        'desc'        => esc_html__('The Custom Header & Custom Footer only appear on the actual page, not in elementor editor.', 'canteen-essential' ),
        'std'         => '',
        'type'        => 'textblock-titcanteen',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  
	  
	   
	  
	  array(
        'label'       => esc_html__( 'Header Settings', 'canteen-essential' ),
        'id'          => 'header_setting_section',
        'type'        => 'tab',
      ),
	  
	  array(
        'label'       => esc_html__( 'Header Options', 'canteen-essential' ),
		'desc'          =>  '',
        'id'          => 'custom_header_choice',
        'type'        => 'select',
		'std'		 => 'global',
		'choices'     => array( 
			 array(
                'value'       => 'global',
                'label'       => esc_html__( 'Use Global Settings (in Theme Options)', 'canteen-essential' )
              ),
			  array(
                'value'       => 'standard',
                'label'       => esc_html__( 'Use Default Header', 'canteen-essential' )
              ),
			  array(
                'value'       => 'custom_header',
                'label'       => esc_html__( 'Use Custom Header', 'canteen-essential' )
              ),
			  array(
                'value'       => 'no_header',
                'label'       => esc_html__( 'No Header', 'canteen-essential' )
              ),
			  
		)
      ),
	  
      array(
        'id'          => 'header_list',
        'label'       => esc_html__( 'Choose Custom Header', 'canteen-essential' ),
        'desc'        => '',
        'std'         => '',
		'condition'   => 'custom_header_choice:is(custom_header)',
        'type' => 'custom-post-type-select',
        'rows'        => '',
        'post_type'   => 'header',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	  
	  array(
        'label'       => esc_html__( 'Header Format', 'canteen-essential' ),
		'desc'          => '',
        'id'          => 'menu_format',
        'type'        => 'select',
		'condition'   => 'custom_header_choice:is(standard)',
		'std'		 => 'head_clean',
		'choices'     => array( 
			  array(
                'value'       => 'head_clean',
                'label'       => esc_html__( 'Black Text with White Background Header in Relative Position', 'canteen-essential' )
              ),
			  array(
                'value'       => 'head_standard',
                'label'       => esc_html__( 'White Text with Transparent Background Header in Absolute Position', 'canteen-essential' )
              ),
			  
		)
      ),
	  
	  array(
        'label'       => esc_html__( 'Footer Settings', 'canteen-essential' ),
        'id'          => 'footer_setting_section',
        'type'        => 'tab',
      ),
 
	  array(
        'label'       => esc_html__( 'Use Custom Footer', 'canteen-essential' ),
		'desc'          =>  '',
        'id'          => 'custom_footer_choice',
        'type'        => 'select',
		'std'		 => 'global',
		'choices'     => array( 
			  array(
                'value'       => 'global',
                'label'       => esc_html__( 'Use Global Settings (in Theme Options) Footer', 'canteen-essential' )
              ),
			  array(
                'value'       => 'standard',
                'label'       => esc_html__( 'Use Default Footer', 'canteen-essential' )
              ),
			  array(
                'value'       => 'custom_footer',
                'label'       => esc_html__( 'Use Custom Footer', 'canteen-essential' )
              ),
			  array(
                'value'       => 'no_footer',
                'label'       => esc_html__( 'No Footer', 'canteen-essential' )
              ),
			  
		)
      ),
	  
	
	  
	  array(
        'id'          => 'footer_list',
        'label'       => esc_html__( 'Choose Custom Footer', 'canteen-essential' ),
        'desc'        => '',
        'std'         => '',
		'condition'   => 'custom_footer_choice:is(custom_footer)',
        'type' => 'custom-post-type-select',
        'rows'        => '',
        'post_type'   => 'footer',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	  
    )
  );
  
  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $canteen_page_mb );

}

