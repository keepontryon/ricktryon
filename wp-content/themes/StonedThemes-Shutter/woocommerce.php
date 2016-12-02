<?php 
	get_header();
    setup_postdata($post);
?>
<div class="main_container scroll">
	<div class="unstick">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<?php wc_print_notices();?>
					<?php woocommerce_content(); ?>
				</div>
				<div class="col-md-3">
					<?php  if ( !function_exists('dynamic_sidebar') ||  !dynamic_sidebar('sidebar-3') ) ?>
				</div>	
			</div>
		</div>
	</div>
</div>	
<script>
jQuery(window).load(function($) {
	pageScript();
});
</script>
<?php get_footer();?>