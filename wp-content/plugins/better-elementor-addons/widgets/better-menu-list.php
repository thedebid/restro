<?php
namespace BetterWidgets\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


		
/**
 * @since 1.0.1
 */
class Better_Menu_List extends Widget_Base {

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
		return 'better-menu-list';
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
		return __( 'Better Menu List', 'better_plg' );
	}

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
		return 'eicon-blockquote';
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
				'label' => __( 'Menu list Settings', 'better_plg' ),
			]
		);
		
		
	
		$this->add_control(
			'menu_menu_list',
			[
				'label' => __( 'Menu List', 'better_plg' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'title' => 'Title',
						'price' => '5$',
						'description' => 'Description',
					],
					[
						'title' => 'Title',
						'price' => '5$',
						'description' => 'Description',
					],
					[
						'title' => 'Title',
						'price' => '5$',
						'description' => 'Description',
					],
				],
				'fields' => [
					[
						'name' => 'title',
						'label' => __( 'Title', 'better_plg' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => __( 'Title', 'better_plg' ),
					],
					
					[
						'name' => 'price',
						'label' => __( 'Price', 'better_plg' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => __( 'Price', 'better_plg' ),
					],
					[
						'name' => 'image',
						'label' => __( 'Client Image', 'better_plg' ),
						'type' => Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
					],
					[
						'name' => 'description',
						'label' => __( 'Description', 'better_plg' ),
						'type' => Controls_Manager::TEXTAREA,
						'label_block' => true,
						'placeholder' => __( 'Testimonial Text..', 'better_plg' ),
					],
				],
				'title_field' => '{{ title }}',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'block_settting',
			[
				'label' => __( 'Text Setting','better_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control(
			'block_content',
			[
				'label' => __( 'Block Margin', 'canteen-essential' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .better.menu-list .menu-block' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'title_settting',
			[
				'label' => __( 'Text Setting','better_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'better_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .better.menu-list .menu-block .item-inner h3.list-title' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'title_typography',
				'label'     => __( 'Typography', 'better_plg' ),
				'selector'  => '{{WRAPPER}} .better.menu-list .menu-block .item-inner h3.list-title',
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'price_settings',
			[
				'label' => __( 'Price Setting','better_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'price_color',
			[
				'label' => __( 'Color', 'better_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .better.menu-list .menu-block .item-inner h3.list-price' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'name_typography',
				'label'     => __( 'Name Typography', 'better_plg' ),
				'selector'  => '{{WRAPPER}} .better.menu-list .menu-block .item-inner h3.list-price',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'desc_settting',
			[
				'label' => __( 'Description Setting','better_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'post_color',
			[
				'label' => __( 'Color', 'better_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .better.menu-list .menu-block .item-inner p' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'post_typography',
				'label'     => __( 'Typography', 'better_plg' ),
				'selector'  => '{{WRAPPER}} .better.menu-list .menu-block .item-inner p',
			]
		);
		
		$this->end_controls_section();
	
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
		$settings = $this->get_settings(); ?>
		
		
            <div class="better menu-list">
                <?php foreach ( $settings['menu_menu_list'] as $index => $item ) : 
                ?>
                <div class="menu-block">
                    <div class="item-thumb">
						<img src="<?php echo esc_url ( $item['image']['url']); ?>" alt="img">
					</div>
                	
                	<div class="item-inner">
                		<div class="info clearfix">
                    		<h3 class="list-title pull-left"><?php echo  $item['title']; ?></h3>
                    		<h3 class="list-price pull-right"><?php echo  $item['price']; ?></h3>
                    	</div>
	               		<div class="list-desk">
	               			<p ><?php echo  $item['description']; ?></p>
	               		</div>
               		</div>
                </div>
                
                <?php endforeach; ?>
            </div><!--/.testimonial-->
	
		
	<?php  
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


