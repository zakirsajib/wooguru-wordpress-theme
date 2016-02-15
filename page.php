<?php 
get_header('contact');?>
<div class="row">
	
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
                    <div class="small-12 column text-center">
                    	<?php the_content();?>
			        </div>
			    <?php endwhile;?>
		<?php else : ?>
				<?php //get_template_part('not', 'found')?>
		<?php endif; // end have_posts() check ?>	
	</div>
</div>
<?php get_footer()?>