<?php function addSocialShareButtons($socialBox) { 
		global $post;
        setup_postdata($post);		
	if(!$socialBox):
		$socialBox = array();
	endif;?>

  
	<?php if(in_array("facebook",$socialBox)):?>
	<span>
		  <a href="http://www.facebook.com/share.php?u=<?php the_permalink();?>" id="facebook">
			<i class="fa fa-facebook-square"></i><p style="display:inline">Facebook</p>
		  </a>
	</span>
	<?php endif;?>
	<?php if(in_array('twitter',$socialBox)):?>
	<span>
	  <a href="http://twitter.com/home?status=<?php the_permalink();?>" id="twitter">
		<i class="fa fa-twitter-square"></i><p style="display:inline">Twitter</p>
	  </a>
	</span>
	<?php endif;?>
	<?php if(in_array('google',$socialBox)):?>
	<span>
	  <a href="https://plus.google.com/share?url=<?php the_permalink();?>" id="google-plus">
		<i class="fa fa-google-plus-square"></i><p style="display:inline">Google+</p>
	  </a>     
	</span>	  
	<?php endif;?>	
	<?php if(in_array('linkedin',$socialBox)):?>	
	<span>	
	  <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink();?>" id="linkedin">
		<i class="fa fa-linkedin-square"></i><p style="display:inline">LinkedIn</p>
	  </a>	
	</span>  
	<?php endif;?>	
	<?php if(in_array('pinit',$socialBox)):?>	
	<span>	
	  <a href="http://pinterest.com/pin/create/link/?url=<?php the_permalink();?>"  id="pinterest">
		<i class="fa fa-pinterest-square"></i><p style="display:inline">Pinterest</p>
	  </a>
	</span>  
	<?php endif;?>
   
<?php } ?>