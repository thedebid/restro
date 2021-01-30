<?php
namespace CanteenPlugin\Widgets;

use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


		
/**
 * @since 1.0.0
 */
class Canteen_Team_One extends Widget_Base {

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
		return 'canteen-team-one';
	}

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
		return __( 'Canteen Team One', 'canteen-essential' );
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
		return 'eicon-person';
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
				'label' => __( 'Team Settings', 'canteen-essential' ),
			]
		);
		
		$this->add_control(
            'title',
            [
                'label' => __( 'Team Title', 'canteen-essential'),
                'type' => Controls_Manager::TEXT,
				'default' => __( 'Team Name', 'canteen-essential' ),
				'label_block' => true,
            ]
        );
		
		$this->add_control(
            'text',
            [
                'label' => __( 'Team Position', 'canteen-essential'),
                'type' => Controls_Manager::TEXT,
				'default' => __( 'Web Designer', 'canteen-essential' ),
				'label_block' => true,
            ]
        );
		
		$this->add_control(
            'image',
            [
                'label' => __( 'Team Image', 'canteen-essential' ),
                'type' => Controls_Manager::MEDIA,
				'default' => [
							'url' => Utils::get_placeholder_image_src(),
				],
            ]
        );
		
		$this->add_responsive_control(
			'team_height',
			[
				'label' => __( 'Team Image Height', 'canteen-essential' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' =>0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .port-box' => 'padding: {{SIZE}}% 0;',
				],
			]
		);
		
		$this->add_responsive_control(
			'image_position',
			[
				'label' => __( 'Team Image Position', 'canteen-essential' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'top center' => __( 'Top', 'canteen-essential' ),
					'bottom center' => __( 'Bottom', 'canteen-essential' ),
					'center center' => __( 'Center', 'canteen-essential' ),
				],
				'default' => 'center center',
				'selectors' => [
					'{{WRAPPER}} .port-img' => 'background-position: {{VALUE}};',
				],
			]
		);
		
		 
		$this->add_control(
			'team_icon',
			[
				'label' => __( 'Team Social Icon', 'canteen-essential' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'icon' => 'fa fa-facebook',
					],
					[
						'icon' => 'fa fa-twitter',
					],
					[
						'icon' => 'fa fa-instagram',
					],
				],
				'fields' => [
					[
						'name' => 'link',
						'label' => __( 'Social Link', 'canteen-essential' ),
						'type' => Controls_Manager::URL,
						'label_block' => true,
						'placeholder' => __( 'Your social link..', 'canteen-essential' ),
					],
					
					[
						'name' => 'icon',
						'label' => __( 'Icon', 'canteen-essential' ),
						'type' => Controls_Manager::ICON,
						'label_block' => true,
						'default' => 'fa fa-facebook',
						'include' => [
							'fa fa-apple',
							'fa fa-behance',
							'fa fa-bitbucket',
							'fa fa-codepen',
							'fa fa-delicious',
							'fa fa-digg',
							'fa fa-dribbble',
							'fa fa-envelope',
							'fa fa-facebook',
							'fa fa-flickr',
							'fa fa-foursquare',
							'fa fa-github',
							'fa fa-google-plus',
							'fa fa-houzz',
							'fa fa-instagram',
							'fa fa-jsfiddle',
							'fa fa-linkedin',
							'fa fa-medium',
							'fa fa-odnoklassniki',
							'fa fa-pinterest',
							'fa fa-product-hunt',
							'fa fa-reddit',
							'fa fa-shopping-cart',
							'fa fa-slideshare',
							'fa fa-snapchat',
							'fa fa-soundcloud',
							'fa fa-spotify',
							'fa fa-stack-overflow',
							'fa fa-telegram',
							'fa fa-tripadvisor',
							'fa fa-tumblr',
							'fa fa-twitch',
							'fa fa-twitter',
							'fa fa-vimeo',
							'fa fa-vk',
							'fa fa-weibo',
							'fa fa-weixin',
							'fa fa-whatsapp',
							'fa fa-wordpress',
							'fa fa-xing',
							'fa fa-yelp',
							'fa fa-youtube',
						],
					],
				],
				'title_field' => '<i class="{{ icon }}"></i> {{{ icon.replace( \'fa fa-\',\'\' ).replace( \'-\',\' \' ).replace( /\b\w/g, function( letter ){ return letter.toUpperCase() } ) }}}',
			]
		);
		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_content_style',
			[
				'label' => __( 'Content Settings', 'canteen-essential' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		
		
		$this->add_responsive_control(
			'port_content',
			[
				'label' => __( 'Content Margin (on hover)', 'canteen-essential' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .dbox-relative' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'port_padding',
			[
				'label' => __( 'Content Padding (on hover)', 'canteen-essential' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .dbox-relative' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'bg_content',
			[
				'label' => __( 'Content Background', 'canteen-essential' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dbox-relative' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'content_align',
			[
				'label' => __( 'Alignment', 'canteen-essential' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'canteen-essential' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'canteen-essential' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'canteen-essential' ),
						'icon' => 'fa fa-align-right',
					]
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dbox-relative' => 'text-align: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();


		$this->start_controls_section(
			'section_info_style',
			[
				'label' => __( 'Info Settings', 'canteen-essential' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		
		$this->add_responsive_control(
			'info_padding',
			[
				'label' => __( 'Content Padding (on hover)', 'canteen-essential' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .team-info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'info_content',
			[
				'label' => __( 'Content Background', 'canteen-essential' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .team-info' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'info_align',
			[
				'label' => __( 'Alignment', 'canteen-essential' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'canteen-essential' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'canteen-essential' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'canteen-essential' ),
						'icon' => 'fa fa-align-right',
					]
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .team-info' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'info_cl',
			[
				'label' => __( 'Info Color', 'canteen-essential' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .team-info' => 'border-color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'title_typo',
			[
				'label' => __( 'Title Content Settings', 'canteen-essential' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'cport_typography',
				'label'     => __( 'Title Typography', 'canteen-essential' ),
				'selector'  => '{{WRAPPER}} .dbox-relative h3',
			]
		);
		
		$this->add_control(
			'title_type',
			[
				'label' => __( 'Title Display','canteen-essential' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'block' => __( 'Block','canteen-essential' ),
					'inline-block' => __( 'Inline Block','canteen-essential' ),
				],
				'default' => 'block',
				'selectors' => [
					'{{WRAPPER}} .dbox-relative h3' => 'display: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'title_cl',
			[
				'label' => __( 'Title Color', 'canteen-essential' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dbox-relative h3' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .dbox-relative h3' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .dbox-relative h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .dbox-relative h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'sub_typo',
			[
				'label' => __( 'Text Content Settings', 'canteen-essential' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'ctext_typography',
				'label'     => __( 'Text Typography', 'canteen-essential' ),
				'selector'  => '{{WRAPPER}} .dbox-relative p',
			]
		);
		
		$this->add_control(
			'text_type',
			[
				'label' => __( 'Text Display','canteen-essential' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'block' => __( 'Block','canteen-essential' ),
					'inline-block' => __( 'Inline Block','canteen-essential' ),
				],
				'default' => 'block',
				'selectors' => [
					'{{WRAPPER}} .dbox-relative p' => 'display: {{VALUE}};',
				],
			]
		);
		
		
		$this->add_control(
			'txt_cl',
			[
				'label' => __( 'Text Color', 'canteen-essential' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dbox-relative p' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'txt_bg',
			[
				'label' => __( 'Text Background Color', 'canteen-essential' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dbox-relative p' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'tx_padding',
			[
				'label' => __( 'Text Padding', 'canteen-essential' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .dbox-relative p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'tx_margin',
			[
				'label' => __( 'Text Margin', 'canteen-essential' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .dbox-relative p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'icon_section_setting',
			[
				'label' => __( 'Icon Settings', 'canteen-essential' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Color', 'canteen-essential' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .team-sicon li a' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'icon_bg',
			[
				'label' => __( 'Background', 'canteen-essential' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .team-sicon li a' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'icon_hcolor',
			[
				'label' => __( 'Color on Hover', 'canteen-essential' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .team-sicon li a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'icon_hbg',
			[
				'label' => __( 'Background on Hover', 'canteen-essential' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .team-sicon li a:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'icon_opacity',
			[
				'label' => __( 'Icons Opacity', 'canteen-essential' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' =>0,
						'max' => 1,
						'step' =>0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .dbox-relative' => 'opacity: {{SIZE}};',
				],
			]
		);
		$this->add_control(
			'icon_opacity_hover',
			[
				'label' => __( 'Icons Opacity on hover', 'canteen-essential' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' =>0,
						'max' => 1,
						'step' =>0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .team-sicon li a:hover' => 'opacity: {{SIZE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'icon_radius',
			[
				'label' => __( 'Border Radius', 'canteen-essential' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .team-sicon li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Size', 'canteen-essential' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' =>0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .team-sicon li a' => 'font-size: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .team-sicon li a .fa' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};'
				],
			]
		);
		
		
		$this->add_responsive_control(
			'icon_padding',
			[
				'label' => __( 'Padding', 'canteen-essential' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .team-sicon li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'icon_margin',
			[
				'label' => __( 'Margin', 'canteen-essential' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .team-sicon li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_filter',
			[
				'label' => __( 'Icon Filter','canteen-essential' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'none' => __( 'None','canteen-essential' ),
					'grayscale(100%)' => __( 'Grayscale','canteen-essential' ),
				],
				'default' => 'block',
				'selectors' => [
					'{{WRAPPER}} .team-1 .port-img' => 'filter: {{VALUE}};',
				],
			]
		);

		
		$this->end_controls_section();
		
	
		
		$this->start_controls_section(
			'port_mask',
			[
				'label' => __( 'Mask Settings', 'canteen-essential' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		
		$this->add_control(
			'mask_color_normal',
			[
				'label' => __( 'Mask Color', 'canteen-essential' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .port-inner .port-box' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'mask_color_opacity_normal',
			[
				'label' => __( 'Mask Color Opacity(on hover)', 'canteen-essential' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' =>0,
						'max' => 1,
						'step' =>0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .port-inner .port-box' => 'opacity: {{SIZE}};',
				],
			]
		);
		$this->add_control(
			'mask_color',
			[
				'label' => __( 'Mask Color', 'canteen-essential' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .port-inner:hover .port-box' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'mask_color_opacity',
			[
				'label' => __( 'Mask Color Opacity(on hover)', 'canteen-essential' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' =>0,
						'max' => 1,
						'step' =>0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .port-inner:hover .port-box' => 'opacity: {{SIZE}};',
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
	$settings = $this->get_settings();
	$this->add_inline_editing_attributes( 'title' );
	$this->add_inline_editing_attributes( 'text' );
	
	?>
        <div class="clearfix team-1">
            <div class="port-inner">
                <div class="port-box"></div>
                <div class="port-img width-img img-bg" style="background-image:url(<?php echo esc_url ($settings['image']['url']); ?>);"></div>
                <div class="img-mask"></div>
                <div class="port-dbox">
                    <div class="dbox-relative">
                        
                        <ul class="team-sicon">
                            <?php foreach ( $settings['team_icon'] as $index => $item ) : 
                            $link_key = 'link_' . $index;
                            $this->add_render_attribute( $link_key, 'href',esc_url ($item['link']['url']) );
    
                            if ( $item['link']['is_external'] ) {
                                $this->add_render_attribute( $link_key, 'target', '_blank' );
                            }
    
                            if ( $item['link']['nofollow'] ) {
                                $this->add_render_attribute( $link_key, 'rel', 'nofollow' );
                            }
                            ?>
                            <li>
                                <?php echo '<a ' . $this->get_render_attribute_string( $link_key ) . '>'; ?>
                                    <i class="<?php echo esc_attr ( $item['icon']); ?>"></i>
                                </a>
                            </li>
                            <?php endforeach; ?>
                            
                        </ul>
                        
                    </div>
                </div>
            </div>
            <div class="team-info">
            	<h5 <?php echo $this->get_render_attribute_string( 'title' ); ?>><?php echo $settings['title']; ?></h5>
                <p <?php echo $this->get_render_attribute_string( 'text' ); ?>><?php echo $settings['text']; ?></p>
            </div>
        </div>
                    
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


