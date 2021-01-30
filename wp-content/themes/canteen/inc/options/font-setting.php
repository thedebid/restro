<?php
/**
 * Header Tab For Theme Option.
 *
 * @package canteen
 */


// Font options for family. size and fully typography.

if ( ! function_exists( 'canteen_enqueue_fonts_url' ) ) :

function canteen_enqueue_fonts_url() {
    $canteen_fonts_url = '';
    $canteen_fonts     = array();
    $canteen_main_font_weight = array();
    $canteen_alt_font_weight = array();
    $canteen_font_subsets = array();
    global $canteen_theme_settings;
    
    /* For Main Font Weight */
    $canteen_main_font_weight_array = ( isset( $canteen_theme_settings['main_font_weight'] ) ) ? $canteen_theme_settings['main_font_weight'] : '';
    if( !empty( $canteen_main_font_weight_array ) ) {
        foreach ($canteen_main_font_weight_array as $key => $value) {
            if( $value == 1 ){
                $canteen_main_font_weight[] = $key;
            }
        }
    }

    if( !empty( $canteen_main_font_weight ) ) {
        $canteen_main_font_weight = implode( ',', $canteen_main_font_weight );
    } else {
        $canteen_main_font_weight = '100,300,400,500,700,900';
    }

    if( $canteen_theme_settings['main_font']['font-family']){
        $canteen_fonts[] = $canteen_theme_settings['main_font']['font-family'].':'.$canteen_main_font_weight;
    }else{
        $canteen_fonts[] = 'Josefin Sans:100,300,400,500,700,900';
    }

    /* For Alt Font Weight */
    $canteen_alt_font_weight_array = ( isset( $canteen_theme_settings['alt_font_weight'] ) ) ? $canteen_theme_settings['alt_font_weight'] : '';
    if( !empty( $canteen_alt_font_weight_array ) ) {
        foreach ($canteen_alt_font_weight_array as $key => $value) {
            if( $value == 1 ){
                $canteen_alt_font_weight[] = $key;
            }
        }
    }

    if( !empty( $canteen_alt_font_weight ) ) {
        $canteen_alt_font_weight = implode( ',', $canteen_alt_font_weight );
    } else {
        $canteen_alt_font_weight = '100,200,300,400,500,600,700,800,900';
    }
    if( $canteen_theme_settings['alt_font']['font-family']){
        $canteen_fonts[] = $canteen_theme_settings['alt_font']['font-family'].':'.$canteen_alt_font_weight;
    }else{
        $canteen_fonts[] = 'Montserrat:100,200,300,400,500,600,700,800,900';
    }

    /* For Font Subsets */
    $canteen_main_font_subsets = ( isset( $canteen_theme_settings['main_font_languages'] ) ) ? $canteen_theme_settings['main_font_languages'] : '' ;
    if( !empty( $canteen_main_font_subsets ) ) {
        foreach ($canteen_main_font_subsets as $key => $value) {
            if( $value == 1 ){
                $canteen_font_subsets[] = $key;
            }
        }
    }
    if( !empty( $canteen_font_subsets ) ) {
        $canteen_main_font_subsets = implode( ',',  $canteen_font_subsets );
    } else {
        $canteen_main_font_subsets = '';
    }

    if ( $canteen_fonts ) {
        $canteen_fonts_url = add_query_arg( array(
            'family' => urlencode( implode( '|', $canteen_fonts ) ),
            'subset' => urlencode( $canteen_main_font_subsets ),
        ), '//fonts.googleapis.com/css' );
    }
    return $canteen_fonts_url;
}
endif;

if ( ! function_exists( 'canteen_font_scripts' ) ) :
    function canteen_font_scripts() {
        $disable_google_fonts = canteen_option( 'disable_google_fonts' );
        if( $disable_google_fonts != 1 ) {
            wp_enqueue_style( 'canteen-fonts', canteen_enqueue_fonts_url(), array(), null );
        }
    }
endif;
add_action( 'wp_enqueue_scripts', 'canteen_font_scripts' );


$this->sections[] = array(
    'icon' => 'el el-fontsize',
    'title' => esc_html__('Typography', 'canteen'),
    'desc' => esc_html__('Font settings', 'canteen'),
    'fields' => array(
        array(
            'id'        => 'opt-accordion-begin-general',
            'type'      => 'accordion',
            'title'     => esc_html__('Font Family', 'canteen'),
            'subtitle'  => esc_html__('Set font family', 'canteen'),
            'position'  => 'start',
        ),
        array(
            'id'       => 'main_font',
            'type'     => 'typography',
            'title'    => esc_html__( 'Main Font', 'canteen' ),
            'font-size'=> false,
            'line-height'=> false,
            'color' => false,
            'text-align' => false,
            'font-style' => false,
            'font-weight'=> false,
            'subsets' => false,
            'default'  => array(
                'font-family' => 'Josefin Sans',
            ),
            'output' => array('body')
        ),
        array(
            'id'       => 'headers_font',
            'type'     => 'typography',
            'title'    => esc_html__( 'Header Fonts', 'canteen' ),
            'font-size'=> false,
            'line-height'=> false,
            'color' => false,
            'text-align' => false,
            'font-style' => false,
            'font-weight'=> false,
            'subsets' => false,
            'default'  => array(
                'font-family' => 'Poppins',
            ),
            'output' => array('h1, h2, h3, h4, h5, h6')
        ),
        array(
            'id'       => 'alt_font',
            'type'     => 'typography',
            'title'    => esc_html__( 'Alt Font', 'canteen' ),
            'font-size'=> false,
            'line-height'=> false,
            'color' => false,
            'text-align' => false,
            'font-style' => false,
            'font-weight'=> false,
            'subsets' => false,
            'default'  => array(
                'font-family' => 'Barlow'
            ),
            'output' => array('.slider-style-3 .slider-title')
        ),
        array(
            'id'        => 'opt-accordion-end-general',
            'type'      => 'accordion',
            'position'  => 'end'
        ),

        /* Font Size and Line Height */ 
        
        array(
            'id'        => 'opt-accordion-begin-general',
            'type'      => 'accordion',
            'title'     => esc_html__('Font Size', 'canteen'),
            'subtitle'  => esc_html__('Set font size', 'canteen'), 
            'position'  => 'start',
        ),
        array(
            'id'       => 'body_font_size',
            'type'     => 'typography',
            'title'    => esc_html__( 'Body Font Size', 'canteen' ),
            'line-height'=> true,
            'font-size'=> true,
            'color' => false,
            'text-align' => false,
            'font-style' => false,
            'font-weight'=> false,
            'subsets' => false,
            'font-family' => false,
            'preview'     => false,
            'default'     => array(
                'font-size'   => '14px',
                'line-height' => '1.8em',
            ),
            'output' => array('body')
        ),
        array(
            'id'       => 'header_font_size',
            'type'     => 'typography',
            'title'    => esc_html__( 'Header Font Size', 'canteen' ),
            'font-size'=> true,
            'line-height'=> false,
            'color' => false,   
            'text-align' => false,
            'font-style' => false,
            'font-weight'=> false,
            'subsets' => false,
            'font-family' => false,
            'preview'     => false,
            'default'     => array(
                'line-height' => '1.4em',
            ),
            'output' => array('h1, h2, h3, h4, h5, h6'),
        ),

        array(
            'id'       => 'h4_font_size',
            'type'     => 'typography',
            'title'    => esc_html__( 'Heading h4 Font Size', 'canteen' ),
            'font-size'=> true,
            'line-height'=> true,
            'color' => false,
            'text-align' => false,
            'font-style' => false,
            'font-weight'=> false,
            'subsets' => false,
            'font-family' => false,
            'preview'     => false,
            'default'     => array(
                'font-size'   => '20px',
            ),
            'output' => array('h4')
        ),
        array(
            'id'       => 'h5_font_size',
            'type'     => 'typography',
            'title'    => esc_html__( 'Heading h5 Font Size', 'canteen' ),
            'font-size'=> true,
            'line-height'=> true,
            'color' => false,
            'text-align' => false,
            'font-style' => false,
            'font-weight'=> false,
            'subsets' => false,
            'font-family' => false,
            'preview'     => false,
            'default'     => array(
                'font-size'   => '18px',
            ),
            'output' => array('h5')
        ),
        array(
            'id'       => 'h6_font_size',
            'type'     => 'typography',
            'title'    => esc_html__( 'Heading h6 Font Size', 'canteen' ),
            'font-size'=> true,
            'line-height'=> true,
            'color' => false,
            'text-align' => false,
            'font-style' => false,
            'font-weight'=> false,
            'subsets' => false,
            'font-family' => false,
            'preview'     => false,
            'default'     => array(
                'font-size'   => '17px',
            ),
            'output' => array('h6')
        ),

        array(
            'id'        => 'opt-accordion-end-general',
            'type'      => 'accordion',
            'position'  => 'end'
        ),
    )
);
?>