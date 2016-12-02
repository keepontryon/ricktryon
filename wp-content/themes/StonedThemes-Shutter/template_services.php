<?php
/*
Template Name:Services
*/
get_header();
?>  
<div class="main_container scroll">
	<div class="unstick">
		<div class="container">
		<?php $posts = get_field('services');
		  foreach( $posts as $post ): 
		  if (!is_numeric($post)):
	           setup_postdata($post);?>
				 <?php if(get_field('type',$post->ID)=='font-awesome')	{ ?>
					<div class="col-lg-4 col-sm-6 service intro-animation" data-animation="fadeIn">
						<div class="mosaic-square">
							<div class="mosaic-inside text-center img-circle bordered">
								<div class="center-helper-container">
									<div class="center-helper-inside">
										<div class="service-content">
											<i class="fa <?php the_field('font_awesome',$post->ID); ?> fa-3x brand-color"></i>
											<h4><?php echo get_the_title( $post->ID ); ?></h4>
											<?php the_excerpt( $post->ID); ?>
											<a href="<?php echo get_permalink( $post->ID ); ?>" class="button"><?php _e('READ MORE','sth_lang');?></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } else { ?>
					<div class="col-lg-4 col-sm-6 service intro-animation" data-animation="fadeIn">
						<div class="mosaic-square">
							<div class="mosaic-inside text-center img-circle">
								<div class="overlay-container">
									<div class="overlay dark img-circle"></div>
									<?php $img = wp_get_attachment_image_src( get_field('image'), 'portfolio-square3' ); ?>
									<img src="<?php echo $img[0];// the_field('image',$post->ID); ?>">
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			  <?php endif; ?>
	     <?php endforeach; ?> 
		</div>
	</div>
</div>
<script>
	jQuery(document).ready(function($) {
		services();
	});
</script>
<?php get_footer(); ?>
