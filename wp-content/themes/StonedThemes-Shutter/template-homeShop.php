<?php 
/*
Template Name: Gallery Shop
*/

get_header();
?>
<div class="main_container scroll">
	<div class="fixed-background" style="background: url('<?php the_field('background_image'); ?>')"></div>
	<?php setup_postdata($post);?>
	<?php if(get_the_content()!=''): ?>
		<div class="container">
			<div class="text-presentation">			 
				  <?php the_content();?>			 
			</div>
		</div>
	<?php endif; ?>
	<?php wp_reset_postdata();?>
	<div class="center-helper-container2 font-size-zero">
		<div class="center-helper-inside2 horizontal-small-centering">
			<div class="no-padding-container margin-bottom small-gallery-container">
				<div class="col-md-6"></div>
				<div class="col-md-6">
					<div class="nav2 pull-right float-clear text-center-responsive">
						<a id="prev" href=""><span><i class="fa fa-long-arrow-left"></i> <?php _e('PREV.','sth_lang');?></span></a>
						<span> / </span>
						<a id="next" href=""><span><?php _e('NEXT','sth_lang');?> <i class="fa fa-long-arrow-right"></i></span></a>
					</div>
				</div>

				<div class="clearfix"></div>
				<?php
					$counter = 0;
					$products = get_field('products');
					
					if($products) : ?>
				<?php wc_print_notices(); ?>
				<div id="small-gallery" class="home-products">
					<?php foreach ($products as $item) {  
						global $product;
						$product =  get_product( $item->ID );
						$image = wp_get_attachment_image_src(get_post_thumbnail_id( $item->ID ), 'small-thumbs' );
						?>
						
							<?php $img_lightbox = wp_get_attachment_image_src( get_post_thumbnail_id( $item->ID ), 'full' ); ?>
							<div class="item overlay-container intro-animation" 
								data-item-count="<?php echo $counter; ?>" 
								data-animation="fadeIn" 
								data-image="<?php echo $img_lightbox[0] ;?>" 
								data-desc=""
								data-video="">
									<div class="overlay dark text-center">
										<div class="center-helper-container">
											<div class="center-helper-inside">
												<h5 class="text-light no-margin animate-bottom-center">
													<a href="<?php echo get_permalink($item->ID); ?>">
														<b><?php echo get_the_title($item->ID);?></b>
													</a>
												</h5>
												<h6 class="text-light animate-top-center"><?php echo $product->get_price_html();?></h6>
 												<?php woocommerce_template_loop_add_to_cart();?>
											</div>
										</div>
									</div>
									<?php echo '<img src="'.$image[0].'"/>'; ?>
							</div>
						<?php 
						$counter++;
					} 
					?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<script>
	jQuery(document).ready(function($) {
		gallery_horizontalSmall();
	});
	
</script>
<?php get_footer(); ?>