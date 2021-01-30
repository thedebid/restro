<?php
/**
 * Metabox Class Fill.
 *
 * @package Canteen
 */
?>
<?php
/**
 * Calls the class on the post edit screen.
 */
defined('CANTEEN_ADDONS_ROOT') or define('CANTEEN_ADDONS_ROOT', dirname(__FILE__));
defined('CANTEEN_ADDONS_CUSTOM_POST_TYPE') or define('CANTEEN_ADDONS_CUSTOM_POST_TYPE', dirname(__FILE__).'/custom-post-type');
defined('CANTEEN_ADDONS_ROOT_DIR') or define('CANTEEN_ADDONS_ROOT_DIR', plugins_url().'/canteen-essential');


function Canteen_Meta_Boxes() 
{
    new canteenMetaboxes();
}

	if ( is_admin() ) {
	    add_action( 'load-post.php', 'Canteen_Meta_Boxes' );
	    add_action( 'load-post-new.php', 'Canteen_Meta_Boxes' );
	}


/** 
 * The canteenMetaboxes Class.
 */
class canteenMetaboxes {

	/**
	 * Hook into the appropriate actions when the class is constructed.
	 */
	public function __construct() {
		$this->canteen_metabox_addons();
		add_action( 'add_meta_boxes', array( $this, 'canteen_add_meta_boxs' ) );
		add_action( 'save_post', array( $this, 'canteen_save_meta_box' ) );
		add_action('admin_enqueue_scripts', array($this, 'admin_script_loader'));

		/* Portfolio */
		add_action( 'add_meta_boxes', array( $this, 'canteen_add_meta_boxs_portfolios' ) );
	}

	/**
	 * Adds the meta box functions container.
	 */
	public function canteen_metabox_addons(){
		include('meta-box-maps.php'); 
	}

	/**
	 * Adds the meta box container.
	 */
	public function canteen_add_meta_boxs( $canteen_post_type ) {
		$canteen_post_types = array('post', 'page', 'portfolio');    //limit meta box to certain post types
		$flag = false;
        if ( in_array( $canteen_post_type, $canteen_post_types )){
           	$flag = true;
        }
        if($flag == true){
	        $this->canteen_add_meta_box('canteen_admin_options', 'Canteen '.ucfirst($canteen_post_type).' Settings', $canteen_post_type);
	    }

	}

	public function canteen_add_meta_box($canteen_id, $canteen_label_name, $canteen_post_type)
	{
		add_meta_box(
			$canteen_id
			,$canteen_label_name
			,array( $this, $canteen_id )
			,$canteen_post_type
			
		);
	}

	public function canteen_admin_options()
	{
		global $post;
		if($post->post_type == 'post' || $post->post_type == 'portfolio'){
			$canteen_tabs_title = array('General Settings', 'Header Settings', 'Footer');
			$canteen_tabs_sub_title = array('General configuration settings', 'Header section configuration settings', '', 'Enable/Disable comments in '.$post->post_type, 'Footer section configuration settings', '');
			$canteen_page_tabs = array('General Settings', 'Header Settings', 'Footer');
			$canteen_page_tab_content = array('general','header', 'footer');
		}else{
			$canteen_tabs_title = array('General Settings','Header Settings', 'Footer Settings');
			$canteen_tabs_sub_title = array( 'General configuration settings','Header section configuration settings', '', 'Enable/Disable comments in page', 'Footer section configuration settings');
			$canteen_page_tabs = array( 'General Settings','Header Settings', 'Footer Settings');
			$canteen_page_tab_content = array('general','header','footer');
		}

		$canteen_icon_class = array('icon-gears','fa fa-header', 'el-icon-website', 'fa fa-align-left', 'fa fa-server', 'el-icon-website icon-rotate', 'fa fa-list-alt');
		echo '<ul class="canteen_meta_box_tabs">';
		$canteen_icon = 0;
		$canteen_showicon = '';
			foreach( $canteen_page_tabs as $tab_key => $tab_name ) {
				if($canteen_icon_class){
					$canteen_showicon = '<i class="'.esc_attr($canteen_icon_class[$canteen_icon]).'"></i>';
				}
				echo '<li class="canteen_tab_'.$canteen_page_tab_content[$tab_key].'"><a href="'.esc_url($tab_name).'">'.$canteen_showicon.'<span class="group_title">'.esc_attr($tab_name).'</span></a></li>';
				$canteen_icon++;
			}
		echo '</ul>';

		echo '<div class="canteen_meta_box_tab_content">';
		foreach( $canteen_page_tab_content as $tab_content_key => $tab_content_name ) {
			echo '<div class="canteen_meta_box_tab" id="canteen_tab_'.esc_attr($tab_content_name).'">';
				echo "<div class='main_tab_title'>";
					echo "<h3>".$canteen_tabs_title[$tab_content_key]."</h3>";
					echo "<span class='description'>".$canteen_tabs_sub_title[$tab_content_key]."</span>";
				echo "</div>";
				include('metabox-tabs/metabox_'.$tab_content_name.'.php'); 
			echo '</div>';
		}
		echo '</div>';
		echo '<div class="clear"></div>';
	}


	/**
	 * Adds the meta box for Portfolio.
	 */
	public function canteen_add_meta_boxs_portfolios( $canteen_post_type ) 
	{
		$canteen_post_types = array('portfolio','post');     //limit meta box to certain post types
		$flag = false;
        if ( in_array( $canteen_post_type, $canteen_post_types )){
           	$flag = true;
        }
        if($flag == true){
	        $this->canteen_add_meta_box('canteen_admin_options_single', 'Canteen '.ucfirst($canteen_post_type).' Format Settings', $canteen_post_type);
	    }

	}

	public function canteen_add_meta_boxs_portfolio($canteen_id, $canteen_label_name, $canteen_post_type)
	{
		add_meta_box(
			$canteen_id
			,$canteen_label_name
			,array( $this, $canteen_id )
			,$canteen_post_type
			,'advanced'
			,'high'
		);
	}

	public function canteen_admin_options_single()
	{
        global $post;
		echo '<div class="canteen_meta_box_tab_content_single">';
			echo '<div class="canteen_meta_box_tab" id="canteen_tab_single">';
		
		echo '</div>';
		if($post->post_type == 'portfolio'):
                include('metabox-tabs/metabox_portfolio_setting.php' );
                endif;
		echo '</div>';
		echo '<div class="clear"></div>';
	}

	/**
	 * Save the meta when the post is saved.
	 *
	 * @param int $post_id The ID of the post being saved.
	 */
	public function canteen_save_meta_box( $canteen_post_id ) {
	
		// If this is an autosave, our form has not been submitted,
        // so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return $canteen_post_id;

		/* OK, its safe for us to save the data now. */
		$canteen_data = array();
		foreach ( $_POST as $key => $value ) {
			if ( strstr( $key, 'canteen_') ) {
				// Sanitize the user input.
				$canteen_data = sanitize_text_field( $_POST[$key] );
				// Update the meta field.
				update_post_meta( $canteen_post_id, $key, $canteen_data );
			}
		}
	}

	function admin_script_loader() {
		
		global $pagenow;
		if( is_admin() && ( $pagenow=='post-new.php' || $pagenow=='post.php' ) ) {
			wp_enqueue_script('media-upload'); 
			wp_enqueue_script('thickbox');
	   		wp_enqueue_style('thickbox');
	   		wp_enqueue_style( 'wp-color-picker' );
    		wp_enqueue_script( 'wp-color-picker');
    		wp_register_script('alpha-color-picker', CANTEEN_ADDONS_ROOT_DIR.'/meta-box/js/alpha-color-picker.js', array('jquery', 'wp-color-picker'), '1.0' );
		   	wp_enqueue_script('alpha-color-picker');
		   	wp_register_style('alpha-color-picker', CANTEEN_ADDONS_ROOT_DIR.'/meta-box/css/alpha-color-picker.css', array('wp-color-picker'), '1.0' );
		   	wp_enqueue_style('alpha-color-picker');
	   		wp_register_script('canteen-admin-metabox-cookie-js', CANTEEN_ADDONS_ROOT_DIR.'/meta-box/js/metabox-cookie.js', array('jquery'), '1.0' );
	   		wp_enqueue_script('canteen-admin-metabox-cookie-js');
	   		wp_register_script('canteen-admin-metabox-js', CANTEEN_ADDONS_ROOT_DIR.'/meta-box/js/meta-box.js', array('jquery'), '1.0' );
			wp_enqueue_script('canteen-admin-metabox-js');
	   		wp_register_style('canteen-admin-metabox-css', CANTEEN_ADDONS_ROOT_DIR.'/meta-box/css/meta-box.css',null, '1.0' );
	   		wp_enqueue_style('canteen-admin-metabox-css');
		}
	}
}