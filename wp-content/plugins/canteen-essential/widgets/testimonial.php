<?php
namespace CanteenPlugin\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


		
/**
 * @since 1.0.0
 */
class Canteen_Testimonial extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'canteen-testimonial';
	}
		//script depend
	public function get_script_depends() { return [ 'jquery-slick','canteen-testimonial' ]; }

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Canteen Testimonial', 'canteen-essential' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
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
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'canteen-elements' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
	
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Testimonial Settings', 'canteen-essential' ),
			]
		);
		
		
	
		$this->add_control(
			'testi_list',
			[
				'label' => __( 'Testimonial List', 'canteen-essential' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'title' => 'Testimonial Name',
						'position' => 'Testimonial Position',
						'text' => 'Testimonial Text',
						'rate' => '3.5',
					],
					[
						'title' => 'Testimonial Name',
						'position' => 'Testimonial Position',
						'text' => 'Testimonial Text',
						'rate' => '3.5',
					],
					[
						'title' => 'Testimonial Name',
						'position' => 'Testimonial Position',
						'text' => 'Testimonial Text',
						'rate' => '3.5',
					],
				],
				'fields' => [
					[
						'name' => 'title',
						'label' => __( 'Testimonial Name', 'canteen-essential' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => __( 'Testimonial Name..', 'canteen-essential' ),
					],
					
					[
						'name' => 'position',
						'label' => __( 'Testimonial Position', 'canteen-essential' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => __( 'Testimonial Position..', 'canteen-essential' ),
					],
					[
						'name' => 'image',
						'label' => __( 'Client Image', 'canteen-essential' ),
						'type' => Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
					],
					[
						'name' => 'text',
						'label' => __( 'Testimonial Text', 'canteen-essential' ),
						'type' => Controls_Manager::TEXTAREA,
						'label_block' => true,
						'placeholder' => __( 'Testimonial Text..', 'canteen-essential' ),
					],
					[
						'name' => 'rate',
						'label' => __( 'Testimonial Rate', 'canteen-essential' ),
						'type' => Controls_Manager::NUMBER,
						'label_block' => true,
					],
				],
				'title_field' => '{{ title }}',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'title_settting',
			[
				'label' => __( 'Text Setting','canteen-essential' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'canteen-essential' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial .testi-text' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'title_typography',
				'label'     => __( 'Typography', 'canteen-essential' ),
				'selector'  => '{{WRAPPER}} .testimonial .testi-text',
			]
		);
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'name_settings',
			[
				'label' => __( 'Name Setting','canteen-essential' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'name_color',
			[
				'label' => __( 'Color', 'canteen-essential' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial h3' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'name_typography',
				'label'     => __( 'Name Typography', 'canteen-essential' ),
				'selector'  => '{{WRAPPER}} .testimonial h3',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'post_settting',
			[
				'label' => __( 'Position Setting','canteen-essential' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'post_color',
			[
				'label' => __( 'Color', 'canteen-essential' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial .testi-from' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'post_typography',
				'label'     => __( 'Typography', 'canteen-essential' ),
				'selector'  => '{{WRAPPER}} .testimonial .testi-from',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'quote_settting',
			[
				'label' => __( 'Quote Setting','canteen-essential' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'quote_color',
			[
				'label' => __( 'Color', 'canteen-essential' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial .quote-icon' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'quotebg_color',
			[
				'label' => __( 'Background Color', 'canteen-essential' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial .quote-icon' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'quote_radius',
			[
				'label' => __( 'Border Radius', 'canteen-essential' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .testimonial .fa' => 'border-radius:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'border_settting',
			[
				'label' => __( 'Border Setting','canteen-essential' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'border_color',
			[
				'label' => __( 'Color', 'canteen-essential' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial .slick-slide' => 'border-color: {{VALUE}};',
				],
			]
		);
		
		
		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings(); ?>
		
		
            <div class="testi-slider testimonial">
                <?php foreach ( $settings['testi_list'] as $index => $item ) : 
                ?>
                <div>
                	
                    <h3><?php echo  $item['title']; ?></h3>
                    
                    <p class="testi-from"><?php echo  $item['position']; ?></p>
                    
                    <div class="author-img">
						<img src="<?php echo esc_url ( $item['image']['url']); ?>" alt="img">
					</div>
                    
                    <p class="testi-text">
                   	<?php echo  $item['text']; ?>
                    </p>

                    <?php
					    for($x=1;$x<=$item['rate'];$x++) {
					        echo '<i class="rating-icon fa fa-star" aria-hidden="true"></i>';
					    }
					    if (strpos($item['rate'],'.')) {
					        echo '<i class="rating-icon fa fa-star-half-o" aria-hidden="true"></i>';
					        $x++;
					    }
					    while ($x<=5) {
					        echo '<i class="rating-icon fa fa-star-o" aria-hidden="true"></i>';
					        $x++;
					    }
				    ?>
                    
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
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() {
		
		
	}
}


