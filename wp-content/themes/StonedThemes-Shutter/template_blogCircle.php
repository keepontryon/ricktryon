<?php
/*
Template Name:Blog Circle
*/
$postspage_id = 0;
if(!is_page()){
    $postspage_id = get_option('page_for_posts');
    $post = get_post($postspage_id);

}
/*Blog Loop*/
 	if(isset($_REQUEST["sth_page"])):    	
 			if(isset($_POST["paged"])):
			
			   $paged = $_POST["paged"];
			   $post_per_page = get_field('post_per_page');
			   $args = array(
					'post_type' => 'post',
					'posts_per_page' => $post_per_page,
					'paged'     => $paged
				);
			   
				$the_Query = new WP_Query($args);				
				while ($the_Query->have_posts()):
					$the_Query->the_post(); 							
			
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
				<div class="col-md-6 <?php echo $post_categories_names;?> animated fadeIn" viewes="<?php echo get_post_meta($post->ID,'stoned_like',true);?>">
						<div class="blog-item">
							<div class="col-md-4 col-md-offset-0 col-xs-6 col-xs-offset-3">
								<div class="overlay-container img-circle">
									<div class="overlay dark img-circle"></div>
									<?php if(has_post_thumbnail()): ?>
										<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID),'blog1' );?>
										<?php the_post_thumbnail('blog1');?>
									<?php endif; ?>
								</div>
							</div>
							<div class="col-md-8 col-xs-12">
								<p class="paragraph-title no-margin"><?php echo $post_categories_names;?></p>
								<h4><a href="<?php echo get_permalink();?>" class="st_ajaxLink"><?php the_title(); ?></a></h4>
								<p><a href="<?php echo get_permalink();?>" class="st_ajaxLink"><?php the_excerpt(); ?></a></p>
							</div>
						</div>
					</div>
		<?php endwhile; ?>  
	<?php endif;

	die();endif; 	
				
?>
<?php
/*Categorisation*/

	if(isset($_REQUEST["sth_categorisation"])):    	
 			if(isset($_POST["category"])):					
				$category  = $_POST["category"];								
				?>
				<div class="row">
				<?php 					  
					  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					  
					  $args = array(
							'post_type' => 'post',
							'category_name' => $category,
							'posts_per_page' => -1							
						);
					   if($category=='all categories'):
						   $args = array(
									'post_type' => 'post',							
									'posts_per_page' => -1	
								);
							endif;
						$the_Query = new WP_Query($args);	
									
						while ($the_Query->have_posts()):
							$the_Query->the_post(); 							
					?>
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
					<div class="col-md-6 <?php echo $post_categories_names;?> animated fadeIn" viewes="<?php echo get_post_meta($post->ID,'stoned_like',true);?>">
						<div class="blog-item">
							<div class="col-md-4 col-md-offset-0 col-xs-6 col-xs-offset-3">
								<div class="overlay-container img-circle">
									<div class="overlay dark img-circle"></div>
									<?php if(has_post_thumbnail()): ?>
										<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID),'blog1' );?>
										<?php the_post_thumbnail('blog1');?>
									<?php endif; ?>
								</div>
							</div>
							<div class="col-md-8 col-xs-12">
								<p class="paragraph-title no-margin"><?php echo $post_categories_names;?></p>
								<h4><a href="<?php echo get_permalink();?>" class="st_ajaxLink"><?php the_title(); ?></a></h4>
								<p><a href="<?php echo get_permalink();?>" class="st_ajaxLink"><?php the_excerpt(); ?></a></p>
							</div>
						</div>
					</div>
					<?php endwhile; ?> 
				</div>	
											
				<?php				
			 endif;
	die();endif; 
	/*Categorisation*/	
	/*Order by viewes*/
	if(isset($_REQUEST["sth_views"])):   ?>	
				<div class="row">
				<?php 	
					    $args = array(
								'post_type' => 'post',		
								'meta_key' => 'stoned_like',
								'orderby' => 'meta_value',	
								'order' => 'DESC' ,								
								'posts_per_page' => -1	
							);
						$the_Query = new WP_Query($args);	
									
						while ($the_Query->have_posts()):
							$the_Query->the_post(); 							
					
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
					<div class="col-md-6 <?php echo $post_categories_names;?> animated fadeIn" viewes="<?php echo get_post_meta($post->ID,'stoned_like',true);?>">
						<div class="blog-item">
							<div class="col-md-4 col-md-offset-0 col-xs-6 col-xs-offset-3">
								<div class="overlay-container img-circle">
									<div class="overlay dark img-circle"></div>
									<?php if(has_post_thumbnail()): ?>
										<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID),'blog1'  );?>
										<?php the_post_thumbnail('blog1');?>
									<?php endif; ?>
								</div>
							</div>
							<div class="col-md-8 col-xs-12">
								<p class="paragraph-title no-margin"><?php echo $post_categories_names;?></p>
								<h4><a href="<?php echo get_permalink();?>" class="st_ajaxLink"><?php the_title(); ?></a></h4>
								<p><a href="<?php echo get_permalink();?>" class="st_ajaxLink"><?php the_excerpt(); ?></a></p>
							</div>
						</div>
					</div>
					<?php endwhile; ?> 
				</div>						
			<?php
	die();endif; 
	/*Order by viewes*/
	
get_header();
?>
<div class="main_container scroll">
	<div class="unstick">
		<div class="container">
			<h4 class="title text-center"><?php the_title();?></h4>
			<div class="text-center">
				<div class="alt-filtering portfolio-filter" style="padding-top: 30px;">
					<a href="">Filtering</a>
					<ul class="list-unstyled no-margin">
						<li><a href="" data-filter="*"><?php _e('all categories','sth_lang');?></a></li>
						<?php
						$categories =  get_categories();
							foreach($categories as $cat):?>
								<li><a href="" data-filter=".<?php echo $cat->cat_name;?>"><?php echo $cat->slug;?></a></li>
							<?php endforeach;?>
					</ul>
				</div>	
				<div class="filters">
					<ul class="list-unstyled list-inline" id="filter">
						<li class="filter-text">
							<span class="text-uppercase">Filter <i class="fa fa-caret-down"></i></span>
							<ul class="list-unstyled text-left animated fadeIn">
								 <li><a href="" data-filter="*"><?php _e('all categories','sth_lang');?></a></li>
								<?php
								$categories =  get_categories();
									foreach($categories as $cat):?>
										<li><a href="" data-filter=".<?php echo $cat->cat_name;?>"><?php echo $cat->slug;?></a></li>
									<?php endforeach;?>
							</ul>
						</li>
						<li class="text-uppercase"><span><a href="" id="blog_views"><?php _e('Popular','sth_lang');?></a></span></li>
						<li class="text-uppercase"><span><a href="" id="blog_latest"><?php _e('Latest','sth_lang');?></a></span></li>
					</ul>
				</div>		
			</div>
			<div class="blog_container">
				<div class="row">
					<?php 
							   $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							    $post_per_page = get_field('post_per_page');
							   $args = array(
									'post_type' => 'post',	
									'posts_per_page' => $post_per_page,									
									'paged'     => $paged
								);
							   
								$the_Query = new WP_Query($args);						 
								while ($the_Query->have_posts()):
									$the_Query->the_post(); 							
							?>
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
					<div class="col-md-6 <?php echo $post_categories_names;?>" viewes="<?php echo get_post_meta($post->ID,'stoned_like',true);?>">
						<div class="blog-item">
							<div class="col-md-4 col-md-offset-0 col-xs-6 col-xs-offset-3">
								<div class="overlay-container img-circle">
									<div class="overlay dark img-circle"></div>
									<?php if(has_post_thumbnail()): ?>
										<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID,'blog1')   );?>
										<?php the_post_thumbnail('blog1');?>
										
									<?php endif; ?>
								</div>
							</div>
							<div class="col-md-8 col-xs-12">
								<p class="paragraph-title no-margin"><?php echo $post_categories_names;?></p>
								<h4><a href="<?php echo get_permalink();?>" class="st_ajaxLink"><?php the_title(); ?></a></h4>
								<p><a href="<?php echo get_permalink();?>" class="st_ajaxLink"><?php the_excerpt(); ?></a></p>
							</div>
						</div>
					</div>
					<?php endwhile; ?> 
				</div>	
				<div class="col-md-12 load-more-container">
					<?php if($the_Query->max_num_pages != 1):?>
						<div class="text-center">
							<a href="" class="button loadMoreBtn"><span><?php _e('load more','sth_lang');?></span><i class="icon-spinner5"></i></a>
						</div>
					<?php endif;?>
				</div>
				<?php wp_reset_postdata(); ?>
		  </div>
		</div>
	</div>
</div>
<script>
var page = parseInt("<?php echo $paged; ?>");
var last_page = parseInt('<?php echo $the_Query->max_num_pages; ?>');
	jQuery(document).ready(function($) {
		blog1();
	});
</script>	
<?php get_footer(); ?>