<?php
/*
Template Name:Panorama
*/
get_header();
?>  
<div class="main_container no-scroll">
	<div class="no-padding-container" id="main-container" style="height: 100%;">
		<div class="col-md-12 gallery-container thumbs-gallery" style="position: relative;">
			<div id="gallery-slider-small" style="height: 100%;">
			<?php
			$galleries = get_field('gallery');
			if($galleries) : 
			  foreach ($galleries as $item) { ?>
				<?php $cropClass = ""; ?>
				<?php if($item['crop']): ?>
				 <?php $cropClass = "owl-preserve";  ?>
				<?php endif; ?>
				<?php if($item['type']=='image'){ ?>
						<div class="item intro-animation <?php echo $cropClass;?>" data-animation="fadeIn">	
							<div class="center-helper-container2">
								<div class="center-helper-inside2">
									<?php ////$image = wp_get_attachment_image($item['image'], 'full' );
										//echo $image;?>
									<?php $image = wp_get_attachment_image_src( $item['image'], 'full'); ?>
									<img class="owl-lazy" data-src="<?php echo esc_url($image[0]);?>" alt="">

										<!-- <img class="owl-lazy" data-src="" alt=""> -->
									<div class="gallery-desc">
										<h6 class="text-light no-margin"><?php echo $item['description'];?></h6>
									</div>	
								</div>
							</div>				
						</div>
					<?php }
					else { ?>
						<div class="item intro-animation <?php echo $cropClass;?>" data-animation="fadeIn">
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
		<div class="clearfix"></div>
		<div class="col-md-12 gallery-pagination-container thumbs-gallery">
			<div id="slider-small-pagination" >
			<?php
			$galleries = get_field('gallery');
			$counter = 0;
			if($galleries) : 
			  foreach ($galleries as $item) { ?>
				<div class="item overlay-container intro-animation" data-animation="fadeIn">
					<div class="overlay <?php if($counter==0) {echo 'dark'; }?> visible"></div>
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
			  <?php $counter++;   }
			  endif; ?>	
			</div>
		</div>
	</div>
</div>
<script>
	jQuery(document).ready(function($) {
		var slider_animation = "<?php the_field('slider_animation'); ?>";
		gallery_sliderThumbs(slider_animation);
	});
</script>
<?php get_footer(); ?>