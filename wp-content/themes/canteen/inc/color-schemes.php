<?php 
//color schemes
function canteen_color_scheme() {
	if ( class_exists( 'ReduxFrameworkPlugin' ) ) {  
		global $post ;

		//general color
		$general = canteen_option( 'canteen_color_general' ); 
		$color_general = "
		.cart-contents-count,.tagcloud a:hover,.to-top,.to-top:hover,.to-top::after,.blog-link-img,.portfolio-type-three .port-inner:hover .dbox-relative a span,.dsc-footer-style-3 h3:after,.form-submit #submit,.widget-border,.widget_archive ul li a:hover + span,.ab-bordering,.abtw-soc a,.content-btn:hover,.menu-wrapper > .menu > ul > li > a:before,.to-top::before
		{background-color:$general;}

		.dsc-heading-style1 h5, a:hover, .content-title span,.table-content h3 > span,.white-header .header-icon li.current-menu-parent> a,.white-header .navigation li.current-menu-parent> a,.white-header .menu-wrapper .menu ul li.current-menu-parent> a,.white-header .header-icon li.current_page_item> a,.white-header .navigation li.current_page_item> a,.white-header .menu-wrapper .menu ul li.current_page_item> a , .custom-absolute-menu .is-sticky .navigation li.current-menu-item a,.custom-absolute-menu .is-sticky .menu-wrapper .menu ul li.current-menu-item a, .custom-absolute-menu .is-sticky .navigation li a:hover,.custom-absolute-menu .is-sticky .menu-wrapper .menu ul li a:hover, .custom-absolute-menu .navigation .sub-menu li a:hover,.custom-absolute-menu .menu-wrapper .menu ul.sub-menu li a:hover,.white-header  .navigation li a:hover,.white-header .menu-wrapper .navigation li ul li.current_page_item > a,.menu-wrapper .navigation li ul li.current_page_item > a, .menu-wrapper .menu ul li ul li.current_page_item > a ,.white-header .menu-wrapper .menu ul li ul li.current_page_item > a, .white-header .menu-wrapper .navigation li ul li a:hover,.menu-wrapper .navigation li ul li a:hover, .menu-wrapper .menu ul li ul li a:hover ,.white-header .menu-wrapper .menu ul li ul li a:hover, .header-icon li a:hover, .btn-nav-top a:hover,.slider-btn:hover,.feature-1:hover .canteen-icon,.feature-2 .canteen-icon,.feature-2:hover .canteen-icon,.feature-3 .canteen-icon,.feature-3:hover .canteen-icon,.port-filter a.active,.port-filter a:hover,.portfolio-2 .port-inner:hover .dbox-relative h3 a:hover,.portfolio-2 .port-inner .port-dbox a span:hover,.portfolio-type-three .dbox-relative p,.team-1 p,.testimonial .rating-icon,.wpcf7-submit ,.dark-page .wpcf7-submit,.content-btn,.color-bg .wpcf7-submit,span.your-email:before, span.your-name:before, span.your-message:before, .comment-form-email:before,span.cell-phone:before,span.subject:before,.footer a,.post-meta a,.post-meta li,.blog-post-list a:hover h3,.blog-2 .content-btn,a .entry-title:hover,.tags-bottom a:hover,.share-box a:hover,.related-cat i,h3.related-title:hover,#searchform::after,.tagcloud a,.tagcloud a:hover,.abtw-soc a:hover,.form-submit #submit:hover,.dsc-btn-style3:hover  .elementor-button,.dsc-btn-style-4,code,.comment-reply-link,.imgpagi-box p,.blog-content .blog-post p a,.post-detail > li i,.img-pagination a:hover .img-pagi .lnr,.searchform::after,.team-sicon li a
		{color:$general;}

		.to-top,.content-title:after,::selection,::-moz-selection,.to-top::before,.to-top::after,.box-small-icon:hover .canteen-icon,.navigation>li>a:before,.menu-wrapper>.menu>ul>li>a:before,.custom-absolute-menu .is-sticky .navigation>li>a:before,.menu-wrapper>.menu>ul>li>a:before,.btn-nav-top a,.search-icon-header #searchform::after,.slider-line,.left-box-slider .slider-line,.center-box-slider .slider-line,.feature-4 .canteen-icon,.other-portfolio .port-box,.portfolio-type-three .port-inner:hover .dbox-relative a span,.team-2 .port-box,.content-btn:hover,.wpcf7-submit:hover,.dsc-footer-style-2 .mc4wp-form-fields input[type=submit]:hover,.dsc-footer-style-3 h3:after,.dsc-footer-style-3 .mc4wp-form-fields input[type=submit], .blog-link-img .bl-icon, .blog-link-img,.blog-gallery a i,.img-pagi,.widget-border,.ab-bordering,.abtw-soc a,.form-submit #submit,.dsc-btn-style3,.dsc-btn-style-4:hover,.tagcloud a:hover,.to-top,.portfolio-type-three .port-inner:hover .dbox-relative a span
		{background:$general;}
		
		.p-table a ,.blog-slider .slide-nav:hover,.work-content .slide-nav:hover,.tagcloud a:hover
		{color:#fff;}

		.dsc-btn-style3
		{background-color:#fff;}
		
		blockquote,.box-small-icon:hover .canteen-icon,.cell-left-border,.cell-right-border,.menu-wrapper ul li ul,.btn-nav-top a,.btn-nav-top a:hover,.feature-4 .canteen-icon,.portfolio-2 .port-inner .port-dbox a span:hover,.portfolio-type-three .port-inner:hover .dbox-relative a span,.portfolio-type-three .port-inner:hover .dbox-relative h3,.team-sicon li a:hover,.team-1 .team-info,form input:focus,form textarea:focus,.comment-respond form input:focus, .comment-respond form textarea:focus,.wpcf7-submit ,.dark-page .wpcf7-submit,.content-btn,.wpcf7-submit:hover,.error-title,.blog-2 .content-btn i,.tags-bottom a:hover,.share-box a:hover,#related_posts .related-inner:hover,.tagcloud a,.tagcloud a:hover,.form-submit #submit,.form-submit #submit:hover,.dsc-btn-style3:hover,.dsc-btn-style-4,.dsc-btn-style-4:hover,.wp-block-coblocks-click-to-tweet,.related-inner,.work-process .item .box-img .bg-img
		{border-color:$general;}
		";   

		if ( class_exists( 'ReduxFrameworkPlugin' ) && canteen_option( 'canteen_color_general' ) ) {           
			wp_add_inline_style( 'canteen-style', $color_general );
		}

		//hovers color
		$hovers = canteen_option( 'canteen_custom_hovers' );
		if ( class_exists( 'ReduxFrameworkPlugin' ) && canteen_option( 'canteen_custom_hovers' ) ) {  
			$custom_hovers = "a:hover{color:$hovers;}";         
			wp_add_inline_style( 'canteen-style', $custom_hovers );
		}

		//scheme color
		$color = canteen_option( 'canteen_color_scheme' );
		if ( class_exists( 'ReduxFrameworkPlugin' ) && canteen_option( 'canteen_color_scheme' ) ) {  
			$custom_css = "a{color:$color;}";   
			wp_add_inline_style( 'canteen-style', $custom_css );
		}
		
		//heading color 
		$heading = canteen_option( 'canteen_heading_color' );
		if ( class_exists( 'ReduxFrameworkPlugin' ) && canteen_option( 'canteen_heading_color' ) ) { 
			$heading_color = "h1, h2, h3, h4, h5, h6{color:$heading;} ";   
			wp_add_inline_style( 'canteen-style', $heading_color );
		}

		//body color
		$general = canteen_option( 'canteen_general_color' );   
		if ( class_exists( 'ReduxFrameworkPlugin' ) && canteen_option( 'canteen_general_color' ) ) { 
			$general_color = "body{color:$general;}";          
			wp_add_inline_style( 'canteen-style', $general_color );
		}
		
		//footer color
		$footer = canteen_option( 'canteen_footer_color' );
		if ( class_exists( 'ReduxFrameworkPlugin' ) && canteen_option( 'canteen_footer_color' ) ) {   
			$footer_color = ".footer{background-color:$footer;}";   
			wp_add_inline_style( 'canteen-style', $footer_color );
		}

		//Main menu color
		$main_menu = canteen_option( 'canteen_main_menu' );
		if ( class_exists( 'ReduxFrameworkPlugin' ) && canteen_option( 'canteen_main_menu' ) ) {  
			$color_menu = ".custom-absolute-menu .navigation li.current_page_item> a{color: $main_menu;}";   
			wp_add_inline_style( 'canteen-style', $color_menu );
		}
		//Main menu color hover
		$main_menu = canteen_option( 'canteen_main_menu_hover' );
		if ( class_exists( 'ReduxFrameworkPlugin' ) && canteen_option( 'canteen_main_menu_hover' ) ) {  
			$color_menu = ".custom-absolute-menu .navigation li.current_page_item> a:hover{color: $main_menu;}";   
			wp_add_inline_style( 'canteen-style', $color_menu );
		}
		
		//menu color
		$menu = canteen_option( 'canteen_stick_menu' );
		if ( class_exists( 'ReduxFrameworkPlugin' ) && canteen_option( 'canteen_stick_menu' ) ) {  
			$color_menu = ".custom-sticky-menu .is-sticky .stuck-nav, .is-sticky .stuck-nav{background: $menu;}";   
			wp_add_inline_style( 'canteen-style', $color_menu );
		}

		//menu2 color
		$menu2 = canteen_option( 'canteen_stick_menu2' );
		if ( class_exists( 'ReduxFrameworkPlugin' ) && canteen_option( 'canteen_stick_menu2' ) ) { 
			$color_menu2 = ".white-header .is-sticky .stuck-nav{background-color: $menu2;}";   
			wp_add_inline_style( 'canteen-style', $color_menu2 );
		}

		//menu border color
		$menu_border = canteen_option( 'canteen_menu_border' );
		if ( class_exists( 'ReduxFrameworkPlugin' ) && canteen_option( 'canteen_menu_border' ) ) { 
			$color_border = ".custom-absolute-menu{border-color: $menu_border;}";   
			wp_add_inline_style( 'canteen-style', $color_border );
		}
		
	}        
}

		