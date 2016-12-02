<?php
	class st_shutter_serviceposts extends WP_Widget{
	
		function __construct() 
		{
			parent::__construct(false, $name = 'Shutter > ServicePosts');
		}
		
		function widget($args, $instance)
		{
			extract( $args );
			$title = apply_filters('widget_title', $instance['title']);		
			global $post;
			setup_postdata( $post );

			  ?>
			<div class="col-md-4">
					<h4><?php echo $title;?><span class="service-nav"><a href="" class="prev2"><i class="fa fa-angle-left"></i></a><a href="" class="next2"><i class="fa fa-angle-right"></i></a></span></h4>
					<div>
						<ul class="ha-services list-unstyled">
									<?php
										$args1 = array(
											'post_type' => 'service_post',
											'posts_per_page' => -1,
										);
										$the_query = new WP_Query($args1);
										$counter = 0;
										while ( $the_query->have_posts() ):
											$the_query->the_post();
											
									?>								
										<?php if(get_field('type',$post->ID)=='font-awesome')	{ ?>	
											<li class="ha-service visible">
												<a href="">
													<div class="row">
														<div class="col-md-3 col-xs-3">
															<div class="mosaic-square">
																<div class="mosaic-inside img-circle">
																	<div class="center-helper-container">
																		<div class="center-helper-inside text-center">
																			<i class="fa <?php the_field('font_awesome',$post->ID); ?> fa-2x brand-color"></i>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-md-9 col-xs-9">
															<p class="title"><?php echo get_the_title( $post->ID ); ?></p>
															<?php the_excerpt( $post->ID); ?>
														</div>
													</div>
												</a>
											</li>
										<?php } ?>
									<?php $counter++ ;endwhile ?>
						</ul>		
					</div>
				  </div>
					<?php
         
		}
		
		function update($new_instance, $old_instance)
		{
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			return $instance;
		}
		
		function form($instance)
		{
			$title = isset($instance['title']) ? esc_attr($instance['title']) : "";			
			?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title',"sth_lang"); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			</p>
			<?php
		}
	}
	
	function st_shutter_widgets_serviceposts() {			
		register_widget('st_shutter_serviceposts');			
	}
	add_action('widgets_init', 'st_shutter_widgets_serviceposts');
?>