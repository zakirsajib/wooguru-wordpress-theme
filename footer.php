<?php if ( is_active_sidebar( 'f_sidebar_one' ) ) : ?>
	<?php dynamic_sidebar( 'f_sidebar_one' );  ?>
<?php endif;?>


<?php if ( is_active_sidebar( 'f_sidebar_two' ) ) : ?>
	<footer class="footer push-ten">
		<?php dynamic_sidebar( 'f_sidebar_two' );  ?>
	</footer>
<?php endif;?>

</div> <!-- end after-masthead-wrapper -->
    <script type="text/javascript" defer src="<?php echo get_template_directory_uri()?>/js/autoptimize_ad23d30b973e520ebc8e6ee37b03a228.js"></script>
    
    <?php if(is_page('contact')):?>
    	<script type="text/javascript" defer src="<?php echo get_template_directory_uri()?>/js/autoptimize_e24cf424b44bb4e2c2a9204c4b0a71cc.js"></script>
	<?php endif;?>
	
	<?php if(is_page('terms')):?>
		<script type="text/javascript" defer src="<?php echo get_template_directory_uri()?>/js/autoptimize_4884f65fd24bd9578bb47a3bfcfe1a6a.js"></script>
	<?php endif;?>
	
	<?php if(is_page('woocommerce-affiliates')):?>
		<script type="text/javascript" defer src="<?php echo get_template_directory_uri()?>/js/autoptimize_9823b248fcd481d184edc34307f29ec1.js"></script>
	<?php endif;?>
<?php wp_footer();?>
</body>
</html>