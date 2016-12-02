<?php
/*
Template Name:Three Circles
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
					 foreach( $terms as $term ){
							if($category==$term->name)
								$go = true;
						}
						if($category=='All')
							$go = true;
						if($go) {
							?>
							<?php $img_lightbox = wp_get_attachment_image_src( $item['image'], 'full' ); ?>
							<div class="item img-circle overlay-container animated fadeIn" data-item-count="<?php echo $counter; ?>" data-image="<?php echo $img_lightbox[0] ;?>" data-desc="<?php echo $item['description']; ?>">
								<div class="overlay dark text-center img-circle">
									<div class="overlay"></div>
									<div class="center-helper-container">
										<div class="center-helper-inside">
											<?php $terms = $item['categories'];?>
											<h6 class="text-light animate-top-center">
												<?php foreach( $terms as $term ): ?> 
														<?php echo $term->name; ?>
												<?php endforeach; ?>
											</h6>
											<h5 class='text-light  animate-bottom-center'><b><?php echo $item['text']; ?></b></h5>
										</div>
									</div>
								</div>
								<?php 
									$image = wp_get_attachment_image($item['image'], 'gallery-circle' );
									echo $image;
								?>
							</div>
							<?php

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
	<div class="unstick">
		<div class="container">		
			<div class="text-center">
				<div class="alt-filtering" style="padding-top: 30px;">
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
			<div class="filters pull-left">
				<ul class="list-unstyled list-inline no-margin" id="filter">
					<li class="filter-text">
						<a class="text-uppercase">Filter <i class="fa fa-caret-down"></i></a>
						<ul class="list-unstyled animated fadeIn">
							<li><a href=""><?php _e('All','sth_lang');?></a></li>
							<?php //wp_list_cats('hide_empty=0');?>
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
				</ul>
			</div>
			<div id="" class="nav2 pull-right float-clear text-center-responsive">
				<a id="prev" href=""><span><i class="fa fa-long-arrow-left"></i> <?php _e('PREV.','sth_lang');?></span></a>
				<span> / </span>
				<a id="next" href=""><span><?php _e('NEXT','sth_lang');?> <i class="fa fa-long-arrow-right"></i></span></a>
			</div>
			<div class="clearfix"></div>
			<div style="position: relative;">
				<!-- <div class="left-gradient-overlay"></div>
				<div class="right-gradient-overlay"></div> -->
				<div class="row">
				<?php
						$counter = 0;
						$galleries = get_field('gallery');
						if($galleries) : ?>
					<div class="circle-gallery" id="gallery_container">
						<?php foreach ($galleries as $item) { ?>
						<?php $img_lightbox = wp_get_attachment_image_src( $item['image'], 'full' ); ?>
						<div class="item img-circle overlay-container" data-item-count="<?php echo $counter; ?>" data-image="<?php echo $img_lightbox[0] ;?>" data-desc="<?php echo $item['description']; ?>">
							<div class="overlay dark text-center img-circle">
								<div class="overlay">
									<!-- <a href="" class="like centered"><i class="fa fa-heart-o"></i></a> -->
								</div>
								<div class="center-helper-container">
									<div class="center-helper-inside">
										<?php $terms = $item['categories'];?>
										<h6 class="text-light animate-top-center">
											<?php foreach( $terms as $term ): ?> 
													<?php echo $term->name; ?>
											<?php endforeach; ?>
										</h6>
										<h5 class='text-light animate-bottom-center'><b><?php echo $item['text']; ?></b></h5>
									</div>
								</div>
							</div>
							<?php 
								$image = wp_get_attachment_image($item['image'], 'gallery-circle' );
								echo $image;
							?>
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
</div>   
  	<script>
	jQuery(document).ready(function($) {
		gallery_circle();
		jQuery('body').on('click', '.overlay-container', function(){
			var to = $(this).data('item-count');
			var images = $('.owl-item').not('.cloned').find('.overlay-container');
			var desc = $('.owl-item').not('.cloned').find('.overlay-container');
			var arrDesc = [];
			desc.each(function(){
				arrDesc.push($(this).data('desc'));
			});
			var arr = [];
			images.each(function(){
				arr.push($('<img>').attr('src', $(this).data('image')));
			});
			var jQueryObjArr = $($.map(arr, function(el){return $.makeArray(el)}));
			var sbEffect = "<?php the_field('slider_animation'); ?>";
			displayLightBox(to, jQueryObjArr, arrDesc, sbEffect);
		});
	});
  </script>
<?php get_footer(); ?>