<?php 
	get_header('blog')
?>

<div class="container">
		
		<?php if(has_post_thumbnail()):?>
			<?php if ( is_active_sidebar( 'single_sidebar' ) ) : ?>
	        	<div class="alternate pageside">
	        		<aside>
	        			<?php dynamic_sidebar( 'single_sidebar' );  ?>
	        		</aside>
	        	</div>
			<?php endif;?>
		<?php else:?>
			<?php if ( is_active_sidebar( 'single_sidebar' ) ) : ?>
	        	<div class="alternate defaultside">
	        		<aside>
	        			<?php dynamic_sidebar( 'single_sidebar' );  ?>
	        		</aside>
	        	</div>
			<?php endif;?>
		<?php endif;?>
		<div class="content">
			
						
			
			<div class="postlist">
				<?php while(have_posts()) : the_post();?> 
					<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
						
						<?php if(!has_post_thumbnail()):?>
						<div class="header">
							<h1><?php the_title()?></h1>
						</div>
						<div class="info">
				            <div class="left"><i class="issticky fa fa-thumb-tack "></i><?php the_author_posts_link(); ?></div>
				            <div class="right"> <a href="<?php the_permalink()?>" class="date"><i class="fa fa-clock-o"></i><?php the_time(get_option( 'date_format' )) ?></a><div class="category"><i class="fa fa-tags"></i> <?php the_category(', ') ?></div>
				            </div>
				        </div>
				        <?php endif;?>
				        <div class="postcontents">
		                    <?php the_content();?>
		                </div>
				        
				        <div class="postfooter">
                        <div class="social"> <a href="http://twitter.com/share?text=<?php the_title()?>&url=<?php the_permalink()?>" onclick="window.open(this.href, 'twitter-share', 'width=550,height=235');return false;" class="largesolid twitter"><i class="fa fa-twitter"></i>Twitter</a> <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink()?>" onclick="window.open(this.href, 'facebook-share','width=580,height=296');return false;" class="largesolid facebook"><i class="fa fa-facebook"></i>Facebook</a> <a href="https://plus.google.com/share?url=<?php the_permalink()?>" onclick="window.open(this.href, 'google-plus-share', 'width=490,height=530');return false;" class="largesolid google"><i class="fa fa-google-plus"></i>Google+</a></div>
                        <div class="subscription-box bg-white push-30">
                            <h3><span class="icn-newsletter"></span> Actionable marketing advice for startups delivered to your inbox</h3>
                            <form accept-charset="UTF-8" action="https://www.aweber.com/scripts/addlead.pl" class="clearfix push-ten af-form-wrapper" method="post" target="_new">
                                <div style="display: none;">
                                    <input name="meta_web_form_id" type="hidden" value="1723654071">
                                    <input name="meta_split_id" type="hidden" value="">
                                    <input name="listname" type="hidden" value="awlist3866746">
                                    <input id="redirect_ee270bd56e1e65e5aab6901838f07a70" name="redirect" type="hidden" value="http://wooguru.net/email-success.html">
                                    <input name="meta_adtracking" type="hidden" value="WooGuru_Newsletter_Subscription_Form">
                                    <input name="meta_message" type="hidden" value="1001">
                                    <input name="meta_required" type="hidden" value="email">
                                    <input name="meta_tooltip" type="hidden" value="email||Your email">
                                </div>
                                <div class="af-form" id="af-form-1723654071">
                                    <div class="af-body af-standards" id="af-body-1723654071">
                                        <div class="af-element">
                                            <label class="previewLabel" for="awf_field-73931869"></label>
                                            <div class="af-textWrap">
                                                <input class="text" id="awf_field-73931869" name="email" onblur="if (this.value == '') { this.value='Your email';}" onfocus="if (this.value == 'Your email') { this.value = ''; }" tabindex="500" type="text" value="Your email">
                                            </div>
                                            <div class="af-clear"></div>
                                        </div>
                                        <div class="af-element buttonContainer">
                                            <input class="submit" name="submit" tabindex="501" type="submit" value="Subscribe">
                                            <div class="af-clear"></div>
                                        </div>
                                    </div>
                                </div>
                                <div style="display: none;"><img alt="" src="https://forms.aweber.com/form/displays.htm?id=jOxMzGysLAzsjA=="></div>
                            </form> No spam. Unsubscribe anytime.</div>
                    </div>
                    <hr/>

				        
				        
				        <?php content_nav(); ?>
    
    
						<?php comments_template('', true ); ?>
				        
							
					</article>	
				<?php endwhile;?>
			</div>	
		</div>
</div>
<?php get_footer('blog');?>