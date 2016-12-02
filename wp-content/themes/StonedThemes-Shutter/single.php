<?php get_header(); ?>
<?php  setup_postdata($post);?>
<div class="main_container scroll">
	<div class="unstick">
		<div class="container">
			<div class="row">		
				<div class="col-md-9 single-blog">
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
					<h4 class="title"><?php the_title();?> <span class="title-category">(<?php echo trim($post_categories_realNames);?>)</span></h4>
					<?php if(has_post_format('gallery')) {?>
						<div class="blog-slider-container">
							<?php $gallery_items = get_field('gallery_images'); ?>
								<div class="blog-slider">
								<?php foreach( $gallery_items as $slider_item ):?>  
									<?php $image = wp_get_attachment_image_src($slider_item['image'],'portfolio-single-slider');?>
										<div>
											<img src="<?php echo $image[0];?>">
										</div>
								<?php  endforeach; ?>	
									</div>
								<nav class="slides-navigation nav1">
									<div class="slide-controls">
										<a href="#" class="prev"><i class="fa fa-angle-left"></i></a>
										<span>1/3</span>
										<a href="#" class="next"><i class="fa fa-angle-right"></i></a>
									</div>
								</nav>
						</div>
					<?php }
						else { ?>
						<div class="img-container">
							<?php if(has_post_thumbnail()): ?>
								<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
								<img src="<?php echo $url;?>" alt="blog-item">
							<?php endif; ?>			
						</div>
						<?php } ?>
					<?php  the_content();?>
					<?php  wp_link_pages();?>	
					<?php  wp_reset_postdata();?>
					<?php
					$posttags = get_the_tags();
					if ($posttags) { 
					?>
						<div class="tags-container">
							<p class="text-uppercase pull-left"><?php _e('tags','sth_lang');?></p>
							<div class="tags pull-right">
								<?php 
								  foreach($posttags as $tag) {
									echo '<a href="'.get_tag_link($tag->term_id).'">'.$tag->name .'</a>'; 
								  }
								
								?>
							</div>
						</div>
					<?php } ?>
					<?php if(!get_field('disable_blog_social_shares','options')&&get_field('share_posts','options')):?>
						<div class="share-container">
							<p class="text-uppercase pull-left"><?php _e('Enjoyed this article?','sth_lang');?> <b><?php _e('Share it','sth_lang');?></b></p>
							<div class="post-shares pull-right">
								<?php addSocialShareButtons(get_field('share_posts','options')) ?>
							</div>
						</div>
					<?php endif ; ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>></div>
					<!--Comments-->
					<?php comments_template(); ?>	
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
jQuery(document).ready(function($){
	insert_view(<?php echo $post->ID; ?>);
});
jQuery(window).load(function($){
	singleBlog();
});
</script>
<?php get_footer();?>	