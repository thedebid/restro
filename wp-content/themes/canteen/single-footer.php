<?php
/*
Single Footer
*/
get_header(); ?>
        
    <?php while (have_posts()) : the_post(); ?>
        
        <div class="canteen-custom-footer clearfix">
        	<?php the_content(); ?>
        </div>

    <?php endwhile; ?>
        
<?php  get_footer(); ?>