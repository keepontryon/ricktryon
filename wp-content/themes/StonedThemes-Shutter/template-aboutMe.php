<?php
/*
Template Name:About Me
*/
get_header();
?>
<div class="main_container">
	<div class="unstick">
		<div class="about-me">
				<div class="center-helper-container">
					<div class="center-helper-inside">
						<div class="container">
							<div class="col-md-6">
								<?php
									$slider = get_field('slider');
									if($slider) : ?>							
										<div class="member-imgs">
											<?php  foreach ($slider as $image) { ?>	
													<div class="item"><img src="<?php echo $image['image'];?>" alt="The Last of us"></div>
											<?php }  ?>
										</div>
									<?php endif; ?>
								<div class="no-padding-container">
									<nav class="slides-navigation nav1">
										<div class="slide-controls">
							  				<a href="#" class="prev"><i class="fa fa-angle-left"></i></a>
							      			<span>00/00</span>
							      			<a href="#" class="next"><i class="fa fa-angle-right"></i></a>
										</div>
						    		</nav>
								</div>
							</div>
							<div class="col-md-6">
								<div class="about-info">
									<div class="about-title">
										<p class="paragraph-title no-margin"><?php the_field('author_position');?></p>
										<h3 class="no-margin"><?php the_field('author_name');?></h3>
									</div>
									 <?php setup_postdata($post);?>
									  <?php the_content();?>
									<?php wp_reset_postdata();?>						
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
</div>
<script>
	jQuery(document).ready(function($) {
		aboutMe();	
	});
</script>

<?php get_footer(); ?>