<?php 
	/*Template Name: Affiliate*/
get_header('masthead');?>

					<div class="inlinemenu">
		                <div class="graybar">
		                    <div class="left"><i class="fa fa-bars"></i>Navigation</div>
		                    <div class="right"><i class="fa fa-chevron-down"></i></div>
		                </div>
		                <?php
							wp_nav_menu( array(
								'theme_location' => 'Primary'
							 ) );
						?>
		            </div>
	
		
	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<?php if ( have_posts() ) : ?>
				<?php while(have_posts()) : the_post();?>    
                    	<?php the_content();?>
			    <?php endwhile;?>
		<?php else : ?>
				<?php //get_template_part('not', 'found')?>
		<?php endif; // end have_posts() check ?>	
	</div>
<?php get_footer()?>