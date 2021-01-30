<?php
/**
 * Metabox Map
 *
 * @package Canteen
 */
?>
<?php
function canteen_meta_box_text($canteen_id, $canteen_label, $canteen_desc = '', $canteen_short_desc = '')
{
	global $post;

	$html = '';
		$html .= '<div class="'.esc_attr($canteen_id).'_box description_box">';
		$html .= '<div class="left-part">';
			$html .= $canteen_label;
			if($canteen_desc) {
				$html .= '<span class="description">' . esc_attr($canteen_desc) . '</span>';
			}
		$html .='</div>';
		$html .= '<div class="right-part">';
			$html .= '<input type="text" id="' . esc_attr($canteen_id) . '" name="' . esc_attr($canteen_id) . '" value="' . get_post_meta($post->ID, $canteen_id, true) . '" />';
			if($canteen_short_desc) {
				$html .= '<span class="short-description">' . esc_attr($canteen_short_desc) . '</span>';
			}
		$html .= '</div>';
		$html .= '</div>';
	echo sprintf("%s",$html);
}

function canteen_meta_box_dropdown($canteen_id, $canteen_label, $canteen_options, $canteen_desc = '')
{
	global $post;

	$html = $canteen_select_class = '';

			$html .= '<div class="'.esc_attr($canteen_id).'_box description_box">';
					$html .= '<div class="left-part">';
							$html .= $canteen_label;
							if($canteen_desc) {
									$html .= '<span class="description">' . esc_attr($canteen_desc) . '</span>';
							}
					$html .='</div>';
					$html .= '<div class="right-part">';
							$html .= '<select id="' . esc_attr($canteen_id) . '" class="'.$canteen_select_class.'" name="' . esc_attr($canteen_id) . '">';
							foreach($canteen_options as $key => $option) {
									if(get_post_meta($post->ID, $canteen_id, true) == (string)$key && get_post_meta($post->ID, $canteen_id, true) != '') {
											$canteen_selected = 'selected="selected"';
									}else {
													$canteen_selected = '';
									}

									$html .= '<option ' . $canteen_selected . ' value="' . esc_attr($key) . '">' . esc_attr($option) . '</option>';

							}
							$html .= '</select>';
					$html .='</div>';	
		$html .= '</div>';
	echo sprintf("%s",$html);
}

function canteen_meta_box_dropdown_sidebar($canteen_id, $canteen_label, $canteen_options, $canteen_desc = '', $canteen_child_hidden = '')
{
	global $post;

	$html = $canteen_select_class = '';
	$flag = false;
		$canteen_child_hidden = ( $canteen_child_hidden ) ? ' hide-child '.$canteen_child_hidden : '';
		$html .= '<div class="'.esc_attr($canteen_id).'_box description_box'.$canteen_child_hidden.'">';
			$html .= '<div class="left-part">';
				$html .= $canteen_label;
				if($canteen_desc) {
					$html .= '<span class="description">' . esc_attr($canteen_desc) . '</span>';
				}
			$html .='</div>';
			$html .= '<div class="right-part">';
				$html .= '<select id="' . esc_attr($canteen_id) . '" class="'.esc_attr($canteen_select_class).'" name="' . esc_attr($canteen_id) . '">';
				foreach($canteen_options as $key => $option) {
					if(get_post_meta($post->ID, $canteen_id, true) == $key && get_post_meta($post->ID, $canteen_id, true) != '') {
						$canteen_selected = 'selected="selected"';
					}else {
							$canteen_selected = '';
					}

					$html .= '<option ' . $canteen_selected . ' value="' . esc_attr($key) . '">' . esc_attr($option) . '</option>';

				}
				$html .= '</select>';
			$html .='</div>';	
		$html .= '</div>';
	echo sprintf("%s",$html);
}

/* menu dropdown */

function canteen_meta_box_dropdown_menu($canteen_id, $canteen_label, $canteen_options, $canteen_desc = '')
{
	global $post;

	$html = $canteen_select_class = '';
	$flag = false;

	
		$html .= '<div class="'.esc_attr($canteen_id).'_box description_box">';
			$html .= '<div class="left-part">';
				$html .= $canteen_label;
				if($canteen_desc) {
					$html .= '<span class="description">' . esc_attr($canteen_desc) . '</span>';
				}
			$html .='</div>';
			$html .= '<div class="right-part">';
				$html .= '<select id="' . esc_attr($canteen_id) . '" class="'.esc_attr($canteen_select_class).'" name="' . esc_attr($canteen_id) . '">';
				$html .= '<option value="">Default</option>';
				$canteen_menus = wp_get_nav_menus();
				$canteen_menu_array = array();
				foreach ($canteen_menus as $key => $value) {
					if(get_post_meta($post->ID, $canteen_id, true) == $value->slug && get_post_meta($post->ID, $canteen_id, true) != '') {
						$canteen_selected = 'selected="selected"';
					}else {
							$canteen_selected = ''; 
					}

					$html .= '<option ' . $canteen_selected . ' value="' . esc_attr($value->slug) . '">' . esc_attr($value->name) . '</option>';
				}
				$html .= '</select>';
			$html .='</div>';	
		$html .= '</div>';
	echo sprintf("%s",$html);
}

function canteen_meta_box_dropdown_custom_headers($canteen_id, $canteen_label, $canteen_options, $canteen_desc = '')
{
	global $post;

	$html = $canteen_select_class = '';
	$flag = false;

	
		$html .= '<div class="'.esc_attr($canteen_id).'_box description_box">';
			$html .= '<div class="left-part">';
				$html .= $canteen_label;
				if($canteen_desc) {
					$html .= '<span class="description">' . esc_attr($canteen_desc) . '</span>';
				}
			$html .='</div>';
			$html .= '<div class="right-part">';
				$html .= '<select id="' . esc_attr($canteen_id) . '" class="'.esc_attr($canteen_select_class).'" name="' . esc_attr($canteen_id) . '">';
				$html .= '<option value="">Default</option>';
				$canteen_custom_headers = new WP_Query( array( 'post_type' => 'header' ) );
				$posts = $canteen_custom_headers->posts; 
				foreach ($posts as $key => $value) {
					if(get_post_meta($post->ID, $canteen_id, true) == $value->ID && get_post_meta($post->ID, $canteen_id, true) != '') {
						$canteen_selected = 'selected="selected"';
					}else {
							$canteen_selected = '';
					}

					$html .= '<option ' . $canteen_selected . ' value="' . esc_attr($value->ID) . '">' . esc_attr($value->post_name) . '</option>';
				}
				$html .= '</select>';
			$html .='</div>';	
		$html .= '</div>';
	echo sprintf("%s",$html);
}

function canteen_meta_box_dropdown_custom_footers($canteen_id, $canteen_label, $canteen_options, $canteen_desc = '')
{
	global $post;

	$html = $canteen_select_class = '';
	$flag = false;

	
		$html .= '<div class="'.esc_attr($canteen_id).'_box description_box">';
			$html .= '<div class="left-part">';
				$html .= $canteen_label;
				if($canteen_desc) {
					$html .= '<span class="description">' . esc_attr($canteen_desc) . '</span>';
				}
			$html .='</div>';
			$html .= '<div class="right-part">';
				$html .= '<select id="' . esc_attr($canteen_id) . '" class="'.esc_attr($canteen_select_class).'" name="' . esc_attr($canteen_id) . '">';
				$html .= '<option value="">Default</option>';
				$canteen_custom_footers = new WP_Query( array( 'post_type' => 'footer' ) );
				$posts = $canteen_custom_footers->posts; 
				foreach ($posts as $key => $value) {
					if(get_post_meta($post->ID, $canteen_id, true) == $value->ID && get_post_meta($post->ID, $canteen_id, true) != '') {
						$canteen_selected = 'selected="selected"'; 
					}else {
							$canteen_selected = '';
					}

					$html .= '<option ' . $canteen_selected . ' value="' . esc_attr($value->ID) . '">' . esc_attr($value->post_name) . '</option>';
				}
				$html .= '</select>';
			$html .='</div>';	
		$html .= '</div>';
	echo sprintf("%s",$html);
}

function canteen_meta_box_textarea($canteen_id, $canteen_label, $canteen_desc = '', $canteen_default = '' )
{
	global $post;
	$html = '';
	$html .= '<div class="'.esc_attr($canteen_id).'_box description_box">';
	$html .= '<div class="left-part">';
		$html .= $canteen_label;
		if($canteen_desc) {
			$html .= '<span class="description">' . esc_attr($canteen_desc) . '</span>';
		}
	$html .='</div>';
	
	if( get_post_meta($post->ID, $canteen_id, true)) {
		$canteen_value = get_post_meta($post->ID, $canteen_id, true);
	} else {
		$canteen_value = '';
	}
	$html .= '<div class="right-part">';
		$html .= '<textarea cols="120" id="' . esc_attr($canteen_id) . '" name="' . esc_attr($canteen_id) . '">' . esc_attr($canteen_value) . '</textarea>';
	$html .='</div>';
	$html .= '</div>';

	echo sprintf("%s",$html);
}

function canteen_meta_box_upload($canteen_id, $canteen_label, $canteen_desc = '')
{
	global $post;

	$html = '';
	$html .= '<div class="'.esc_attr($canteen_id).'_box description_box">';
	$html .= '<div class="left-part">';
		$html .= $canteen_label;
		if($canteen_desc) {
			$html .= '<span class="description">' . esc_attr($canteen_desc) . '</span>';
		}
	$html .='</div>';
	$html .= '<div class="right-part">';
		$html .= '<input name="' . esc_attr($canteen_id) . '" class="upload_field" id="canteen_upload" type="text" value="' . get_post_meta($post->ID,  $canteen_id, true) . '" />';
		$html .= '<input name="'. $canteen_id.'_thumb" class="'. $canteen_id.'_thumb" id="'. $canteen_id.'_thumb" type="hidden" value="'.get_post_meta($post->ID,  $canteen_id, true).'" />';
				$html .= '<img class="upload_image_screenshort" src="'.get_post_meta($post->ID,  $canteen_id, true).'" />';
		$html .= '<input class="canteen_upload_button" id="canteen_upload_button" type="button" value="'.__( 'Browse', 'canteen-essential' ).'" />';
		$html .= '<span class="canteen_remove_button button">'.__( 'Remove', 'canteen-essential' ).'</span>';
				
	$html .='</div>';
	$html .= '</div>';
	echo sprintf("%s",$html);
}

function canteen_meta_box_upload_multiple($canteen_id, $canteen_label, $canteen_desc = '')
{
	global $post;

	$html = '';
	$html .= '<div class="'.esc_attr($canteen_id).'_box description_box">';
		$html .= '<div class="left-part">';
			$html .= $canteen_label;
			if($canteen_desc) {
				$html .= '<span class="description">' . esc_attr($canteen_desc) . '</span>';
			}
		$html .='</div>';
		$html .= '<div class="right-part">';
		
			$html .= '<input name="' . esc_attr($canteen_id) . '" class="upload_field" id="canteen_upload" type="hidden" value="'.get_post_meta($post->ID,  $canteen_id, true).'" />';
			$html .= '<div class="multiple_images">';
			$canteen_val = explode(",",get_post_meta($post->ID,  $canteen_id, true));
			
			foreach ($canteen_val as $key => $value) {
				if(!empty($value)):
					$canteen_image_url = wp_get_attachment_url( $value );
					$html .='<div id='.esc_attr($value).'>';
						$html .= '<img class="upload_image_screenshort_multiple" src="'.$canteen_image_url.'" style="width:100px;" />';
						$html .= '<a href="javascript:void(0)" class="remove">'.__( 'Remove', 'canteen-essential' ).'</a>';
					$html .= '</div>';
				endif;
			}
			$html .= '</div>';
			$html .= '<input class="canteen_upload_button_multiple" id="canteen_upload_button_multiple" type="button" value="Browse" />'.__( ' Select Files', 'canteen-essential' );
					
		$html .='</div>';
	$html .= '</div>';
	echo sprintf( "%s", $html );
}

	if ( ! function_exists( 'canteen_meta_box_colorpicker' ) ) {
		function canteen_meta_box_colorpicker( $id, $label, $desc = '', $canteen_dependency = '' ) {
			global $post;
	        
			$dependency_attr = '';
			$dependency_arr = array();

			if( !empty($canteen_dependency) ){
				$val = array();
				$dependency_arr[] = 'data-element="'.$canteen_dependency['element'].'"';
				foreach ($canteen_dependency['value'] as $key => $value) {
					$val[] = $value; 
				}
				$dep_list = implode(",", $val);
				$dependency_arr[] = 'data-value="'.$dep_list.'"';
				$dependency_attr = implode(" ", $dependency_arr);
			}

			$html = '';
			$html .= '<div class="'.$id.'_box description_box"'.$dependency_attr.'>';
				$html .= '<div class="left-part">';
					$html .= $label;
					if($desc) {
						$html .= '<span class="description">' . $desc . '</span>';
					}
				$html .='</div>';
				$html .= '<div class="right-part">';
					$html .= '<input type="text" class="canteen-color-picker" id="' . $id . '" name="' . $id . '" value="' . get_post_meta($post->ID, $id, true) . '" />';
				$html .='</div>';
			$html .='</div>';
			echo $html;
		}
	}