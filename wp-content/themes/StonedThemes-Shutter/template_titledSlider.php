<?php /*
Template Name:Titled Slider
*/

get_header();
?>
<div class="main_container no-scroll">
<div class="container">
	<div class="slideshow" id="slideshow">
		<ol class="slides">
			<?php
			$galleries = get_field('tslider');
			$counter = 0;
			if($galleries) : 
			  foreach ($galleries as $item) { 
				if($counter==0)
					echo '<li class="current">';
				else
					echo '<li>';
			  ?>			 
					<div class="description">
						<h3 class="title"><?php echo $item['title']; ?></h2>
						<?php echo $item['content']; ?>
					</div>
					<div class="tiltview <?php echo $item['image_display']; ?>">
						<?php if($item['image1']) : ?>
						<a href="<?php echo $item['image1_link']; ?>" target="_blank"><img src="<?php echo $item['image1']; ?>"/></a>
						<?php endif; ?>
						<?php if($item['image2']) : ?>
						<a href="<?php echo $item['image2_link']; ?>" target="_blank"><img src="<?php echo $item['image2']; ?>"/></a>
						<?php endif; ?>
					</div>
				</li>			  
			<?php  $counter++; }
			endif; ?>
		</ol>
	</div><!-- /slideshow -->
</div><!-- /container -->
</div>
<?php 
get_footer();
 ?>
<script>
	new TiltSlider( document.getElementById( 'slideshow' ) );
</script>