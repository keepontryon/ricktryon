 <?php if(!isset($_REQUEST["sth_ajax_load_site"])): ?>
 <!DOCTYPE html>
 <html <?php language_attributes();?>>
    <head>
        <?php if(get_field("fav_icon","options")): ?>
            <link rel="icon" type="image/png" href="<?php the_field("fav_icon","options"); ?>" />
        <?php endif; ?>
        <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<script>
            var template_directory = "<?php echo get_template_directory_uri(); ?>";
            var ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";
            var postId = "<?php if(isset($post->ID)) {echo $post->ID; }?>";	
			var ajaxDisabled = "1";		
        </script>  		
		
		<?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
		<style>
		 <?php 	set_logo_dimensioins();	?>
	    </style>	
		<?php register_custom_fonts();?>
	    <?php
		echo '<style>';
		if(get_field('brand_color','options')!=''){
				brand_color(  get_field('brand_color','options'),get_field('brand_color_opacity','options'));
		}
		if(get_field('overlay_color','options')!=''){
				overlay(  get_field('overlay_color','options'),get_field('overlay_opacity','options'));
		}	
		if(get_field('background_color','options')!=''){
				back_color(  get_field('background_color','options'));
		}	
		if(get_field('headings_color','options')!=''){
				headings_color(  get_field('headings_color','options'));
		}	
		if(get_field('paragraphs_color','options')!=''){
				paragraphs_color(  get_field('paragraphs_color','options'));
		}	
		echo '</style>';
		?>
        <?php
			if(get_field('custom_css','options'))
			{
			  echo '<style>';
			  the_field('custom_css','options');
			  echo '</style>';
			}
			if(get_field('custom_js','options'))
			{
				echo '<script>';
				the_field('custom_js','options');
				echo '</script>';
			}  
		?>
		<div class="loading-container">
			<div class="loading"></div>
		</div>
		<div class="main-menu"><!--menu starts here-->
            <div class="logo-container center-logo">
					<?php if(get_field("logo_type","options")=="image"){ ?>
						<?php $logo = get_field('logo','options');?>
						<?php $image = wp_get_attachment_image_src($logo,'full'); ?>
						<a href="<?php echo get_site_url(); ?>" class="logo">
							<img src="<?php echo $image[0];?>" alt="logo">
						</a>
					<?php } else if (get_field("logo_type","options")=="text"){ ?>
						 <?php $font = get_field('text_logo_font','options');?>
						 <a href="<?php echo get_site_url(); ?>"  class="logo" style="width: auto; color:<?php the_field('text_logo_color','options'); ?>!important; font-family: <?php echo $font['family']; ?>; font-size: <?php the_field('text_font_size','options'); ?>px; " class="titleLogo"><?php the_field('text_logo','options');?></a>
					<?php } else { ?>
						<a href="<?php echo get_site_url(); ?>" class="logo"><?php bloginfo('name');?></a>
					 <?php } ?>
            </div>
            <div class="responsive-nav text-right"><a href=""><i class="fa fa-bars fa-2x"></i></a></div>
            <?php wp_nav_menu(array( 'theme_location' => 'primary', 'container_class' => 'menu-menu-container'));?>
				<?php $social_medias =  get_field('social_networks','options'); ?>
				<?php if($social_medias): ?>
				<div class="header-shares">
				<?php foreach($social_medias as $social_media):?>
					<a href="<?php echo $social_media['url'];?>" class="img-circle member-social" style="position: relative; z-index: 999;"><i class="fa <?php echo $social_media['network']; ?>"></i></a>
				<?php endforeach;?>						
				</div>
				<?php endif;?>
      		</div><!--menu ends here-->
<!-- <div class="main_container"> -->
<?php endif; ?><!-- st_ajax_load_site-->			