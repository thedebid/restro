<?php
/**
 * Metabox For Footer.
 *
 * @package Canteen
 */
?>
<?php 
canteen_meta_box_dropdown('canteen_footer_format',
	esc_html__('Footer Format', 'canteen-essential'),
	array('global' => esc_html__( 'Use Global Settings (in Theme Options)', 'canteen-essential' ),
		  'custom_footer' => esc_html__( 'Use Custom Footer', 'canteen-essential' ),
		  'no_footer' => esc_html__( 'No Footer', 'canteen-essential' )
	)
);

canteen_meta_box_dropdown_custom_footers('canteen_footer_list',
	esc_html__('Choose Custom Footer', 'canteen-essential'),
	'',
	esc_html__('Only if used "Custom Footer" format', 'canteen-essential')
);

canteen_meta_box_colorpicker( 'canteen_footer_color',
	esc_html__( 'Footer color', 'canteen-essential' )
);


