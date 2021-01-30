<?php
namespace BetterWidgets\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world. 
 *
 * @since 1.0.0
 */
class Better_Portfolio extends Widget_Base {

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
		return 'better-portfolio';
	}
	//script depend
	public function get_script_depends() { return ['better-portfolio']; }

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
		return __( 'Better Portfolio', 'better-widgets' );
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
		return 'fa fa-clone';
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
		return [ 'better-category' ];
	}

	
	/**
	 * Register oEmbed widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		// start of the Content tab section
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Portfolio Settings', 'bim_plg' ),
			]
		);
		
		
	
		$this->add_control(
			'portfolio_one',
			[
				'label' => __( 'Portfolio one', 'better-widgets' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'title' => 'Main title',
						'subtitle' => 'Sub title',
						'link' => '#',
						'linktext' => 'View more',
					],
					[
						'title' => 'Main title',
						'subtitle' => 'Sub title',
						'link' => '#',
						'linktext' => 'View more',
					],
					[
						'title' => 'Main title',
						'subtitle' => 'Sub title',
						'link' => '#',
						'linktext' => 'View more',
					],
					[
						'title' => 'Main title',
						'subtitle' => 'Sub title',
						'link' => '#',
						'linktext' => 'View more',
					],
				],
				'fields' => [ 
					[
						'name' => 'title',
						'label' => __( 'Main Title', 'better-widgets' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => esc_html__( 'Main Title', 'better-widgets'  ),
					],
					
					[
						'name' => 'subtitle',
						'label' => __( 'Sub title', 'better-widgets' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => esc_html__( 'Sub title', 'better-widgets'  ),
					],
					[
						'name' => 'link',
						'label' => __( 'Link', 'better-widgets' ),
						'type' => Controls_Manager::URL,
						'placeholder' => 'Leave link url',
					],
					[
						'name' => 'linktext',
						'label' => __( 'View more', 'better-widgets' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => esc_html__( 'View more', 'better-widgets'  ),
					],
					[
						'name' => 'image',
						'label' => __( 'Client Image', 'bim_plg' ),
						'type' => Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
					],
				],
				'title_field' => '{{ title }}',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Content Style', 'better-widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'better_image_box_title_typography',
				'label' => esc_html__( 'Subtitle Typography', 'better-widgets' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .portfolio .item .info h6',
			]
		);

		$this->end_controls_section();
		

	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings();
		// get our input from the widget settings.
		// $settings = $this->get_settings_for_display();
		// $better_portfolio_image = $settings['image']['url'];
		// $better_portfolio_title = $settings['title'];
		// $better_portfolio_desg = $settings['subtitle']; 
		?>

		<div class="better portfolio">
			<div class="row">
		<?php 
		 $count = 0;
		foreach ( $settings['portfolio_one'] as $index => $item ) :
			$count++
		  ?>

			<div class="col-lg-3 col-md-6 item <?php if ($count==1){echo'current';}  ?> " data-tab="<?php echo'tab-'.$count; ?>">
	            <div class="info">
	                <h6 class="custom-font"><?php echo  $item['subtitle']; ?></h6>
	                <h5><?php echo  $item['title']; ?></h5>
	            </div>
	            <div class="more">
	                <a href="<?php echo esc_url( $item['link']['url']); ?>"><?php echo  $item['linktext']; ?><i class="fas fa-chevron-right"></i></a>
	            </div>
	        </div>

        <?php endforeach; ?>
         </div>
		<div class="glry-img">
		<?php
		$count = 0;
		 foreach ( $settings['portfolio_one'] as $index => $item ) :  
			$count++
			?>
            
            	<div id="<?php echo'tab-'.$count; ?>" class="bg-img tab-img <?php if ($count==1){echo'current';}  ?>" data-background="<?php echo esc_url ( $item['image']['url']); ?>" data-overlay-dark="2" style="background-image:url(<?php echo esc_url ( $item['image']['url']); ?>);"></div>
			
        <?php endforeach; ?>
        </div>

        </div> 
			
		<?php 
	}
}