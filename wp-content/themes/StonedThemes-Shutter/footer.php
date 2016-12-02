<?php if(!isset($_REQUEST["sth_ajax_load_site"])): ?>  
<!-- </div> Main Container -->
<?php if(!get_field('disable_footer','options')){ ?>
<footer>
	<div class="col-xs-12 col-md-6"><?php echo get_field('left_content','options');?></div>
	<div class="col-xs-12 col-md-6 text-right"><?php echo get_field('right_content','options');?></div>
</footer>
<?php } ?>
<?php wp_footer(); ?>
</body>
</html>
<?php endif;?>