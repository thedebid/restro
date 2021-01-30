<?php
/**
 * Metabox For Header.
 *
 * @package Canteen
 */
?>
<?php 
canteen_meta_box_dropdown('canteen_header_format',
	esc_html__('Header Format', 'canteen-essential'),
	array('global' => esc_html__( 'Use Global Settings (in Theme Options)', 'canteen-essential' ),
		  'head_white' => esc_html__( 'Black Txt & White Background, Relative Position', 'canteen-essential' ),
		  'head_trans' => esc_html__( 'White Txt. & Trans. Background, Absolute Position','canteen-essential'),
		  'custom_header' => esc_html__( 'Use Custom Header', 'canteen-essential' ),
		  'no_header' => esc_html__( 'No Header', 'canteen-essential' )
	)
);

canteen_meta_box_dropdown_custom_headers('canteen_header_list',
	esc_html__('Choose Custom Header', 'canteen-essential'),
	'',
	esc_html__('Only if used "Custom Header" format', 'canteen-essential') 
);

canteen_meta_box_dropdown_menu('canteen_header_menu',
	esc_html__('Select Menu', 'canteen-essential'), 
	'',
	esc_html__('You can manage menu using Appearance > Menus', 'canteen-essential')
);
canteen_meta_box_dropdown('canteen_menu_position',
	esc_html__('Select menu position', 'canteen-essential'),
	array('default' => esc_html__('Default', 'canteen-essential'),
		  'right' => esc_html__( 'Right', 'canteen-essential' ),
		  'center' => esc_html__( 'Center', 'canteen-essential' ),
	)
);

canteen_meta_box_dropdown('canteen_header_enable_social',
	esc_html__('Show Social', 'canteen-essential'),
	array('default' => esc_html__('Default', 'canteen-essential'),
		  'on' => esc_html__( 'On', 'canteen-essential' ),
		  'off' => esc_html__( 'Off', 'canteen-essential' ),
	)
);

canteen_meta_box_dropdown('canteen_header_search',
	esc_html__('Show Search icon', 'canteen-essential'),
	array('default' => esc_html__('Default', 'canteen-essential'),
		  'on' => esc_html__( 'On', 'canteen-essential' ),
		  'off' => esc_html__( 'Off', 'canteen-essential' ),
	)
);
canteen_meta_box_dropdown('canteen_header_cart',
	esc_html__('Show Cart', 'canteen-essential'),
	array('default' => esc_html__('Default', 'canteen-essential'),
		  'on' => esc_html__( 'On', 'canteen-essential' ),
		  'off' => esc_html__( 'Off', 'canteen-essential' ),
	)
);
canteen_meta_box_dropdown('canteen_header_btn',
	esc_html__('Show Button', 'canteen-essential'),
	array('default' => esc_html__('Default', 'canteen-essential'),
		  'on' => esc_html__( 'On', 'canteen-essential' ),
		  'off' => esc_html__( 'Off', 'canteen-essential' ),
	)
);

canteen_meta_box_colorpicker( 'heading_color',
	esc_html__( 'Heading color', 'canteen-essential' ) 
);
canteen_meta_box_colorpicker( 'canteen_main_menu',
	esc_html__( 'Main menu color', 'canteen-essential' )
);
canteen_meta_box_colorpicker( 'canteen_main_menu_hover',
	esc_html__( 'Main menu Hover', 'canteen-essential' )
);
canteen_meta_box_colorpicker( 'canteen_stick_menu',
	esc_html__( 'Stick menu', 'canteen-essential' )
);
canteen_meta_box_colorpicker( 'canteen_stick_menu2',
	esc_html__( 'Stick menu 2', 'canteen-essential' )
);
canteen_meta_box_colorpicker( 'canteen_menu_border',
	esc_html__( 'Menu border', 'canteen-essential' )
);


