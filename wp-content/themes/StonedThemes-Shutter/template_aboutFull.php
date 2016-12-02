<?php
/*
Template Name:About Full
*/
get_header();
?>
<div class="main_container no-scroll">
	<div class="col-md-4" id="shutter-info">
		<div class="shutter-container">
			<div class="img-container">
				<?php the_post_thumbnail('widget-portfolio'); ?>
			</div>
			<div class="about-info">
				<div class="about-title">
					<p class="paragraph-title no-margin"><?php the_field('author_position');?></p>
					<h3 class="no-margin"><?php the_field('author_name');?></h3>
				</div>

				 <?php setup_postdata($post);?>
					  <?php the_content();?>
				 <?php wp_reset_postdata();?>
			</div>
		</div>
	</div>
	<?php
	$slider = get_field('slider');
	if($slider) : ?>
	<div class="col-md-8 no-padding about-full-slider-container">
		<div id="slides">
			<div class="slides-container <?php the_field('slider_animation');?>">
			<?php	foreach ($slider as $image) { ?>					
				<img src="<?php echo $image['image'];?>">
				<?php }	?>
			</div>
			<nav class="slides-navigation nav1">
				<div class="slide-controls">
	      			<a href="#" class="prev"><i class="fa fa-angle-left"></i></a>
	      			<span>06/12</span>
	  				<a href="#" class="next"><i class="fa fa-angle-right"></i></a>
				</div>
				<div class="full-screen">
					<i class="fa fa-expand"></i>
				</div>
    		</nav>
		</div>
	</div>
</div>	
				
		<?php endif; ?>
	<?php 
		$autoplay = 0;
		if(get_field('autoplay_duration')>0) 
			$autoplay = get_field('autoplay_duration');		
	?>	
<script>
	var autoplay_duration =  <?php echo $autoplay; ?> ;
	jQuery(document).ready(function($) {
		aboutFull();	
	});
</script>

<?php get_footer(); ?>