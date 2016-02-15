<?php 
get_header('others');?>
	<div class="container">
		
		<?php if ( is_active_sidebar( 'blog_sidebar' ) ) : ?>
        	<div class="alternate defaultside">
        		<aside>
        			<?php dynamic_sidebar( 'blog_sidebar' );  ?>
        		</aside>
        	</div>
		<?php endif;?>
		
		
		<?php if ( have_posts() ) : ?>
		
		<div class="notification">
                <div class="left"><i class="fa fa-tags"></i>CATEGORY: <span><?php single_cat_title()?></span></div>
                <div class="right"><a href="<?php echo home_url();?>/blog"><i class="fa fa-times"></i></a></div>
        </div>
		
		
				<div class="content">
					<div class="postlist mainlist loop">
						<?php while(have_posts()) : the_post();?>    
	                    	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	                    		
	                    		<?php if(has_post_thumbnail()):?>
	                    		
	                    		  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
	                    		
	                    		<a href="<?php the_permalink()?>" class="largeimage postfeature" style="background-image:url(<?php echo $image[0]?>)"><div class="shadow"></div><h1><?php the_title()?></h1></a>
	                    		<?php else:?>
	                    			<h1><a href="<?php the_permalink()?>"><?php the_title()?></a></h1>
	                    		<?php endif;?>
	                    		<div class="info">
			                        <div class="left"> <i class="issticky fa fa-thumb-tack "></i><?php the_author_posts_link(); ?></div>
			                        <div class="right"> <a href="<?php the_permalink()?>" class="date"><i class="fa fa-clock-o"></i><?php the_time(get_option( 'date_format' )) ?></a>
			                            <div class="category"><i class="fa fa-tags"></i> <?php the_category(', ') ?></div>
			                        </div>
			                    </div>
	                    		
	                    		<div class="postcontents">
	                    			<?php the_excerpt();?>
	                    		</div>
	                    		
	                    		<div class="footer">
	                    			<a href="<?php the_permalink()?>" class="largesolid orange left">Read More</a> <a href="<?php the_permalink()?>#comments" class="commentsbutton largeoutline right"><i class="fa fa-comments"></i><?php wp_count_comments(); ?> </a>
	                    		</div>
	                    	</article>
					    <?php endwhile;?>
					</div>
					
					<div class="postnav">
					
					</div>
					
					
				</div>
		<?php else : ?>
				<div class="content">
					<?php get_template_part('not', 'found')?>
				</div>
		<?php endif; // end have_posts() check ?>	
	</div>
<?php get_footer('blog')?>