<?php get_header();?>	
<div class="main_container scroll">
	<div class="unstick">
		<div class="container">
			<div class="row">	
				<div class="col-md-9">
					<div style="padding: 0 15px;">
						<?php if($wp_query->have_posts()){?>
							<h4 class="pull-left title"><?php _e('Search Results','sth_lang');?></h4>
						<?php } else {?>
							 <h4 class="pull-left title"><?php _e('No Result found','sth_lang'); ?></h4>
							 <p class="text-center"> <?php _e("Sorry we couldn't find any results.",'sth_lang'); ?></p>
							 <p class="smile text-center"><i class="fa fa-meh-o fa-3x"></i></p>
						<?php }?>
					</div>
				</div>	
				<div class="col-md-9">
					
					<div id="blog2-container">
				
						<?php  while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
					
						<?php
							$post_categories  = get_the_category();
							$post_categories_names = '';
							$post_categories_realNames = '';
							if($post_categories){
								foreach ($post_categories as $post_cat){
									$post_categories_names .= str_replace(' ', '_',$post_cat->name)." ";
									$post_categories_realNames .= $post_cat->name.' ';
								}
							}
						?>
						<div class="col-md-4 <?php echo $post_categories_names;?>">
							<div class="blog2-item">
								<?php if(has_post_thumbnail()): ?>
									<div class="img-container">
										<div class="overlay-container">
											<div class="overlay dark"></div>
											
												<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
												<img src="<?php echo $url;?>" alt="blog-item">
											
										</div>
									</div>
								<?php endif; ?>
								<p class="paragraph-title no-margin"><?php echo $post_categories_names;?></p>
								<h4><a href="<?php echo get_permalink();?>" class="st_ajaxLink"><?php the_title(); ?></a></h4>
								<p><a href="<?php echo get_permalink();?>" class="st_ajaxLink"><?php the_excerpt(); ?></a></p>
							</div>
						</div>
						<?php endwhile; ?> 
					</div>
					<?php if($wp_query->max_num_pages != 1):?>	
							<div class="col-md-12">
								<div id="pagination1" class="text-center nav2">			
									<?php previous_posts_link('<span><i class="fa fa-long-arrow-left"></i> PREV.</span>') ?>
									<span> / </span>
									<?php next_posts_link('<span>NEXT <i class="fa fa-long-arrow-right"></i></span>') ?>	
								</div>
								<?php wp_link_pages(); ?>
							</div>						
					<?php endif;?>	
				</div>	
				<?php if(is_active_sidebar('sidebar-1')):?>
					<div class="col-md-3">
						<?php  if ( !function_exists('dynamic_sidebar') ||  !dynamic_sidebar('sidebar-1') ) ?>
					</div>
				<?php endif;?>									
			</div>	
		</div>
	</div>
</div>	
<script>
	jQuery(document).ready(function($) {
		$( function() {
			  $(window).load(function(){
				$('#blog2-container').isotope({
					itemSelector: '.col-md-4',
					layoutMode: 'masonry'
				});
				});
			});
	});
</script>
<?php get_footer(); ?>