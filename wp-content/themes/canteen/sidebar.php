<?php
	if ( ! is_active_sidebar( 'default-sidebar' ) ) {
		return;
	}
?>

<div class="col-md-4 sidebar fixed-sidebar">
	<div class="theiaStickySidebar">
		<?php  if ( function_exists( 'dynamic_sidebar' ) ){ 
			if ( is_active_sidebar( 'default-sidebar' ) ) { dynamic_sidebar( 'default-sidebar' );}
		} ?>
	</div><!--  End StickySidebar  -->
</div><!--  End Sidebar  -->
