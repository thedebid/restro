<?php
/**
 * Metabox For General.
 *
 * @package Canteen 
 */
?>
<?php 

canteen_meta_box_dropdown('canteen_sidebar_format', 
	esc_html__('Sidebar Format', 'canteen-essential'),
	array('default' => esc_html__( 'Use Global Settings (in Theme Options)', 'canteen-essential' ),
		  'right_sidebar' => esc_html__( 'Right Sidebar', 'canteen-essential' ),
		  'left_sidebar' => esc_html__( 'Left Sidebar','canteen-essential'),
		  'no_sidebar' => esc_html__( 'No Sidebar', 'canteen-essential' )
	)
);


canteen_meta_box_colorpicker( 'canteen_color_general',
	esc_html__( 'General scheme color ', 'canteen-essential' )
); 

canteen_meta_box_colorpicker( 'canteen_custom_hovers',
	esc_html__( 'Custom hovers', 'canteen-essential' )
);

canteen_meta_box_colorpicker( 'canteen_color_scheme',
	esc_html__( 'Color scheme', 'canteen-essential' )
);
canteen_meta_box_colorpicker( 'general_color',
	esc_html__( 'General color', 'canteen-essential' )
);

