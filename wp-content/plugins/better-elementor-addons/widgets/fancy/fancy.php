<?php
namespace BetterWidgets\Widgets;

use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Core\Schemes;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly  


		
/**
 * @since 1.0.8
 */
class Better_Fancy extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.8
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'better-fancy';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.8
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Better Fancy', 'better_plg' );
	}

	//script depend
	public function get_script_depends() { return [ 'swiper','better-lib','better-widgets']; }

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.8
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-slideshow';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.8
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'better-category' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.8
	 *
	 * @access protected
	 */
	protected function _register_controls() {
	
		
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Fancy Settings', 'better-widgets' ),
			]
		);
		
		$this->add_control(
			'better_fancy_style',
			[
				'label' => __( 'Style', 'better-widgets' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'1' => __( 'Style 1', 'better-widgets' ),
				],
				'default' => '1',
			]
		);
		$this->add_control(
            'bg_image',
            [
                'label' => __( 'Bg Image', 'better-widgets' ),
                'type' => Controls_Manager::MEDIA,
				'default' => [
							'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'better_fancy_style' => array('1')
				],
            ]
        );
		$this->add_control(
            't_image',
            [
                'label' => __( 'Top Image', 'better-widgets' ),
                'type' => Controls_Manager::MEDIA,
				'default' => [
							'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'better_fancy_style' => array('1')
				],
            ]
        );
		$this->add_control(
            'b_image',
            [
                'label' => __( 'Bottom Image', 'better-widgets' ),
                'type' => Controls_Manager::MEDIA,
				'default' => [
							'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'better_fancy_style' => array('1')
				],
            ]
        );
		$this->add_control(
			'title',
			[
				'label' => __( 'Title','better-widgets' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => 'Insert your title..',
				'default' => 'Title here',
				'condition' => [
					'better_fancy_style' => array('1')
				],

			]
		);
		
		$this->add_control(
			'subtitle',
			[
				'label' => __( 'Subtitle','better-widgets' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => 'Leave it blank if you don\'t want to use this subtitle',
				'default' => 'Sub-title here',
				'condition' => [
					'better_fancy_style' => array('1')
				],
			]
		);

		
		
		$this->end_controls_section();


		// start of the Style tab section
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Content Style', 'better-widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		// Main Color
		$this->add_control(
			'better_fancy_color',
			[
				'label' => esc_html__( 'Color', 'better-widgets' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
				'type' => \Elementor\Scheme_Color::get_type(),
				'value' => \Elementor\Scheme_Color::COLOR_1,
			],
				'selectors' => [
				'{{WRAPPER}} .better-fancy-1 .ab-exp .years-exp' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
		// end of the Content tab section
		
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.8
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings(); 
		$style = $settings['better_fancy_style'];	
		require( 'styles/style'.$style.'.php' );
 
		}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.8
	 *
	 * @access protected
	 */
	protected function _content_template() {
		
		
	}
}


