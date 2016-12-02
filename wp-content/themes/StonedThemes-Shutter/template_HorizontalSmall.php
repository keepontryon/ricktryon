<?php
/*
Template Name:Horizontal Small
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
					if($terms) {
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
								<div class="item overlay-container" data-item-count="<?php echo $counter; ?>" data-animation="fadeIn" data-image="<?php echo $img_lightbox[0] ;?>" data-desc="<?php echo $item['description']; ?>" data-video="">
									<div class="overlay dark">
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
									</div>	
									<?php $image = wp_get_attachment_image($item['image'], 'small-thumbs' );
										echo $image;?>
								</div>
							<?php }
							else { ?>	
								<?php $img_lightbox = wp_get_attachment_image_src( $item['video_thumb'], 'full' ); ?>
								<div class="item overlay-container" 
									data-item-count="<?php echo $counter; ?>" 
									data-animation="fadeIn" 
									data-image="<?php echo $img_lightbox[0] ;?>" 
									data-desc="<?php echo $item['description']; ?>" 
									data-video="<?php echo $item['video_url']; ?>">
									<div class="overlay dark">
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
									</div>	
									<?php $image = wp_get_attachment_image($item['video_thumb'], 'small-thumbs' );
									echo $image;?>
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
					<?php 	$taxonomies=get_terms('gallery', array(
														'orderby'    => 'count',
														'hide_empty' => 0
		
													 ) );
					if($taxonomies):
					?>
						<div class="text-center">
							<div class="alt-filtering" style="padding-top: 30px;">
								<a href="">Filtering</a>
								<ul class="list-unstyled no-margin">
									<li><a href=""><?php _e('All','sth_lang');?></a></li>
									<?php 
										foreach ($taxonomies as $taxonomy ) {
										  echo '<li><a href="">'. $taxonomy->name. '</a></li>';
										}
									?>
								</ul>
							</div>	
						</div>
					<?php endif; ?>
					<div class="col-md-6">
						<?php 	if($taxonomies): ?>
							<div class="filters pull-left">
								<ul class="list-unstyled list-inline" id="filter">
									<li class="filter-text">
										<a class="text-uppercase">Filter <i class="fa fa-caret-down"></i></a>
										<ul class="list-unstyled animated fadeIn">
											<li><a href=""><?php _e('All','sth_lang');?></a></li>
											<?php 
												foreach ($taxonomies as $taxonomy ) {
												  echo '<li><a href="">'. $taxonomy->name. '</a></li>';
												}
											?>
										</ul>
									</li>
								</ul>
							</div>
						<?php endif; ?>	
					</div>

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
						$galleries = get_field('gallery');
						if($galleries) : ?>
					<div id="small-gallery">
					<?php foreach ($galleries as $item) { ?>
						<?php if($item['type']=='image'){ ?>
							<?php $img_lightbox = wp_get_attachment_image_src( $item['image'], 'full' ); ?>
							<div class="item overlay-container intro-animation" 
								data-item-count="<?php echo $counter; ?>" 
								data-animation="fadeIn" 
								data-image="<?php echo $img_lightbox[0] ;?>" 
								data-desc="<?php echo $item['description']; ?>"
								data-video="">
								<div class="overlay dark">
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
								</div>	
								<?php $image = wp_get_attachment_image($item['image'], 'small-thumbs' );
									echo $image;?>							
							</div>
						<?php }
							else { ?>
								<?php $img_lightbox = wp_get_attachment_image_src( $item['video_thumb'], 'full' ); ?>
								<div class="item overlay-container" 
									data-item-count="<?php echo $counter; ?>" 
									data-animation="fadeIn" 
									data-image="<?php echo $img_lightbox[0] ;?>" 
									data-desc="<?php echo $item['description']; ?>" 
									data-video="<?php echo $item['video_url']; ?>">
									<div class="overlay dark">
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
									</div>	
									<?php $image = wp_get_attachment_image($item['video_thumb'], 'small-thumbs' );
									echo $image;?>
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
		gallery_horizontalSmall();
		$('body').on('click', '.overlay-container', function(){
			var to = $(this).data('item-count');
			var images = $('.owl-item').not('.cloned').find('.overlay-container');
			var desc = $('.owl-item').not('.cloned').find('.overlay-container');
			var arrDesc = [];
			desc.each(function(){
				arrDesc.push($(this).data('desc'));
			});
			var arr = [];
			images.each(function(){
				if($(this).data('video') != ""){
					arr.push($('<img>').attr('src', $(this).data('image')).attr('data-video', $(this).data('video')).addClass('video-item'));	
				}
				else{
					arr.push($('<img>').attr('src', $(this).data('image')));	
				}
				//console.log($('<img>').attr('src', $(this).data('image')).attr('data-video', $(this).data('video')));
			});
			var jQueryObjArr = $($.map(arr, function(el){return $.makeArray(el)}));
			var sbEffect = "<?php the_field('slider_animation'); ?>";
			
			displayLightBox(to, jQueryObjArr, arrDesc, sbEffect);
		});
	});
	
</script>
<?php get_footer(); ?>