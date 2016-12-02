<?php
/*
Template Name:Fullscreen Slider
*/
get_header();
?>   
<!-- fxSoftScale
fxPressAway
fxSideSwing
fxFortuneWheel
fxSwipe
fxPushReveal
fxSnapIn
fxLetMeIn
fxStickIt
fxArchiveMe
fxVGrowth
fxSlideBehind
fxSoftPulse
fxEarthquake
fxCliffDiving -->
<div class="main_container no-scroll">
	<div id="slides">
		<div class="slides-container <?php the_field('slider_animation');?>">
		   <?php
			$galleries = get_field('gallery');
			if($galleries) : 
			  foreach ($galleries as $item) { ?>
					
						<?php $cropClass = "preserve"; ?>
						<?php if($item['crop']): ?>
							<?php $cropClass = ""; ?>
						<?php endif; ?>

						<div class="overlay-container  <?php echo $cropClass; ?>">					
							<div class="overlay dark5 visible">
								<div class="center-helper-container">
									<div class="center-helper-inside text-center">
										<div class="container">
											<div class="text-center text-presentation">
												<h2 style="color: #fff;" class="intro-animation" data-animation="<?php echo $item['text_animation'];?>"><?php echo $item['text']; ?></h2>
												<?php if($item['link_text']):?>
													<a href="<?php echo $item['link']; ?>" class="button intro-animation" data-animation="<?php echo $item['link_animation'];?>"><?php echo $item['link_text']; ?></a>
												<?php endif;?>
											</div>
										</div>
									</div>
								</div>
								<div class="text-left text-light bottom-left">
									<h6 class="text-light no-margin"><?php echo $item['copyright']; ?></h6>
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
  				<div class="full-screen">
					<i class="fa fa-expand"></i>
				</div>
			</div>
		</nav>
	</div>
</div>
	<?php 
		$autoplay = 0;
		if(get_field('autoplay_duration')>0) 
			$autoplay = get_field('autoplay_duration');		
	?>
<script>
	var autoplay_duration =  <?php echo $autoplay; ?> ;
	jQuery(window).load(function($) {
		gallery_slider();
	});
</script>
<?php get_footer(); ?>