<?php
	class st_shutter_projectposts extends WP_Widget{
	
		function __construct() 
		{
			$widget_ops = array( 
			'class_name' => 'st_shutter_projectposts',
			'description' => 'Widget to display project posts',
			);
			parent::__construct( 'st_shutter_projectposts', 'Shutter > ProjectPosts', $widget_ops );

			parent::__construct(false, $name = 'Shutter > ProjectPosts');
		}
		
		function widget($args, $instance)
		{
			extract( $args );
			$title = apply_filters('widget_title', $instance['title']);	
			$number_of_posts = $instance['number_of_posts'];			
			
			global $post;
			setup_postdata( $post );

			  ?>
			<div class="col-md-4">
					<h4><?php echo $title;?><span class="service-nav"><a href="" class="prev1"><i class="fa fa-angle-left"></i></a><a href="" class="next1"><i class="fa fa-angle-right"></i></a></span></h4>
					<div class="ha-portfolio">
						
						<?php
							$args1 = array(
								'post_type' => 'project_post',
								'posts_per_page' => $number_of_posts,
							);
							$the_query = new WP_Query($args1);
							$counter = 0;
							while ( $the_query->have_posts() ):
								$the_query->the_post();
								
						?>
						<a href="<?php the_permalink();?>">
							<div class="overlay-container">
								<div class="overlay dark visible">
									<div class="box"></div>
									<div class="center-helper-container">
										<div class="center-helper-inside">
											<h3 class="text-center brand-color"><b><?php the_title(); ?></b></h3>
										</div>
									</div>
								</div>
								<div class="project-widget">
									<div class="images">
					
									<?php if(has_post_thumbnail()): ?>
										<?php
										$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'widget-portfolio');
										
										if($counter==0){
											echo '<img class="active" src="'.$image[0].'">';
											}
										else{	
											echo '<img src="'.$image[0].'">';
											}
										?>
									<?php endif; ?>
									
								
									</div>
								</div>	
							</div>
						</a>
						<?php $counter++ ;endwhile ?>
						<?php  wp_reset_postdata();?>	
					</div>
				  </div>
					<?php
         
		}
		
		function update($new_instance, $old_instance)
		{
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['number_of_posts'] = strip_tags($new_instance['number_of_posts']);
			return $instance;
		}
		
		function form($instance)
		{
			$title = isset($instance['title']) ? esc_attr($instance['title']) : "";	
			$number_of_posts = isset($instance['number_of_posts']) ? esc_attr($instance['number_of_posts']) : "";	
			
			?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title',"sth_lang"); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('number_of_posts'); ?>"><?php _e('Number of Posts',"sth_lang"); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('number_of_posts'); ?>" name="<?php echo $this->get_field_name('number_of_posts'); ?>" type="text" value="<?php echo $number_of_posts; ?>" />
			</p>
			<?php
		}
	}
	
	function st_shutter_widgets_projectposts() {			
		register_widget('st_shutter_projectposts');			
	}
	add_action('widgets_init', 'st_shutter_widgets_projectposts');
?>