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
class Canteen_WorkProcess extends Widget_Base {

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
		return 'canteen-work-process';
	}
		//script depend
	public function get_script_depends() { return [ 'jquery-slick','canteen-work-process' ]; }

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
		return __( 'Canteen work procss', 'canteen-essential' );
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
		return 'eicon-image-box';
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
				'label' => __( 'Image-box Settings', 'canteen-essential' ),
			]
		);
		
		
	
		$this->add_control(
			'work_process_list',
			[
				'label' => __( 'Image-box List', 'canteen-essential' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'title' => 'Concept design',
						'text' => 'Image-box Text',
					],
					[
						'title' => 'Schematic Development',
						'text' => 'LOD 200',
					],
					[
						'title' => 'Detail Design',
						'text' => 'Image-box Text',
					],
				],
				'fields' => [
					[
						'name' => 'title',
						'label' => __( 'Image-box Title', 'canteen-essential' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => __( 'Image-box Title', 'canteen-essential' ),
					],
					
					[
						'name' => 'image',
						'label' => __( 'Image', 'canteen-essential' ),
						'type' => Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
					],
					[
						'name' => 'text',
						'label' => __( 'Image-box Text', 'canteen-essential' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => __( 'Image-box Text', 'canteen-essential' ),
					],
					[
						'name' => 'description',
						'label' => __( 'Description', 'canteen-essential' ),
						'type' => Controls_Manager::TEXTAREA,
						'label_block' => true,
						'placeholder' => __( 'Description', 'canteen-essential' ),
					],

				],
				'title_field' => '{{ title }}',
			]
		);
		$this->end_controls_section();


		
		$this->start_controls_section(
			'title_typo',
			[
				'label' => __( 'Subtitle Settings', 'canteen-essential' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'cport_typography',
				'label'     => __( 'Title Typography', 'canteen-essential' ),
				'selector'  => '{{WRAPPER}} .work-process .item .box-img .num',
			]
		);
		

		
		$this->add_control(
			'title_cl',
			[
				'label' => __( 'Title Color', 'canteen-essential' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .work-process .item .box-img .num' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_bgl',
			[
				'label' => __( 'Title Background Color', 'canteen-essential' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .work-process .item .box-img .num' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'titlep_padding',
			[
				'label' => __( 'Title Padding', 'canteen-essential' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .work-process .item .box-img .num' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'titlep_margin',
			[
				'label' => __( 'Title Margin', 'canteen-essential' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .work-process .item .box-img .num' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		
		$this->end_controls_section();
	
		
		$this->start_controls_section(
			'paragraph_typo',
			[
				'label' => __( 'Text Settings', 'canteen-essential' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'text_typography',
				'label'     => __( 'Title Typography', 'canteen-essential' ),
				'selector'  => '{{WRAPPER}} .work-process .item .box-cont p',
			]
		);
		

		
		$this->add_control(
			'text_cl',
			[
				'label' => __( 'Text Color', 'canteen-essential' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .work-process .item .box-cont p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'text_bgl',
			[
				'label' => __( 'Text Background Color', 'canteen-essential' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .work-process .item .box-cont p' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'text_padding',
			[
				'label' => __( 'Text Padding', 'canteen-essential' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .work-process .item .box-cont p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'text_margin',
			[
				'label' => __( 'Text Margin', 'canteen-essential' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .work-process .item .box-cont p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		
            <div class="work-process">
                <?php foreach ( $settings['work_process_list'] as $index => $item ) : 
                ?>
                <div class="item">
                    
                    <div class="box-img">
	                	<div class="bg-img">
							<img src="<?php echo esc_url ( $item['image']['url']); ?>" alt="img">
						</div>
						<span class="num"><?php echo  $item['text']; ?></span>
					</div>

					<div class="box-cont"> 
					 <h3><?php echo  $item['title']; ?></h3> 
					 <p class="desc"><?php echo  $item['description']; ?></p>                   
                    
                    </div>
                    
                </div>
                
                <?php endforeach; ?>
            </div><!-- .work-process -->
	
		
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


