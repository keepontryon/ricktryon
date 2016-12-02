<?php
/*
Template Name: Contact Alt
*/
?>
<?php

$formSubmitted = false;
$sentMessage = false;

if(isset($_REQUEST["sth_name"]) && isset($_REQUEST["sth_email"]) && isset($_REQUEST["sth_website"]) && isset($_REQUEST["sth_message"])){
    $name = $_REQUEST["sth_name"];
    $email = $_REQUEST["sth_email"];
	$website = $_REQUEST["sth_website"];
    $message = $_REQUEST["sth_message"];
	$subject = 'From '.$email;    
			
	$to_email = get_option('admin_email');
	
	if(get_field('email_receiver'))
		$to_email = get_field('email_receiver');	
	 
		$message = "
			Name : {$name},
			Email : {$email}
			Website : {$website}
			
			$message
		";
	  try{
		if(wp_mail($to_email,$subject,$message))
		{
			  echo  get_field('success_message');
			
		}
		else{
			echo get_field('failed_message');
		}
		}
		catch(Exception $e){  echo "Error ".$e;}
	die();
}

get_header();

$latLng = get_field('map');
$zoomLevel = get_field('map_zoom');		
?>

    <script>
        jQuery(document).ready(function ($) {
			
            var myCenter = new google.maps.LatLng(<?php echo $latLng['coordinates']; ?>);

            function initialize() {
				var map_canvas = document.getElementById('map_canvas');
				
				var map_options = {
				  center: myCenter,
				  zoom: <?php echo $zoomLevel; ?>,
                                  scrollwheel: false,
				  mapTypeId: google.maps.MapTypeId.ROADMAP
				}
				
			var map = new google.maps.Map(map_canvas, map_options)
				
			   var marker = new google.maps.Marker({
                    position:myCenter
                });

                marker.setMap(map);	
			  }

            //google.maps.event.addDomListener(window, 'load', initialize);
            initialize();
        });

    </script>
	<div class="map2-container" id="map_canvas">
		
	</div>
<div class="main_container scroll">
	<div class="unstick">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
				<?php if(!$formSubmitted):?>
					<form class="contactForm" action="" method="post" >
						<input type="hidden" name="submitted" value="true" />
						<div class="row">
							<div class="col-md-12">
								<h4 class="title"><?php the_field('contact_form_title'); ?></h4>
							</div>
							<div class="col-md-4">	
								<input type="text" id="name" name="name" placeholder="<?php the_field('name_field'); ?>">
							</div>
							<div class="col-md-4">	
								<input type="text" id="email" name="email" placeholder="<?php the_field('email_field'); ?>">
							</div>
							<div class="col-md-4">	
								<input type="text" id="website" name="website" placeholder="<?php the_field('website'); ?>">
							</div>
							<div class="col-md-12">
								<textarea id="comment" name="comment" placeholder="<?php the_field('message_field'); ?>" ></textarea>
							</div>
							<div class="col-md-12">
								<input type="submit"  value="<?php the_field('button_text'); ?>" class="post-comment">				
							</div>
						</div>
					</form>
				<?php endif; ?>	
					<div>
						<h1 class="sth_message"></h1>
					</div>
					  <?php if($formSubmitted): ?>
	                    <div>
	                        <?php if($sentMessage == true): ?>
	                            <h1><?php _e('Your message was sent successfully!','sth_lang');?></h1>
	                        <?php else: ?>
	                            <h1><?php _e('Message sending failed!','sth_lang');?></h1>
	                        <?php endif;?>
	                    </div>
	                <?php endif;?>
				</div>	
				<div class="col-md-3">
					<h4 class="title"><?php the_field('details_name');?></h4>					
					<?php
					$details = get_field('details');
					if($details) : 
					  foreach ($details as $item) { ?>
							<div class="contact-details-item">
								<div class="contact-details-heading">
									<p class="pull-left contact-item-text"><?php echo $item['details_title']; ?></p>
									<i class="fa <?php echo $item['details_icon']; ?> pull-right contact-item-icon"></i>
									<div class="background-pattern"></div>
								</div>
								<div class="clearfix"></div>
								<div class="contact-content">
									<?php echo $item['details_content']; ?>
								</div>
							</div>							
						<?php   }
					endif; ?>
				</div>	
			</div>
		</div>
	</div>
</div>
<?php get_footer();?>