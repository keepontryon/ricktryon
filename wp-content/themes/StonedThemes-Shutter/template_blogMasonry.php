<?php
/*
Template Name:Blog Masonry
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
				<div class="col-md-4 <?php echo $post_categories_names;?>" like-sort="<?php echo get_post_meta($post->ID,'stoned_like',true);?>" data-time="<?php the_time('Y/m/d g:i:s')?>">
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
						<p class="paragraph-title no-margin"><?php echo $post_categories_realNames;?></p>
						<h4><a href="<?php echo get_permalink();?>" class="st_ajaxLink"><?php the_title(); ?></a></h4>
						<p><a href="<?php echo get_permalink();?>" class="st_ajaxLink"><?php the_excerpt(); ?></a></p>
					</div>
				</div>
		<?php endwhile; ?>  
	<?php endif;

	die();endif; 	
				
?>
<?php 
/*Order by viewes*/
	if(isset($_REQUEST["sth_views"])):   ?>	
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
		<div class="col-md-4 <?php echo $post_categories_names;?>" like-sort="<?php echo get_post_meta($post->ID,'stoned_like',true);?>" data-time="<?php the_time('Y/m/d g:i:s')?>">
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
	<?php
	die();endif; 
	/*Order by viewes*/
?>
<?php 
/*Order by latest*/
	if(isset($_REQUEST["sth_latest"])):   ?>	
		<?php 	
			$args = array(
					'post_type' => 'post',	
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
		<div class="col-md-4 <?php echo $post_categories_names;?>" like-sort="<?php echo get_post_meta($post->ID,'stoned_like',true);?>" data-time="<?php the_time('Y/m/d g:i:s')?>">
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
	<?php
	die();endif; 
	/*Order by latest*/
?>
<?php get_header();?>
<div class="main_container scroll">
	<div class="unstick">
		<div class="container">
			<div class="row">	
				<?php 
					$sidebar_state = get_field('sidebar_off');
					$columns = 4;
					if($sidebar_state){
						echo '<div class="col-md-12">';
						$columns = 3;
						}
					  else	{
						echo '<div class="col-md-9">';
						}
					?>
					<div style="padding: 0 15px;">
						<h4 class="pull-left title"><?php the_title(); ?></h4>
						<div class="alt-filtering portfolio-filter" style="padding-top: 30px;">
							<a href="">Filtering</a>
							<ul class="list-unstyled no-margin">
								<li><a href="" data-filter="*"><?php _e('all categories','sth_lang');?></a></li>
								<?php
								$categories =  get_categories();
									foreach($categories as $cat):?>
										<li><a href="" data-filter=".<?php echo $cat->cat_name;?>"><?php echo str_replace(' ','_',$cat->cat_name);?></a></li>
									<?php endforeach;?>
							</ul>
						</div>
						<div class="filters text-right">
							<ul class="list-unstyled list-inline no-margin" id="filter">
								<li class="filter-text">
									<span class="text-uppercase"><?php _e('Filter','sth_lang');?> <i class="fa fa-caret-down"></i></span>
									<ul class="list-unstyled text-left animated fadeIn">
										  <li><a href="" data-filter="*"><?php _e('all categories','sth_lang');?></a></li>
											<?php
											$categories =  get_categories();
												foreach($categories as $cat):?>
													<li><a href="" data-filter=".<?php echo $cat->cat_name;?>"><?php echo str_replace(' ','_',$cat->cat_name);?></a></li>
												<?php endforeach;?>
	                   
									</ul>
								</li>
								<li class="text-uppercase"><span><a href="" id="popular"><?php _e('Popular','sth_lang');?></a></span></li>
								<li class="text-uppercase"><span><a href="" id="latest"><?php _e('Latest','sth_lang');?></a></span></li>
								</ul>
						</div>
					</div>					
					<div id="blog2-container">
						<?php 
						   $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						   $post_per_page = get_field('post_per_page');
						   $args = array(
								'post_type' => 'post',
								'posts_per_page' => $post_per_page,
								'paged'     => $paged
							);
						   
							$the_Query = new WP_Query($args);
							 $counter = 0;
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
						<div class="col-md-4 <?php echo $post_categories_names;?>" like-sort="<?php echo get_post_meta($post->ID,'stoned_like',true);?>" data-time="<?php the_time('Y/m/d g:i:s')?>">
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
					<?php if($the_Query->max_num_pages != 1):?>
						<div class="text-center load-more-container">
							<a href="" class="button loadMoreBtn"><span><?php _e('load more','sth_lang');?></span><i class="icon-spinner5"></i></a>
						</div>
					<?php endif;?>
				</div>
				<?php if(is_active_sidebar('sidebar-1')&&!$sidebar_state):?>
					<div class="col-md-3">
						<?php  if ( !function_exists('dynamic_sidebar') ||  !dynamic_sidebar('sidebar-1') ) ?>
					</div>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>
<script>		
var page = parseInt("<?php echo $paged; ?>");
var last_page = parseInt('<?php echo $the_Query->max_num_pages; ?>');
	jQuery(window).load(function($) {
		blog2();
	});
</script>
<?php get_footer(); ?>