<?php get_header();?>
<?php
    setup_postdata($post);
?>
<div class="main_container scroll">
	<div class="unstick">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3><?php the_title(); ?></h3>
					<?php the_content();?>
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