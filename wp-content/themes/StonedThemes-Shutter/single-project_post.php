<?php get_header();?>
<?php
setup_postdata( $post );
?>
<div class="main_container scroll">
	<div class="unstick">
		<div class="container">
			<div id="navi" class="pull-right nav2">
				<?php previous_post_link('%link',__('<span><i class="fa fa-toggle-left"></i> Previous Project</span>')); ?>
				<span>/</span>  
				<?php next_post_link('%link',__('<span>Next Project <i class="fa fa-toggle-right"></i></span>')); ?>  			
			</div>
			<h4 class="title"><?php the_title();?></h4>
			
		<div class="single-project-media">

				<?php if (get_field('slider_display')=='slider') {?>
				   <?php $slider = get_field('slider');  ?>
					  <?php if( $slider ): ?>					   
							<div class="single-slider">
							<?php foreach( $slider as $slider_item ):?>  
							  <?php $image = wp_get_attachment_image_src($slider_item['image'],'portfolio-single-slider');?>
									<div>
										<img src="<?php echo $image[0];?>">
									</div>
								<?php  endforeach; ?>					
							</div>
							<nav class="slides-navigation nav1">
								<div class="slide-controls">
									<a href="#" class="prev"><i class="fa fa-angle-left"></i></a>
									<span>6/8</span>
									<a href="#" class="next"><i class="fa fa-angle-right"></i></a>
								</div>
							</nav>
								 
					  <?php endif; ?>
				<?php } ?>		

				<?php if (get_field('slider_display')=='mosaic') {?>
				 <?php $slider = get_field('slider');  ?>
					  <?php if( $slider ): ?>
					   <?php $counter = 0;
							foreach( $slider as $slider_item ):?>  
							<?php $img_lightbox = wp_get_attachment_image_src( $slider_item['image'], 'full' ); ?>
							<div class="col-sm-3 item">
								<a href="" data-item-count="<?php echo $counter; ?>">
									<div class="mosaic-square">
										<div class="mosaic-inside">
											<div class="overlay-container" data-image="<?php echo $img_lightbox[0] ;?>">
												<div class="overlay dark5"></div>
												 <?php $image = wp_get_attachment_image_src($slider_item['image'],'portfolio-square3');?>
												<img src="<?php echo $image[0];?>" alt="img">
											</div>
										</div>
									</div>
								</a>
							</div>
						<?php $counter++; endforeach; ?>	                 
					 <?php endif; ?>
					<?php } ?>	
					
		 
				  <?php if (get_field('slider_display')=='masonry') {?>
					 <?php $slider = get_field('slider');  ?>
						  <?php if( $slider ): ?>
						   <?php $counter = 0;
								foreach( $slider as $slider_item ):?>    
								<?php $img_lightbox = wp_get_attachment_image_src( $slider_item['image'], 'full' ); ?>
								<div class="col-sm-3 item">
									<a href="" data-item-count="<?php echo $counter; ?>">
										<div class="overlay-container" data-image="<?php echo $img_lightbox[0] ;?>">
											<div class="overlay dark5"></div>
											 <?php $image = wp_get_attachment_image_src($slider_item['image'],'portfolio-masonry');?>
											<img src="<?php echo $image[0];?>" alt="img">
										</div>
									</a>
								</div>
							<?php $counter++; endforeach; ?>	                 
						 <?php endif; ?>
					<?php } ?>
		
		</div>

		<div class="single-project-meta">
			<div class="row">
				<div class="col-md-9">
					<h4 class="title"><?php _e('description','sth_lang');?></h4>
					<?php the_content();?>
				</div>
				 <?php if(!get_field('disable_project_social_shares','options')):?>
					<div class="col-md-3">
					  <h4 class="title"><?php _e('Share','sth_lang'); ?></h4>
	                  <div class="post-shares">
						<?php addSocialShareButtons(get_field('share_posts','options')) ?>
					  </div>
					  <h4 class="title">like</h4>	
					  <p class="like-paragraph"><a href="" class="like1" data-id="<?php echo get_the_ID();?>"><i class="fa fa-heart like-icon"></i> <b><?php echo get_post_meta(get_the_ID(),'stoned_like',true);?></b> People liked this</a></p>
					</div>
				 <?php endif ; ?>
			</div>
		</div>

		</div> <!-- Main Container -->
	</div>	
</div>
	<script>
	var slider_type = "<?php echo get_field('slider_display');?>";
	jQuery(window).load(function($) {
		singleProject();
	});
	jQuery('.single-project-media .item a').on('click', function(e){
		e.preventDefault();
		var to = $(this).data('item-count');
		var images = $('.overlay-container');
		var arr = [];
		images.each(function(){
			arr.push($('<img>').attr('src', $(this).data('image')));
		});
		var jQueryObjArr = $($.map(arr, function(el){return $.makeArray(el)}));
		displayLightBox(to, jQueryObjArr);
	});
	</script>
<?php get_footer();?>	