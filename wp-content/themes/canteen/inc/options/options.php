<?php
/**
 * about Tab For Theme Option.
 *
 * @package canteen
 */


$this->sections[] = array(
	'id' => 'general',
	'icon' => 'el el-book',
	'title' => esc_html__('General', 'canteen'),
	'desc' => esc_html__('Welcome to the theme options', 'canteen'),
);

$this->sections[] = array(
	'id' => 'style',
	'icon' => 'el el-adjust-alt',
	"subsection" => false,
	'title' => esc_html__('Styling', 'canteen'),
	'desc' => esc_html__('Configuration the style settings', 'canteen'),
	'fields' => array(
		array(
			'id'       => 'canteen_color_general',
			'type'     => 'color',
			'title'    => esc_html__('Color Scheme', 'canteen'), 
			'subtitle' => esc_html__('Pick your color scheme (default: #C9AB81).', 'canteen'),
			'default'  => '#C9AB81',
			'validate' => 'color',
		), 
		array(
			'id'       => 'canteen_color_scheme',
			'type'     => 'color',
			'title'    => esc_html__('Hyperlink Color', 'canteen'), 
			'subtitle' => esc_html__('Pick your color for hyperlink. Default color is black #999999', 'canteen'),
			'default'  => '#999999',
			'validate' => 'color',
		), 
		array(
			'id'       => 'canteen_custom_hovers',
			'type'     => 'color',
			'title'    => esc_html__('Hyperlink color on hover state', 'canteen'), 
			'subtitle' => esc_html__('Pick your color for hover state in hyperlink. Default color is #C9AB81', 'canteen'),
			'default'  => '#C9AB81',
			'validate' => 'color',
		),  
		array(
			'id'       => 'canteen_heading_color',
			'type'     => 'color',
			'title'    => esc_html__('Color on Heading', 'canteen'), 
			'subtitle' => esc_html__('Pick your color for heading text. Default color is black #000000', 'canteen'),
			'default'  => '#000000',
			'validate' => 'color',
		), 
		array(
			'id'       => 'canteen_general_color',
			'type'     => 'color',
			'title'    => esc_html__('Color on General Paragraph', 'canteen'), 
			'subtitle' => esc_html__('Pick your color for general paragraph text. Default color is black #666', 'canteen'),
			'default'  => '#666',
			'validate' => 'color',
		), 
		array(
			'id'       => 'canteen_stick_menu',
			'type'     => 'color',
			'title'    => esc_html__('Sticky Menu Background color (for menu with black background & All Sticky Custom Menu)', 'canteen'), 
			'subtitle' => esc_html__('Pick your background color for sticky menu in white text header. Default color is #fff', 'canteen'),
			'default'  => 'rgba(255,255,255,.9)',
			'validate' => 'color',
		), 
		array(
			'id'       => 'canteen_stick_menu2',
			'type'     => 'color',
			'title'    => esc_html__('Sticky Menu Background color (for menu with white background)', 'canteen'), 
			'subtitle' => esc_html__('Pick your background color for sticky menu in white text header. Default color is #ffffff', 'canteen'),
			'default'  => '#ffffff',
			'validate' => 'color',
		), 
		 array(
			'id'       => 'canteen_menu_border',
			'type'     => 'color',
			'title'    => esc_html__('Sticky Menu BBorder color (for menu with transparent background)', 'canteen'), 
			'subtitle' => esc_html__('Pick your border color for sticky menu in transparent text header. Default color is #ffffff', 'canteen'),
			'default'  => '#ffffff',
			'validate' => 'color',
		),
		array(
			'id'       => 'canteen_footer_color',
			'type'     => 'color',
			'title'    => esc_html__('Standard Footer Background color', 'canteen'), 
			'subtitle' => esc_html__('Pick your background color for standard footer. Default color is black #202020', 'canteen'),
			'default'  => '#202020',
			'validate' => 'color',
		),
		array(
			'id'       => 'canteen_footer_color',
			'type'     => 'color',
			'title'    => esc_html__('Standard Footer Background color', 'canteen'), 
			'subtitle' => esc_html__('Pick your background color for standard footer. Default color is black #202020', 'canteen'),
			'default'  => '#202020',
			'validate' => 'color',
		),
	),
);

$this->sections[] = array(
	'id' => 'preloader',
	'icon' => 'el el-repeat',
	"subsection" => false,
	'title' => esc_html__('Preloader', 'canteen'),
	'desc' => esc_html__('Configuration the style settings', 'canteen'),
	'fields' => array(
		array(
			'id'       => 'canteen_preloader_set',
			'type'     => 'select',
			'title'    => esc_html__('Preloader Setting', 'canteen'),
			'options' => array(
					'show_all' => esc_html__('Show in All pages', 'canteen'),
					'show_home' => esc_html__('Show in Home page only', 'canteen'),
					'not_show' => esc_html__('Hide in all pages', 'canteen'),
				),
		),
		array(
			'id'       => 'canteen_preloader_type',
			'type'     => 'select',
			'title'    => esc_html__('Preloader Type', 'canteen'),
			'options' => array(
					'circle' => esc_html__('Circle', 'canteen'),
					'animated_logo' => esc_html__('Animated Logo', 'canteen'),
				),
		),

		array(
			'id'       => 'canteen_loader_color',
			'type'     => 'color',
			'title'    => esc_html__('Color Scheme', 'canteen'), 
			'subtitle' => esc_html__('Pick your color scheme (default: #C9AB81).', 'canteen'),
			'default'  => '#C9AB81',
			'validate' => 'color',
		),       
	),
); 

$this->sections[] = array(
	'icon' => 'el el-photo',
	"subsection" => false,
	'title' => esc_html__('Header', 'canteen'),
	'desc' => esc_html__('Assign menu for header section.', 'canteen'),
	'fields' => array(
		array(
			'id'       => 'canteen_header_set',
			'type'     => 'select',
			'title'    => esc_html__('Header type', 'canteen'),
			'options' => array(
				'default' => esc_html__('Standard Header', 'canteen'),
				'custom' => esc_html__('Custom Header', 'canteen'),
			),
		),

		array(
			'id'    => 'canteen_header_set_list',
			'type'  => 'select',
			'desc' => esc_html__('(Only if custom header selected as header type))', 'canteen'),
			'title'    => esc_html__('Header format', 'canteen'),
			'data'  => 'posts',
			'args'  => array(
				'post_type' => 'header',
				'orderby'   => 'title',
				'order'     => 'ASC',
			)
		),  
	),
);

$this->sections[] = array(
	'id' => 'header_logo',
	'icon' => 'el el-universal-access',
	"subsection" => false,
	'title' => esc_html__('Header logo', 'canteen'),
	'desc' => esc_html__('Configuration the style settings', 'canteen'),
	'fields' => array(
		array(
			'id'       => 'canteen_header_logo_white',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__('Logo White Text', 'canteen'), 
			'subtitle' => esc_html__('Upload your logo for white text (standard) header (Recommended size 240x80px)', 'canteen'),
			'default'  => array('url'=>get_template_directory_uri().'/images/logo-white.png'),
		), 
		array(
			'id'       => 'canteen_header_logo_dark',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__('Logo Dark Text', 'canteen'), 
			'subtitle' => esc_html__('Upload your logo for dark text (standard) header (Recommended size 240x80px)', 'canteen'),
			'default'  => array('url'=>get_template_directory_uri().'/images/logo.png'),
		),
		array(
			'id'       => 'canteen_logo_dim',
			'type'     => 'dimensions',
			'units'    => array('em','px','%'),
			'title'    => esc_html__('Logo dimensions (Width/Height)', 'canteen'), 
			'subtitle' => esc_html__('Enable or disable any piece of this field. Width, Height, or Units.)', 'canteen'),
			'default'  => array(
				'Width'   => '240', 
				'Height'  => '80'
			),
		), 
     
	)
);

$this->sections[] = array(
	'id' => 'canteen_header_social',
	'icon' => 'el el-group',
	"subsection" => false,
	'title' => esc_html__('Header social', 'canteen'),
	'desc' => esc_html__('Configuration the header social icons', 'canteen'),
	'fields' => array(
		array(
			'id'       => 'canteen_menu_position',
			'type'     => 'select',
			'title'    => esc_html__('Menu Position', 'canteen'), 
			'options' => array(
				'right' => esc_html__('Right', 'canteen'),
				'center' => esc_html__('Center', 'canteen'),
			), 
			'default'  => 'right',
		), 
		array(
			'id'       => 'canteen_header_enable_topmenu',
			'type'     => 'select',
			'title'    => esc_html__('Enable Top Menu', 'canteen'),
			'options' => array(
				'on' => esc_html__('On', 'canteen'),
				'off' => esc_html__('Off', 'canteen'),
			), 
			'default'  => 'off',
		), 
		array(
			'id'       => 'canteen_header_phone',
			'type'     => 'text',
			'title'    => esc_html__('Phone', 'canteen'), 
			'subtitle' => esc_html__('Input phone number', 'canteen'),
			'required'  => array('canteen_header_enable_topmenu', 'equals','on'),
		),
		array(
			'id'       => 'canteen_header_mail',
			'type'     => 'text',
			'title'    => esc_html__('Mail', 'canteen'), 
			'subtitle' => esc_html__('Input mail address', 'canteen'),
			'required'  => array('canteen_header_enable_topmenu', 'equals','on'),
		),
		array(
			'id'       => 'canteen_header_address',
			'type'     => 'text',
			'title'    => esc_html__('Address', 'canteen'), 
			'subtitle' => esc_html__('Input address', 'canteen'),
			'required'  => array('canteen_header_enable_topmenu', 'equals','on'),
		),
		array(
			'id'       => 'canteen_header_join',
			'type'     => 'text',
			'title'    => esc_html__('Join', 'canteen'), 
			'subtitle' => esc_html__('Input Join text', 'canteen'),
			'required'  => array('canteen_header_enable_topmenu', 'equals','on'),
		),
		array(
			'id'       => 'canteen_header_joinlink',
			'type'     => 'text',
			'title'    => esc_html__('Join', 'canteen'), 
			'subtitle' => esc_html__('Input Join link', 'canteen'),
			'required'  => array('canteen_header_enable_topmenu', 'equals','on'),
		),
		array(
			'id'       => 'canteen_header_enable_social',
			'type'     => 'select',
			'title'    => esc_html__('Enable Header Social', 'canteen'),
			'options' => array(
				'on' => esc_html__('On', 'canteen'),
				'off' => esc_html__('Off', 'canteen'),
			), 
			'default'  => 'off',
		), 
		array(
			'id'       => 'canteen_header_facebook',
			'type'     => 'text',
			'title'    => esc_html__('Facebook Link', 'canteen'), 
			'subtitle' => esc_html__('Input facebook link here', 'canteen'),
			'required'  => array('canteen_header_enable_social', 'equals','on'),
		), 
		array(
			'id'       => 'canteen_header_googleplus',
			'type'     => 'text',
			'title'    => esc_html__('Google Plus Link', 'canteen'), 
			'subtitle' => esc_html__('Input google plus link here', 'canteen'),
			'required'  => array('canteen_header_enable_social', 'equals','on'),
		), 
		array(
			'id'       => 'canteen_header_twitter',
			'type'     => 'text',
			'title'    => esc_html__('Twitter Link', 'canteen'), 
			'subtitle' => esc_html__('Input Twitter link here', 'canteen'),
			'required'  => array('canteen_header_enable_social', 'equals','on'),
		), 
		array(
			'id'       => 'canteen_header_instagram',
			'type'     => 'text',
			'title'    => esc_html__('Instagram Link', 'canteen'), 
			'subtitle' => esc_html__('Input Instagram link here', 'canteen'),
			'required'  => array('canteen_header_enable_social', 'equals','on'),
		),  
		array(
			'id'       => 'canteen_header_pinterest',
			'type'     => 'text',
			'title'    => esc_html__('Pinterest Link', 'canteen'), 
			'subtitle' => esc_html__('Input Pinterest link here', 'canteen'),
			'required'  => array('canteen_header_enable_social', 'equals','on'),
		), 
		array(
			'id'       => 'canteen_header_xing',
			'type'     => 'text',
			'title'    => esc_html__('Xing Link', 'canteen'), 
			'subtitle' => esc_html__('Input Xing link here', 'canteen'),
			'required'  => array('canteen_header_enable_social', 'equals','on'),
		),  
		array(
			'id'       => 'canteen_header_linkedin',
			'type'     => 'text',
			'title'    => esc_html__('LinkedIn Link', 'canteen'), 
			'subtitle' => esc_html__('Input LinkedIn link here', 'canteen'),
			'required'  => array('canteen_header_enable_social', 'equals','on'),
		),   
		array(
			'id'       => 'canteen_header_search',
			'type'     => 'select',
			'title'    => esc_html__('Search Icon', 'canteen'), 
			'subtitle' => esc_html__('To show search icon in header', 'canteen'),
			'options' => array(
				'on' => esc_html__('On', 'canteen'),
				'off' => esc_html__('Off', 'canteen'),
			), 
			'default'  => 'off',
		), 
		array(
			'id'       => 'canteen_header_cart',
			'type'     => 'select',
			'title'    => esc_html__('Cart Icon', 'canteen'), 
			'subtitle' => esc_html__('To show Cart icon in header', 'canteen'),
			'options' => array(
				'on' => esc_html__('On', 'canteen'),
				'off' => esc_html__('Off', 'canteen'),
			), 
			'default'  => 'off',
		), 
		array(
			'id'       => 'canteen_header_btn',
			'type'     => 'select',
			'title'    => esc_html__('Button', 'canteen'), 
			'subtitle' => esc_html__('To show Button in header', 'canteen'),
			'options' => array(
				'on' => esc_html__('On', 'canteen'),
				'off' => esc_html__('Off', 'canteen'),
			), 
			'default'  => 'off',
		), 
		array(
			'id'       => 'canteen_menu_btn',
			'type'     => 'text',
			'title'    => esc_html__('Button Text', 'canteen'), 
			'required'  => array('canteen_header_btn', 'equals','on'),
		),
		array(
			'id'       => 'canteen_menu_btn_url',
			'type'     => 'text',
			'title'    => esc_html__('Button URL', 'canteen'),
			'required'  => array('canteen_header_btn', 'equals','on'), 
		),
	)
);

$this->sections[] = array(
	'icon' => 'el-icon-lines',
	"subsection" => false,
	'title' => esc_html__('Footer', 'canteen'),
	'desc' => esc_html__('Assign menu for footer section.', 'canteen'),
	'fields' => array(
		array(
			'id'       => 'canteen_footer_set',
			'type'     => 'select',
			'title'    => esc_html__('Footer Text Color', 'canteen'),
			'options' => array(
				'default' => esc_html__('Standard Footer', 'canteen'),
				'custom' => esc_html__('Custom Footer', 'canteen'),
			),
		),
		array(
			'id'    => 'canteen_footer_set_list',
			'type'  => 'select',
			'title'    => esc_html__('Footer Text Color', 'canteen'),
			'data'  => 'posts',
			'args'  => array(
				'post_type' => 'footer',
				'orderby'   => 'title',
				'order'     => 'ASC',
			)
		),     
	),
);

$this->sections[] = array(
	'id' => 'footer_logo',
	"subsection" => false,
	'title' => esc_html__('Footer logo', 'canteen'),
	'desc' => esc_html__('Configuration the style settings', 'canteen'),
	'fields' => array(
		array(
			'id'       => 'canteen_footer_logo_white',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__('Logo White Text', 'canteen'), 
			'subtitle' => esc_html__('Upload your logo for white text (standard) footer (Recommended size 240x80px)', 'canteen'),
			'default'  => array('url'=>get_template_directory_uri().'/images/logo.png'),
		),

		array(
			'id'       => 'canteen_footer_logo_dark',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__('Logo Dark Text', 'canteen'), 
			'subtitle' => esc_html__('Upload your logo for dark text (standard) footer (Recommended size 240x80px)', 'canteen'),
			'default'  => array('url'=>get_template_directory_uri().'/images/logo-white.png'),
		), 
		array(
			'id'       => 'canteen_footer_text',
			'type'     => 'editor',
			'title'    => esc_html__('Footer Text', 'canteen'), 
			'subtitle' => esc_html__('Upload your logo for dark text (standard) footer (Recommended size 240x80px)', 'canteen'),
			'default' => '',
			'args'   => array('teeny'  => true,'textarea_rows'=> 10)
		), 
	)
);

$this->sections[] = array(
	'id' => 'canteen_footer_social',
	'icon' => 'el el-group-alt',
	"subsection" => false,
	'title' => esc_html__('Footer social', 'canteen'),
	'desc' => esc_html__('Configuration the footer social icons', 'canteen'),
	'fields' => array(
		array(
			'id'       => 'canteen_footer_enable_social',
			'type'     => 'switch',
			'title'    => esc_html__('Enable Footer Social', 'canteen'), 
			'default'  => true,
		), 
		array(
			'id'       => 'canteen_footer_facebook',
			'type'     => 'text',
			'title'    => esc_html__('Facebook Link', 'canteen'), 
			'subtitle' => esc_html__('Input facebook link here', 'canteen'),
			'required'  => array('canteen_footer_enable_social', 'equals',true),
		), 
		array(
			'id'       => 'canteen_footer_googleplus',
			'type'     => 'text',
			'title'    => esc_html__('Google Plus Link', 'canteen'), 
			'subtitle' => esc_html__('Input google plus link here', 'canteen'),
			'required'  => array('canteen_footer_enable_social', 'equals',true),
		), 
		array(
			'id'       => 'canteen_footer_twitter',
			'type'     => 'text',
			'title'    => esc_html__('Twitter Link', 'canteen'), 
			'subtitle' => esc_html__('Input Twitter link here', 'canteen'),
			'required'  => array('canteen_footer_enable_social', 'equals',true),
		), 
		array(
			'id'       => 'canteen_footer_instagram',
			'type'     => 'text',
			'title'    => esc_html__('Instagram Link', 'canteen'), 
			'subtitle' => esc_html__('Input Instagram link here', 'canteen'),
			'required'  => array('canteen_footer_enable_social', 'equals',true),
		),  
		array(
			'id'       => 'canteen_footer_pinterest',
			'type'     => 'text',
			'title'    => esc_html__('Pinterest Link', 'canteen'), 
			'subtitle' => esc_html__('Input Pinterest link here', 'canteen'),
			'required'  => array('canteen_footer_enable_social', 'equals',true),
		), 
		array(
			'id'       => 'canteen_footer_xing',
			'type'     => 'text',
			'title'    => esc_html__('Xing Link', 'canteen'), 
			'subtitle' => esc_html__('Input Xing link here', 'canteen'),
			'required'  => array('canteen_footer_enable_social', 'equals',true),
		),  
		array(
			'id'       => 'canteen_footer_linkedin',
			'type'     => 'text',
			'title'    => esc_html__('LinkedIn Link', 'canteen'), 
			'subtitle' => esc_html__('Input LinkedIn link here', 'canteen'),
			'required'  => array('canteen_footer_enable_social', 'equals',true),
		),  
	)
);

$this->sections[] = array(
	'id' => 'portfolio',
	'icon'=>'el el-briefcase',
	"subsection" => false,
	'title' => esc_html__('Portfolio setting', 'canteen'),
	'desc' => esc_html__('Configuration portfolio settings', 'canteen'),
	'fields' => array(
		array(
			'id'       => 'canteen_portfolio_all',
			'type'     => 'text',
			'title'    => esc_html__('All categories filter', 'canteen'), 
			'subtitle' => esc_html__('Portfolio Text Filter for all categories', 'canteen'),
			'desc' => esc_html__('Insert your text for portfolio filter for all categories. The default text is "All"', 'canteen'),
			'default'  => 'All',
		),  
		array(
			'id'       => 'canteen_other_port_sub',
			'type'     => 'text',
			'title'    => esc_html__('Other Portfolio Section Subtitle', 'canteen'), 
			'desc' => esc_html__('Insert your text for subt title of other portfolio section on single portfolio page.<br/>Leave it blank if you want to use the default text.', 'canteen'),
			'default'  => 'See our other portfolio',
		),
		array(
			'id'       => 'canteen_other_port_title',
			'type'     => 'text',
			'title'    => esc_html__('Other Portfolio Section Title', 'canteen'), 
			'desc' => esc_html__('Insert your text for title of other portfolio section on single portfolio page.<br/>Leave it blank if you want to use the default text.', 'canteen'),
			'default'  => 'Other portfolio',
		),
	),
);

$this->sections[] = array(
	'id' => 'blog',
	'icon'=>'el el-bold',
	"subsection" => false,
	'title' => esc_html__('Blog setting', 'canteen'),
	'desc' => esc_html__('Configuration blog settings', 'canteen'),
	'fields' => array(

		array(
			'id'       => 'canteen_sidebar_format', 
			'type'     => 'select',
			'title'    => esc_html__('Sidebar Format', 'canteen'),
			'options' => array(
					'right_sidebar' => esc_html__( 'Right Sidebar', 'canteen' ),
					'left_sidebar' => esc_html__( 'Left Sidebar','canteen'),
					'no_sidebar' => esc_html__( 'No Sidebar', 'canteen' ),
			),
			'default'  => 'right_sidebar', 
		),
		array(
			'id'       => 'canteen_related_image',
			'type'     => 'select',
			'title'    => esc_html__('Featured Image in Related Posts', 'canteen'),
			'options' => array(
					'show' => esc_html__('Show', 'canteen'),
					'hide' => esc_html__('Hide', 'canteen'),
			),
			'default'  => 'show',
		),

		array( 
			'id'       => 'canteen_blog_slide_delay',
			'type'     => 'slider',
			'title'    => esc_html__('Blog Slider Delay', 'canteen'), 
			'desc' => esc_html__('Insert the slider delay for slider in blog sidebar,blog wide and single blog post here. The default value 8000', 'canteen'),
			'default'  => 8000,
			"min"       => 1,
			"step"      => 1,
			"max"       => 10000,
			'display_value' => 'label'
		),       
	),

);

?>