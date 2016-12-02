<?php
/*
Template Name:Panorama Alt
*/
get_header();
?>  	
<div class="main_container no-scroll">
	<div class="no-padding-container" style="height:100%;">
		<div class="main-slider vertical-slider">
			<div id="gallery-slider-small" style="height:100%;overflow:hidden">
				<?php
					$galleries = get_field('gallery');
					if($galleries) : 
					  foreach ($galleries as $item) { ?>
						<?php $cropClass = ""; ?>
						<?php if($item['crop']): ?>
						 <?php $cropClass = "owl-preserve";  ?>
						<?php endif; ?>
						<?php if($item['type']=='image'){ ?>
								<div class="item <?php echo $cropClass;?>">
									<div class="center-helper-container2">
										<div class="center-helper-inside2">
											<?php $image = wp_get_attachment_image($item['image'], 'full' );
											echo $image;?>	
											<div class="gallery-desc">
												<h6 class="text-light no-margin"><?php echo $item['description'];?></h6>
											</div>	
										</div>
									</div>
								</div>
							 <?php }
							else { ?>	
								<div class="item">
									<div class="center-helper-container2">
										<div class="center-helper-inside2 video">
											<a class="owl-video" href="<?php echo $item['video_url']; ?>">
											<?php $image = wp_get_attachment_image($item['video_thumb'], 'full' );
											echo $image;?>
											</a>
											<div class="gallery-desc">
												<h6 class="text-light no-margin"><?php echo $item['description'];?></h6>
											</div>	
										</div>
									</div>
								</div>
							<?php }
					}
				endif; ?>
			</div>
			<div class="no-padding-container">
				<nav class="nav1">
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
		<div class="gallery-thumbs-vertical-container">
			<div id="gallery-thumbs-vertical" style="height:100%;">
				<?php
				$galleries = get_field('gallery');
				$counter = 0;
				if($galleries) : 
				  foreach ($galleries as $item) { ?>
					<div class="item">
						<div class="overlay-container">
							<div class="overlay <?php if($counter==0) {echo 'dark5'; }?> visible"></div>
							<a href="" data-current="<?php echo $counter ;?>">
								<?php
								if($item['type']=='image'){ 
									$image = wp_get_attachment_image($item['image'], 'slider-thumbs' );
										echo $image;	
								 } else { 
									$image = wp_get_attachment_image($item['video_thumb'], 'slider-thumbs' );
										echo $image;
								}
								?>		
							</a>
						</div>
					</div>
				  <?php $counter++;   }
				  endif; ?>	
				
			</div>
		</div>
	</div>
</div> 		
<script>
	jQuery(window).load(function($) {
		var slider_animation = "<?php the_field('slider_animation'); ?>";
		gallery_sliderThumbsVertical(slider_animation);
	});
</script>
<?php get_footer(); ?>