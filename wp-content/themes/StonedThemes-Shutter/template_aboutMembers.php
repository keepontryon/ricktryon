<?php
/*
Template Name:About Members
*/
get_header();
?>
	<?php
			$authors = get_field('author');
			if($authors) : ?>
<div class="main_container scroll">
	<div class="unstick">
		<div class="container">
		<?php
			$counter = 0;
			foreach ($authors as $item) { 
			if($counter%2==0) {
			?>
			<div class="member">
				<div class="row">
					<div class="">
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-xs-8 col-sm-offset-2 col-xs-offset-2">
							<div class="overlay-container img-circle">
							    <?php
									$authors_net = $item['social_networks'];
									if($authors_net) : ?>
										<div class="overlay dark img-circle">
											<div class="text-center center-helper-container">
												<div class="center-helper-inside member-social-container">
												<?php  foreach ($authors_net as $network) { ?>
													<a href="<?php echo $network['url']; ?>" class="img-circle member-social"><i class="fa fa-<?php echo $network['network']; ?>"></i></a>												
												<?php } ?>	
												</div>
											</div>
										</div>
									<?php endif; ?>
									<?php 
										$image = wp_get_attachment_image($item['image'], 'about-members' );
										echo $image;
									?>							
							</div>
						</div>
						<div class="col-md-8 col-sm-12 col-xs-12">
							<div class="about-title">
								<div class="about-title">
									<p class="paragraph-title no-margin"><?php echo $item['author_position'];?></p>
									<h3 class="no-margin"><?php echo $item['author_name'];?></h3>
								</div>
								<?php echo $item['author_description'];?>
								<?php if($item['button_link']!=''): ?>
									<a href="<?php echo $item['button_link'];?>" class="button"><?php echo $item['button_text'];?></a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } else {	?>	
			<div class="member">
				<div class="row">
					<div class="">
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-xs-8 col-sm-offset-2 col-xs-offset-2 col-md-push-8">
							<div class="overlay-container img-circle">
							 <?php
									$authors_net = $item['social_networks'];
									if($authors_net) : ?>
										<div class="overlay dark img-circle">
											<div class="text-center center-helper-container">
												<div class="center-helper-inside member-social-container">
												<?php  foreach ($authors_net as $network) { ?>
													<a href="<?php echo $network['url']; ?>" class="img-circle member-social"><i class="fa fa-<?php echo $network['network']; ?>"></i></a>
												<?php } ?>	
												</div>
											</div>
										</div>
									<?php endif; ?>
									<?php 
										$image = wp_get_attachment_image($item['image'], 'about-members' );
										echo $image;
									?>
							</div>
						</div>
						<div class="col-md-8 col-sm-12 col-xs-12 col-md-pull-4">
							<div class="about-title">
								<div class="about-title">
									<p class="paragraph-title no-margin"><?php echo $item['author_position'];?></p>
									<h3 class="no-margin"><?php echo $item['author_name'];?></h3>
								</div>
								<?php echo $item['author_description'];?>
								<?php if($item['button_link']!=''): ?>
									<a href="<?php echo $item['button_link'];?>" class="button"><?php echo $item['button_text'];?></a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
		<?php $counter++; }	?>	
		</div>
	</div>
</div>
<?php endif; ?>

<?php get_footer(); ?>