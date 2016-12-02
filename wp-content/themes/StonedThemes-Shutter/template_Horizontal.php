<?php
/*
Template Name:Horizontal
*/

/*Categorisation*/
	if(isset($_REQUEST["sth_categorisation"])):    	
 			if(isset($_POST["category"])):	
				
				$category  = $_POST["category"];
				$galleries = get_field('gallery');
				$counter = 0;
				
				foreach ($galleries as $item) { 
				
					$terms = $item['categories'];
					$go = false;
					 if($terms){
						 foreach( $terms as $term ){
								if($category==$term->name)
									$go = true;
							}
						}
						if($category=='All')
							$go = true;
						if($go) {
							?>
							<?php if($item['type']=='image'){ ?>
								<?php $img_lightbox = wp_get_attachment_image_src( $item['image'], 'full' ); ?>
								<div class="overlay-container scaleAnimation" data-item-count="<?php echo $counter; ?>" data-desc="<?php echo $item['description']; ?>">
									<div class="overlay dark text-center">
										<div class="center-helper-container">
											<div class="center-helper-inside">
												<?php $terms = $item['categories'];?>
													<?php if($terms) : ?>
														<h6 class="text-light animate-top-center">
															<?php foreach( $terms as $term ): ?> 
																	<?php echo $term->name; ?>
															<?php endforeach; ?>
														</h6>
													<?php endif; ?>	
												<h5 class="text-light no-margin animate-bottom-center"><b><?php echo $item['text']; ?></b></h5>
											</div>
										</div>
									</div>
								   <img src="<?php echo $img_lightbox[0];?>" alt="grozny1" width="600" height="450" />
								</div>
							<?php }
							else { ?>
								<?php $img_lightbox = wp_get_attachment_image_src( $item['video_thumb'], 'full' ); ?>
								<div class="overlay-container scaleAnimation" data-item-count="<?php echo $counter; ?>" data-desc="<?php echo $item['description']; ?>">
									<div class="overlay dark text-center">
										<div class="center-helper-container">
											<div class="center-helper-inside">
												<?php $terms = $item['categories'];?>
													<?php if($terms) : ?>
														<h6 class="text-light animate-top-center">
															<?php foreach( $terms as $term ): ?> 
																	<?php echo $term->name; ?>
															<?php endforeach; ?>
														</h6>
													<?php endif; ?>	
												<h5 class="text-light no-margin animate-bottom-center"><b><?php echo $item['text']; ?></b></h5>
											</div>
										</div>
									</div>
									<img src="<?php echo $img_lightbox[0];?>" class="video-item" data-video="<?php echo $item['video_url']; ?>" alt="grozny1" width="600" height="450" />
								</div>
							<?php
							}
					$counter++;
					}
				} ?>
				
				<?php
			 endif;
	die();endif; 
	/*Categorisation*/	
get_header();	
?>
<div class="main_container no-scroll">
	<div class="fixed-background" style="background: url('<?php the_field('background_image'); ?>')"></div>
	<div class="center-helper-container">
		<div class="center-helper-inside">
			<div class="fluid-container">

				<div class="text-center">
					<div class="alt-filtering">
						<a href="">Filtering</a>
						<ul class="list-unstyled no-margin">
							<li><a href=""><?php _e('All','sth_lang');?></a></li>
							<?php 
								$taxonomies=get_terms('gallery', array(
														'orderby'    => 'count',
														'hide_empty' => 0
													 ) );
								foreach ($taxonomies as $taxonomy ) {
								  echo '<li><a href="">'. $taxonomy->name. '</a></li>';
								}
							?>
						</ul>
					</div>	
				</div>

				<div id="navi" class="pull-right nav2 float-clear text-center-responsive">
					<a id="prev" href=""><span><i class="fa fa-long-arrow-left"></i> <?php _e('PREV.','sth_lang');?></span></a>
					<span> / </span>
					<a id="next" href=""><span><?php _e('NEXT','sth_lang');?> <i class="fa fa-long-arrow-right"></i></span></a>
				</div>
				
				<div class="filters pull-left">
					<ul class="list-unstyled list-inline" id="filter">
						<li class="filter-text">
							<span class="text-uppercase"><?php _e('Filter','sth_lang');?> <i class="fa fa-caret-down"></i></span>
							<ul class="list-unstyled fadeIn animated">
								<?php //wp_list_cats('hide_empty=0');?>
								<li><a href=""><?php _e('All','sth_lang');?></a></li>
								<?php 
									$taxonomies=get_terms('gallery', array(
															'orderby'    => 'count',
															'hide_empty' => 0
														 ) );
									foreach ($taxonomies as $taxonomy ) {
									  echo '<li><a href="">'. $taxonomy->name. '</a></li>';
									}
								?>
							</ul>
						</li>
						<!-- <li><span><a href="">Popular</a></span></li>
						<li><span><a href="">Latest</a></span></li> -->
					</ul>
				</div>	
				
				<div class="clearfix"></div>
				
				<?php
					$counter = 0;
					$galleries = get_field('gallery');
					if($galleries) : ?>
						<div class="gallery-horizontal"  id="gallery_container">
							<?php foreach ($galleries as $item) { ?>
							<?php if($item['type']=='image'){ ?>
							<?php  $img_lightbox = wp_get_attachment_image_src( $item['image'], 'full' ); ?>
									<div class="overlay-container scaleAnimation" data-item-count="<?php echo $counter; ?>" data-desc="<?php echo $item['description']; ?>">
										<div class="overlay dark text-center">
											<div class="center-helper-container">
												<div class="center-helper-inside">
													<?php $terms = $item['categories'];?>
														<?php if($terms) : ?>
															<h6 class="text-light animate-top-center">
																<?php foreach( $terms as $term ): ?> 
																		<?php echo $term->name; ?>
																<?php endforeach; ?>
															</h6>
														<?php endif; ?>
													<h5 class="text-light no-margin animate-bottom-center"><b><?php echo $item['text']; ?></b></h5>
												</div>
											</div>
										</div>
										<img src="<?php echo $img_lightbox[0];?>" alt="grozny1" width="600" height="450" />
									</div>
							<?php }
								else { ?>
									<?php $img_lightbox = wp_get_attachment_image_src( $item['video_thumb'], 'full' ); ?>
									<div class="overlay-container scaleAnimation" data-item-count="<?php echo $counter; ?>" data-desc="<?php echo $item['description']; ?>">
										<div class="overlay dark text-center">
											<div class="center-helper-container">
												<div class="center-helper-inside">
													<?php $terms = $item['categories'];?>
														<?php if($terms) : ?>
															<h6 class="text-light animate-top-center">
																<?php foreach( $terms as $term ): ?> 
																		<?php echo $term->name; ?>
																<?php endforeach; ?>
															</h6>
														<?php endif; ?>	
													<h5 class="text-light no-margin animate-bottom-center"><b><?php echo $item['text']; ?></b></h5>
												</div>
											</div>
										</div>
										<img src="<?php echo $img_lightbox[0];?>" class="video-item" data-video="<?php echo $item['video_url']; ?>" alt="grozny1" width="600" height="450" />
									</div>
								<?php	
								}
							
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
		$('body').on('click', '.overlay-container', function(){
			var to = $('.overlay-container').index(this);
			var images = $('.overlay-container img');
			var desc = $('.overlay-container');
			var arrDesc = [];
			desc.each(function(){
				arrDesc.push($(this).data('desc'));
			});
			var sbEffect = "<?php the_field('slider_animation'); ?>";
			displayLightBox(to, images, arrDesc, sbEffect);
		});
	});

	jQuery(window).load(function($) {
		gallery_horizontal();
	});
</script>
<?php get_footer(); ?>