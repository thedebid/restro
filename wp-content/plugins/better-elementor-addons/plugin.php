<?php
namespace BetterWidgets;

/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.0.0
 */
class Plugin {

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * widget_scripts
	 *
	 * Load required plugin core files. 
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function widget_scripts() {
		
		wp_register_script( 'better-countdown', plugins_url( '/assets/js/jquery.countdown.min.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'better-slick', plugins_url( '/assets/js/slick.min.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'better-testimonial', plugins_url( '/assets/js/testimonial.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'better-portfolio', plugins_url( '/assets/js/portfolio.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'better-portfolio-full', plugins_url( '/assets/js/portfolio-full.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'jquery.event.move', plugins_url( '/assets/js/jquery.event.move.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'jquery.twentytwenty', plugins_url( '/assets/js/jquery.twentytwenty.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'imageLoaded', plugins_url( '/assets/js/imageLoaded.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'swiper', plugins_url( '/assets/js/swiper.min.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'better-lib', plugins_url( '/assets/js/plugins.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'better-widgets', plugins_url( '/assets/js/scripts.js', __FILE__ ), [ 'jquery' ], false, true );
	} 


	public function widget_styles() {
		wp_enqueue_style( 'better-poppins', '//fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap', array(), '20451215' );
		wp_enqueue_style( 'fontawesome', plugin_dir_url( __FILE__ ) .'/assets/css/fontawesome.min.css', array(), '20200508');
		wp_enqueue_style( 'bootstrap', plugin_dir_url( __FILE__ ) .'/assets/css/bootstrap.min.css', array(), '20200508');
		wp_enqueue_style( 'twentytwenty', plugin_dir_url( __FILE__ ) .'/assets/css/twentytwenty.css', array(), '20200508');
		wp_enqueue_style( 'better-style', plugin_dir_url( __FILE__ ) .'/assets/style.css', array(), '20200508');
	}

	/**
	 * Include Widgets files 
	 *
	 * Load widgets files
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private function include_widgets_files() {
		require_once( __DIR__ . '/widgets/image-box/image-box.php' );
		// require_once( __DIR__ . '/widgets/better-icon-box.php' );
		require_once( __DIR__ . '/widgets/better-price.php' );
		require_once( __DIR__ . '/widgets/better-team.php' );
		require_once( __DIR__ . '/widgets/better-testimonial.php' );
		require_once( __DIR__ . '/widgets/better-heading.php' );
		require_once( __DIR__ . '/widgets/better-countdown.php' );
		require_once( __DIR__ . '/widgets/testimonial/better-testimonial-carousel.php' );
		require_once( __DIR__ . '/widgets/better-featured.php' );
		require_once( __DIR__ . '/widgets/better-portfolio.php' );
		require_once( __DIR__ . '/widgets/better-comparison.php' );
		require_once( __DIR__ . '/widgets/better-menu-list.php' );
		require_once( __DIR__ . '/widgets/blog/blog.php' );
		require_once( __DIR__ . '/widgets/post/post-title.php' );
		require_once( __DIR__ . '/widgets/post/post-author.php' );
		require_once( __DIR__ . '/widgets/post/post-comments.php' );
		require_once( __DIR__ . '/widgets/post/post-featured-image.php' );
		require_once( __DIR__ . '/widgets/post/post-date.php' );
		//require_once( __DIR__ . '/widgets/list-holder.php' );
		require_once( __DIR__ . '/widgets/slider/slider.php' );
		require_once( __DIR__ . '/widgets/fancy/fancy.php' );
		require_once( __DIR__ . '/widgets/info-box/info-box.php' );







	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function register_widgets() {
		// Its is now safe to include Widgets files 
		$this->include_widgets_files();

		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Better_Heading() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Better_Team() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Better_Image_Box() );
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Better_Icon_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Better_Price() );		
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Better_Testimonial() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Better_Count_Down() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Better_Testimonial_Carousel() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Better_Featured() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Better_Portfolio() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Better_Comparison() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Better_Menu_List() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Better_Blog() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Better_Post_Title() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Better_Post_Author() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Better_Post_comments() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Better_Post_Featured_Image() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Better_Post_Date() );
		//\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Better_List_Holder() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Better_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Better_Fancy() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Better_Infobox() );








	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.0.0
	 * @access public
	 */


	public function __construct() {

		// Register widget scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );

		// Register Widget Styles
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );

		// Register widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
	}
}

// Instantiate Plugin Class
Plugin::instance();



