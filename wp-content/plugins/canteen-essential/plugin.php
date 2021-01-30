<?php
namespace CanteenPlugin;

use CanteenPlugin\Widgets\Dsc_Slider;
use CanteenPlugin\Widgets\Canteen_Logo;
use CanteenPlugin\Widgets\Canteen_Menu;
use CanteenPlugin\Widgets\Canteen_Portfolio;
use CanteenPlugin\Widgets\Canteen_Product;
use CanteenPlugin\Widgets\Canteen_Title;
use CanteenPlugin\Widgets\Canteen_Countdown;
use CanteenPlugin\Widgets\Canteen_Team_one;
use CanteenPlugin\Widgets\Canteen_Team;
use CanteenPlugin\Widgets\Canteen_Testimonial;
use CanteenPlugin\Widgets\Canteen_TextIcon;
use CanteenPlugin\Widgets\Canteen_ImageBox;
use CanteenPlugin\Widgets\Canteen_WorkProcess;
use CanteenPlugin\Widgets\Canteen_ImageBoxSlider;
use CanteenPlugin\Widgets\Canteen_ImageComparisonSlider;
use CanteenPlugin\Widgets\Canteen_Featured;
// use CanteenPlugin\Widgets\Canteen_Flip_Box;
use CanteenPlugin\Widgets\Canteen_Post;
use CanteenPlugin\Widgets\Canteen_Post_Two;
use CanteenPlugin\Widgets\Canteen_Post_Three;
use CanteenPlugin\Widgets\Canteen_Contact;




if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Main Plugin Class
 *
 * Register new elementor widget.
 *
 * @since 1.0.0
 */
class CanteenPlugin {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		$this->add_actions();
	}

	/**
	 * Add Actions
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function add_actions() {
		//register all script 
		add_action( 'elementor/widgets/widgets_registered',[ $this, 'on_widgets_registered' ] );
		//isotope script
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('jquery-isotope',CANTEEN_URL .'widgets/js/isotope.pkgd.js', array('jquery'), null, true  );} );
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('canteen-portfolio',CANTEEN_URL .'widgets/js/portfolio.js', array('jquery'), null, true  );} );
		//blog masonry script
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('canteen-blog-masonry',CANTEEN_URL .'widgets/js/blog-mason.js', array('jquery'), null, true  );} );
		//slider script
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('jquery-slick',CANTEEN_URL .'widgets/js/slick.min.js.js', array('jquery'), null, true  );} );
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('canteen-animation',CANTEEN_URL .'widgets/js/slick-animation.js', array('jquery'), null, true  );} );
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('canteen-slider-script',CANTEEN_URL .'widgets/js/slider.js', array('jquery'), null, true  );} );
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('canteen-imgbox-slider',CANTEEN_URL .'widgets/js/imgbox-slider.js', array('jquery'), null, true  );} );
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('canteen-image-comparison-slider',CANTEEN_URL .'widgets/js/image-comparison-slider.js', array('jquery'), null, true  );} );
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('canteen-work-process',CANTEEN_URL .'widgets/js/work-process.js', array('jquery'), null, true  );} );
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('canteen-blog-slider-script',CANTEEN_URL .'widgets/js/blog-slider.js', array('jquery'), null, true  );} );
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('prefixfree',CANTEEN_URL .'widgets/js/prefixfree.min.js', array('jquery'), null, true  );} );
		//gallery popup
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('jquery-magnificpopup',CANTEEN_URL .'widgets/js/jquery.magnific-popup.min.js', array('jquery'), null, true  );} );
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('canteen-gallery-popup',CANTEEN_URL .'widgets/js/popup-gallery.js', array('jquery'), null, true  );} );
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('canteen-blog-script',CANTEEN_URL .'widgets/js/blog.js', array('jquery'), null, true  );} );
		
		//gallery  masonry
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('canteen-masonry-gallery',CANTEEN_URL .'widgets/js/mason-gallery.js', array('jquery'), null, true  );} );
		
		//share script
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('canteen-share',CANTEEN_URL .'widgets/js/share.js', array('jquery'), null, true  );} );
		
		//testmonial
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('canteen-testimonial',CANTEEN_URL .'widgets/js/testimonial.js', array('jquery'), null, true  );} );

		add_action( 'wp_enqueue_scripts', function() {wp_enqueue_style('canteen-plugin-style', CANTEEN_URL . 'widgets/css/style.css', array(), '1.0.0', 'all');} );
          // Slick responsive
		// add_action( 'wp_enqueue_scripts', function() {wp_enqueue_script( 'slick-slider-core' ); wp_enqueue_style( 'slick-slider-core-theme' );}, 11 );
		// add_action( 'wp_enqueue_scripts', function() {wp_deregister_script( 'slick-slider-core' ); wp_deregister_style( 'slick-slider-core-theme' );} , 11); 

		
		// //Styles
		// add_action( 'elementor/frontend/after_enqueue_styles', function() {  wp_enqueue_style('canteen-style-addons',CANTEEN_URL .'assets/css/style-addons.css', array(), null, 'all'  );} );
		// //Styles
		// add_action( 'elementor/frontend/after_enqueue_styles', function() {  wp_enqueue_style('canteen-frontend',CANTEEN_URL .'assets/css/frontend.css', array(), null, 'all'  );} ); 
		
	}

	/**
	 * On Widgets Registered
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function on_widgets_registered() {
		$this->includes();
		$this->register_widget();
	}

	/**
	 * Includes
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function includes() {
		require __DIR__ . '/widgets/dsc-slider.php';
		require __DIR__ . '/widgets/logo.php';
		require __DIR__ . '/widgets/menu.php';
		require __DIR__ . '/widgets/portfolio.php';
		require __DIR__ . '/widgets/product.php';
		require __DIR__ . '/widgets/title.php';
		require __DIR__ . '/widgets/countdown.php';
		require __DIR__ . '/widgets/team-one.php';
		require __DIR__ . '/widgets/team.php';
		require __DIR__ . '/widgets/testimonial.php';
		require __DIR__ . '/widgets/text-icon.php';
		require __DIR__ . '/widgets/image-box.php';
		require __DIR__ . '/widgets/work-process.php';
		require __DIR__ . '/widgets/imagebox-slider.php';
		require __DIR__ . '/widgets/image-comparison-slider.php';
		require __DIR__ . '/widgets/featured.php';
		require __DIR__ . '/widgets/post-one.php';
		require __DIR__ . '/widgets/post-two.php';
		require __DIR__ . '/widgets/post-three.php';
		require __DIR__ . '/widgets/contact.php';
		
	}
	

	/**
	 * Register Widget
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function register_widget() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Dsc_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Canteen_Logo() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Canteen_Menu() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Canteen_Portfolio() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Canteen_Product() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Canteen_Title() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Canteen_Countdown() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Canteen_Team_One() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Canteen_Team() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Canteen_Testimonial() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Canteen_TextIcon() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Canteen_ImageBox() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Canteen_WorkProcess() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Canteen_ImageBoxSlider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Canteen_ImageComparisonSlider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Canteen_Featured() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Canteen_Post() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Canteen_Post_two() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Canteen_Post_three() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Canteen_Contact() );

		
	}
}

new CanteenPlugin();



