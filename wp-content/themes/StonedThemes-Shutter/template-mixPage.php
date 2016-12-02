<?php
/*
Template Name:Mix Page
*/
get_header();
?>   
<?php 
		$autoplay = 0;
		if(get_field('autoplay_duration',get_the_id())>0) 
			$autoplay = get_field('autoplay_duration',get_the_id());
		$slider_animation = get_field('slider_animation');
	?>
<div class="main_container scroll">
	<div class="home-alt">
		<div id="slides">
			<div class="slides-container <?php the_field('slider_animation');?>">
				<?php
				$galleries = get_field('gallery');
				if($galleries) : 
				  foreach ($galleries as $item) { ?>	
					
					<div class="overlay-container">
						<div class="overlay dark5 visible">
							<div class="center-helper-container">
								<div class="center-helper-inside text-center">
									<div class="container">
										<div class="text-center text-presentation">
											<h3 style="color: #fff;" ><?php echo $item['text']; ?></h3>
											<a href="<?php echo $item['link']; ?>" class="button"><?php echo $item['link_text']; ?></a>
										</div>
									</div>
								</div>
							</div>
							<div class="text-left text-light bottom-left">
								<h6 class="text-light no-margin"><?php echo $item['description']; ?></h6>
							</div>
						</div>
						
						<img src="<?php echo $item['image'];?>">
					</div>
				   <?php   }
				endif; ?>
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
	<?php if(is_active_sidebar('sidebar-2')):?>
	<div class="home-modules" style="padding: 60px 0;">
		<div class="container">
			<div class="row">			
				<?php  if ( !function_exists('dynamic_sidebar') ||  !dynamic_sidebar('sidebar-2') ) ?>					
			</div>
		</div>
	</div>
	<?php endif;?>
</div>
  <script>
  var autoplay_duration =  <?php echo $autoplay; ?> ;	
	jQuery(document).ready(function($) {
		var fx = "<?php echo $slider_animation; ?>";
		home_mix(fx);
	});
</script>
<?php get_footer(); ?>