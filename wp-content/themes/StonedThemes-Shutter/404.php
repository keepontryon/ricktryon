<?php get_header(); ?>
<div class="main_container no-scroll">
	<div class="center-helper-container text-center">
		<div class="center-helper-inside">
			<div class="container">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="mosaic-square">
						<div class="mosaic-inside">
							<div class="container-404 text-center img-circle">
								<div class="center-helper-container">
									<div class="center-helper-inside">
										<p class="title404">404</p>
										<h1 class="title"><?php _e('Error','sth_lang');?></h1>
									</div>
								</div>
							</div>
						</div>
					</div>
					<p class="text-center desc-404"><?php _e('This page doesn’t exist, has been deleted or it’s down for the moment. Thanks for understanding.','sth_lang');?></p>
					<a href="<?php echo home_url();?>" class="button"><?php _e('back to homepage','sth_lang');?></a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>