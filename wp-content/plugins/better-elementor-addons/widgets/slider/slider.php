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
 * @since 1.0.1
 */
class Better_Slider extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.1
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'better-slider';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.1
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Better Slider', 'better_plg' );
	}

	//script depend
	public function get_script_depends() { return [ 'swiper','better-lib','better-widgets']; }

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.1
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
	 * @since 1.0.1
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
	 * @since 1.0.1
	 *
	 * @access protected
	 */
	protected function _register_controls() {
	
		
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Slider Settings', 'better-widgets' ),
			]
		);
		
		$this->add_control(
			'better_slider_style',
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
			'slider_list',
			[
				'label' => __( 'Slider List', 'better-widgets' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'title' => __( 'Slider Heading Title', 'better-widgets' ),
						'subtitle' => __( 'Slider subtitle', 'better-widgets' ),
						'text' => __( 'Slider text', 'better-widgets' ),
					],
					[
						'title' => __( 'Slider Heading Title', 'better-widgets' ),
						'subtitle' => __( 'Slider subtitle', 'better-widgets' ),
						'text' => __( 'Slider text', 'better-widgets' ),
					],
					[
						'title' => __( 'Slider Heading Title', 'better-widgets' ),
						'subtitle' => __( 'Slider subtitle', 'better-widgets' ),
						'text' => __( 'Slider text', 'better-widgets' ),
					],
				],
				'fields' => [
					[
						'name' => 'title',
						'label' => __( 'Slider Heading Title', 'better-widgets' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => __( 'Insert your slider heading title here..', 'better-widgets' ),
						'default' => __( 'Slider Heading Title' ,  'better-widgets'  ),
					],
					[
						'name' => 'subtitle',
						'label' => __( 'Slider Subtitle', 'better-widgets' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => __( 'Insert your slider subtitle here..', 'better-widgets' ),
						'default' => __( 'Slider Subtitle' ,  'better-widgets'  ),
					],
					[
						'name' => 'text',
						'label' => __( 'Slider Text', 'better-widgets' ),
						'type' => Controls_Manager::TEXTAREA,
						'label_block' => true,
						'default' => __( 'Slider Text' ,  'better-widgets' ),
					],
					[
						'name' => 'btn_text',
						'label' => __( 'Button Text', 'better-widgets' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
					],
					[
						'name' => 'btn_link',
						'label' => __( 'Button Link', 'better-widgets' ),
						'type' => Controls_Manager::URL,
						'label_block' => true,
						'placeholder' => __( 'Leave it blank if you don\'t need this button', 'better-widgets' ),
					],

					[
						'name' => 'image',
						'label' => __( 'Slider Image', 'better-widgets' ),
						'type' => Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
					],

				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->add_control(
            'bg_image',
            [
                'label' => __( 'BG Image', 'better-widgets' ),
                'type' => Controls_Manager::MEDIA,
				'condition' => [
					'better_slider_style' => array('1')
				],
            ]
        );
		$this->add_control(
			'slider_mask',
			[
				'label' => __( 'Slider Mask', 'avo_plg' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 5,
				
			]
		);

        $this->add_control( 
        	'show_paging',
            [
                'label' => esc_html__( 'Show Paging', 'better-widgets' ),
                'type' => Controls_Manager::SWITCHER,
				'condition' => [
					'better_slider_style' => array('1')
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

		// Title Typography 
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'better_slider_title_typography',
				'label' => esc_html__( 'Title Typography', 'better-widgets' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .custom-font',
			]
		);
		// Main Color
		$this->add_control(
			'better_slider_color',
			[
				'label' => esc_html__( 'Color', 'better-widgets' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
				'type' => \Elementor\Scheme_Color::get_type(),
				'value' => \Elementor\Scheme_Color::COLOR_1,
			],
				'selectors' => [
				'{{WRAPPER}} .better-slider-1 .cta__slider-item .caption .thin' => 'color: {{VALUE}}',
				'{{WRAPPER}} .better-widgets .btn-curve.btn-color:hover span' => 'color: {{VALUE}}',
				'{{WRAPPER}} .better-widgets .btn-curve.btn-color' => 'background-color: {{VALUE}}',
				'{{WRAPPER}} .better-widgets .btn-curve.btn-color' => 'border-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'better_slider_bgcolor',
			[
				'label' => esc_html__( 'Backgrond Color', 'better-widgets' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
				'type' => \Elementor\Scheme_Color::get_type(),
				'value' => \Elementor\Scheme_Color::COLOR_1,
			],
				'selectors' => [
				'{{WRAPPER}} .better-slider-1 .slid-half .nofull' => 'background-color: {{VALUE}}',
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
	 * @since 1.0.1
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings(); 
		$show_paging = $settings['show_paging'] ? 'show' : '';
		$style = $settings['better_slider_style'];	
		require( 'styles/style'.$style.'.php' );
 
		}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.1
	 *
	 * @access protected
	 */
	protected function _content_template() {
		
		
	}
}


