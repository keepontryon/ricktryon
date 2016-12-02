<?php
/*
Template Name:Gallery All
*/
get_header();
?>
<div class="main_container scroll">
	<div class="container">
		<div class="portfolio-title">
			<div class="text-center text-presentation unshadow">
				<h3><?php the_title(); ?></h3>
				 <?php setup_postdata($post);?>
				  <?php the_content();?>
				 <?php wp_reset_postdata();?>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<?php $layout = get_field('layout');?>
	<div class="container" id="portfolio-content">
		<div class="row portfolio">
		<?php 

			$posts = get_field('pages');

			if( $posts ): ?>
			<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
				<?php setup_postdata($post); ?>
					<div class="item col-xs-12 col-md-3" data-time="<?php the_time('Y/m/d g:i:s')?>">
							<div class="mosaic-square">
								<div class="mosaic-inside">
									<div class="overlay-container">
										<div class="overlay dark">
											<!--<a href="" class="like text-center pull-right" data-id="<?php echo get_the_ID();?>"><i class="fa fa-heart-o"></i></a>-->
											<div class="text-left text-light bottom-left">
												<h6 class="text-light"><?php echo $post_term_name; ?></h6>
												<a href="<?php the_permalink(); ?>"><h5 class="text-light no-margin"><b><?php the_title(); ?></b></h5></a>
											</div>
										</div>	
										<?php    $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'portfolio-square3'); ?>
										<img src="<?php echo $large_image_url[0];?>" alt="img">
										
									</div>
								</div>
							</div>
						</div>
				<?php endforeach; ?>
				<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			<?php endif; ?>
		</div>
	</div> 	
</div>
<script>
	jQuery(window).load(function($) {
		var col = '.col-md-3';
		portfolioSquare3(col);
	});
</script>
<?php get_footer(); ?>