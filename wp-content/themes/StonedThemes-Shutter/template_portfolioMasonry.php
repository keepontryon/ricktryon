<?php
/*
Template Name:Portfolio Masonry
*/

/*Loadmore Loop*/
 	if(isset($_REQUEST["sth_page"])):    	
 			if(isset($_POST["paged"])):			
			   $paged = $_POST["paged"];
			    $post_per_page = get_field('post_per_page');
			    $args = array(
						'post_type' => 'project_post',
						'posts_per_page' => $post_per_page,
						'paged'     => $paged
					);		
				$columns = get_field('columns');
				$the_Query = new WP_Query($args);					 
				while ($the_Query->have_posts()):
					$the_Query->the_post(); 							
								
					$terms = get_the_terms( $post->ID, 'projects_category' );
					$post_terms = '';
					$post_term_name = "";
					if($terms){
						foreach ($terms as $term){
							$post_terms .= str_replace(' ', '_', $term->name).' ';
							$post_term_name .= $term->name.' ';
						}
					}
					?>		
						<div class="item <?php $col = $columns; if($col == 2){echo "col-md-6";}elseif($col == 3){echo "col-md-4";}elseif($col == 4){echo "col-md-3";} ?>" like-sort="<?php echo get_post_meta($post->ID,'stoned_like',true);?>" data-time="<?php the_time('Y/m/d g:i:s')?>">
							<div class="overlay-container">
								<div class="overlay dark">
									<a href="" class="like text-center pull-right" data-id="<?php echo get_the_ID();?>"><i class="fa fa-heart-o"></i></a>
									<div class="text-left text-light bottom-left">
										<h6 class="text-light"><?php echo $post_term_name; ?></h6>
										<a href="<?php the_permalink(); ?>"><h5 class="text-light no-margin"><b><?php the_title(); ?></b></h5></a>
									</div>
								</div>	
								  <?php the_post_thumbnail('portfolio-masonry');?>
							</div>
						</div>							
				<?php endwhile; 			
		 	 endif;
	die();endif; 
/*Loadmore Loop*/	
				
/*Categorisation*/
	if(isset($_REQUEST["sth_categorisation"])):    	
 			if(isset($_POST["category"])):					
				$category  = $_POST["category"];
			    $columns = get_field('columns');
				if($category=='latest' || $category=='All' ){
						$args = array(
							'post_type' => 'project_post',
							'posts_per_page' => -1
						);
					}
				else {
			    $args = array(
					'post_type' => 'project_post',
					'posts_per_page' => -1,
					'tax_query' => array(
								array(
									'taxonomy' => 'projects_category',
									'field' => 'slug',
									'terms' => $category
								)
							)
						);	
				}						
			?>
			   <?php
				$the_Query = new WP_Query($args);					 
				while ($the_Query->have_posts()):
					$the_Query->the_post(); 							
								
					$terms = get_the_terms( $post->ID, 'projects_category' );
					$post_terms = '';
					$post_term_name = "";
					if($terms){
						foreach ($terms as $term){
							$post_terms .= str_replace(' ', '_', $term->name).' ';
							$post_term_name .= $term->name.' ';
						}
					}
					?>		
						<div class="item <?php $col = $columns; if($col == 2){echo "col-md-6";}elseif($col == 3){echo "col-md-4";}elseif($col == 4){echo "col-md-3";} ?>" like-sort="<?php echo get_post_meta($post->ID,'stoned_like',true);?>" data-time="<?php the_time('Y/m/d g:i:s')?>">
							<div class="overlay-container">
								<div class="overlay dark">
									<a href="" class="like text-center pull-right" data-id="<?php echo get_the_ID();?>"><i class="fa fa-heart-o"></i></a>
									<div class="text-left text-light bottom-left">
										<h6 class="text-light"><?php echo $post_term_name; ?></h6>
										<a href="<?php the_permalink(); ?>"><h5 class="text-light no-margin"><b><?php the_title(); ?></b></h5></a>
									</div>
								</div>	
								  <?php the_post_thumbnail('portfolio-masonry');?>
							</div>
						</div>							
				<?php endwhile; ?>
			<?php
			 endif;
	die();endif; 
	/*Categorisation*/	
	
	/*Order by viewes*/
	if(isset($_REQUEST["sth_views"])):  
				$columns = get_field('columns');
			    $args = array(
					'post_type' => 'project_post',
					'meta_key' => 'stoned_like',
					'orderby' => 'meta_value',	
					'order' => 'DESC' ,								
					'posts_per_page' => -1,
				);	
				
				$the_Query = new WP_Query($args);					 
				while ($the_Query->have_posts()):
					$the_Query->the_post(); 							
								
					$terms = get_the_terms( $post->ID, 'projects_category' );
					$post_terms = '';
					$post_term_name = "";
					if($terms){
						foreach ($terms as $term){
							$post_terms .= str_replace(' ', '_', $term->name).' ';
							$post_term_name .= $term->name.' ';
						}
					}
					?>		
						<div class="item <?php $col = $columns; if($col == 2){echo "col-md-6";}elseif($col == 3){echo "col-md-4";}elseif($col == 4){echo "col-md-3";} ?>" like-sort="<?php echo get_post_meta($post->ID,'stoned_like',true);?>" data-time="<?php the_time('Y/m/d g:i:s')?>">
							<div class="overlay-container">
								<div class="overlay dark">
									<a href="" class="like text-center pull-right" data-id="<?php echo get_the_ID();?>"><i class="fa fa-heart-o"></i></a>
									<div class="text-left text-light bottom-left">
										<h6 class="text-light"><?php echo $post_term_name; ?></h6>
										<a href="<?php the_permalink(); ?>"><h5 class="text-light no-margin"><b><?php the_title(); ?></b></h5></a>
									</div>
								</div>	
								  <?php the_post_thumbnail('portfolio-masonry');?>
							</div>
						</div>							
				<?php endwhile; ?>			
			<?php			
	die();endif; 
	/*Order by viewes*/	
	
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
		<div class="row">
			<div class="col-md-12">
				<div class="text-center">
					<div class="alt-filtering portfolio-filter" style="padding-top: 30px;">
						<a href="">Filtering</a>
						<ul class="list-unstyled no-margin">
							<li><a href="" data-filter="All"><?php _e('All','sth_lang');?></a></li>
							<?php 
								$taxonomies=get_terms('projects_category', array(
														'orderby'    => 'count'
													 ) );
								foreach ($taxonomies as $taxonomy ) {
								  echo '<li><a href="" data-filter="'.$taxonomy->slug.'">'. $taxonomy->name. '</a></li>';
								}
							?>
						</ul>
					</div>	
				</div>
				<div class="filters text-center">
					<ul class="list-unstyled list-inline no-margin" id="filter">
						<li class="filter-text">
							<span class="text-uppercase"><?php _e('Filter','sth_lang');?> <i class="fa fa-caret-down"></i></span>
							<ul class="list-unstyled text-left animated fadeIn">
								 <li><a href="" data-filter="All"><?php _e('All','sth_lang');?></a></li>
								<?php								
								$categories= get_terms('projects_category', array(
														'orderby'    => 'count'														
													 ) );
									foreach($categories as $cat):?>
										<li><a href="" data-filter="<?php echo $cat->name;?>"><?php echo $cat->name;?></a></li>
									<?php endforeach;?>
							</ul>
						</li>
						<li class="text-uppercase"><span><a href="" id="popular"><?php _e('Popular','sth_lang');?></a></span></li>
						<li class="text-uppercase"><span><a href="" id="latest"><?php _e('Latest','sth_lang');?></a></span></li>
					</ul>
				</div>
			</div>					
		</div>
	</div>
	<div class="clearfix"></div>
	<?php $layout = get_field('layout');?>
	<div class="<?php if($layout=='fullwidth'){echo "fluid-container";}else{echo "container";} ?>" id="portfolio-content">
		<div class="row portfolio">
			<?php $columns = get_field('columns');?>
				<?php 
				   $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				   $post_per_page = get_field('post_per_page');
				   $args = array(
						'post_type' => 'project_post',
						'posts_per_page' => $post_per_page,
						'paged'     => $paged
					);					   
					$the_Query = new WP_Query($args);					 
					while ($the_Query->have_posts()):
						$the_Query->the_post(); 							
			
						global $post;
						setup_postdata($post);
						$terms = get_the_terms( $post->ID, 'projects_category' );
						$post_terms = '';
						$post_term_name = "";
						if($terms){
							foreach ($terms as $term){
								$post_terms .= str_replace(' ', '_', $term->name).' ';
								$post_term_name .= $term->name.' ';
							}
						}
					?>					
						<div class="item <?php $col = $columns; if($col == 2){echo "col-md-6";}elseif($col == 3){echo "col-md-4";}elseif($col == 4){echo "col-md-3";} ?>" like-sort="<?php echo get_post_meta($post->ID,'stoned_like',true);?>" data-time="<?php the_time('Y/m/d g:i:s')?>">
							<div class="overlay-container">
								<div class="overlay dark">
									<a href="" class="like text-center pull-right" data-id="<?php echo get_the_ID();?>"><i class="fa fa-heart-o"></i></a>
									<div class="text-left text-light bottom-left">
										<h6 class="text-light"><?php echo $post_term_name; ?></h6>
										<a href="<?php the_permalink(); ?>"><h5 class="text-light no-margin"><b><?php the_title(); ?></b></h5></a>
									</div>
								</div>	
								  <?php the_post_thumbnail('portfolio-masonry');?>
							</div>
						</div>
			<?php endwhile; ?> 			
		</div>
	</div> 	
	<div class="clearfix"></div>
	<div class="col-md-12 load-more-container">
		<?php if($the_Query->max_num_pages != 1):?>
			<div class="text-center">
				<a href="" class="button loadMoreBtn"><span><?php _e('load more','sth_lang');?></span><i class="icon-spinner5"></i></a>
			</div>
		<?php endif;?>
	</div>
</div>
<script>
var page = parseInt("<?php echo $paged; ?>");
var last_page = parseInt('<?php echo $the_Query->max_num_pages; ?>');
	jQuery(window).load(function($) {
		var col = '.<?php $col = $columns; if($col == 2){echo "col-md-6";}elseif($col == 3){echo "col-md-4";}elseif($col == 4){echo "col-md-3";} ?>';
		portfolioMasonery(col);
	});
</script>
<?php get_footer(); ?>