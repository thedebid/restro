<?php
/**
 * Metabox For Portfolio Setting.
 *
 * @package canteen
 */
?>
<?php 
canteen_meta_box_dropdown('canteen_port_format',
				esc_html__('Choose Portfolio Format Here', 'canteen-essential'),
				array('port_standard' => esc_html__('Portfolio Gallery at Top', 'canteen-essential'),
					  'port_two' => esc_html__('Portfolio Gallery at Right', 'canteen-essential'),
					 )
			);
canteen_meta_box_dropdown('canteen_top_type',
				esc_html__('Choose Portfolio Format Here', 'canteen-essential'),
				array('top_content_slider' => esc_html__('Images Background', 'canteen-essential'),
					  'top_content_video' => esc_html__('Video Background', 'canteen-essential'),
					  'top_content_youtube' => esc_html__('Youtube Background', 'canteen-essential'),
					 )
			);
canteen_meta_box_upload('canteen_port_slider_setting', 
				esc_html__('Portfolio Top Image', 'canteen-essential'),
				esc_html__('Upload Your Top Image here. <br/>You still need to fill this if you choose the video/youtube background. <br/>
		So the image will replace the video/youtube background in touch devices. ', 'canteen-essential')
			);

canteen_meta_box_text('canteen_port_youtube_link',
				esc_html__('Youtube ID', 'canteen-essential'),
				esc_html__('Insert Youtube ID here. e.g EMy5krGcoOU', 'canteen-essential')
			);
canteen_meta_box_text('canteen_port_youtube_quality',
				esc_html__('Youtube Quality', 'canteen-essential'),
				esc_html__('Insert Youtube video quality here. You can input <b>small, medium, large, hd720, hd1080, highres</b>. Default value is <b>large</b>', 'canteen-essential')
			);
canteen_meta_box_text('canteen_port_video_link',
				esc_html__('Video Link', 'canteen-essential'),
				esc_html__('Insert the video directlink here. eg. https://www.quirksmode.org/html5/videos/big_buck_bunny.mp4', 'canteen-essential')
			);
canteen_meta_box_upload('canteen_gallery_port_img', 
				esc_html__('Portfolio Side Image', 'canteen-essential'),
				esc_html__('Upload Your Side Image here.', 'canteen-essential')
			);


