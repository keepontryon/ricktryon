<?php
$theme_name = "Shutter";
$theme_version = "2.0";
global $theme_name;
global $theme_version;

define( 'ACF_LITE' , true );
include_once('advanced-custom-fields/acf.php' );

include('includes/post-types.php');
include('includes/social-shares.php');
include('includes/shortcodes.php');
include('includes/brand_color.php');
include('includes/comments-template.php');
include('includes/custom-fields.php');
include('widgets/widget-projectsPosts.php');
include('widgets/widget-servicePosts.php');
include('includes/woocommerce-functions.php');
/*ACF*/
// Fields


    function my_register_fields()
    {
        include_once('includes/add-ons/acf-repeater/repeater.php');
        include_once('includes/add-ons/acf-flexible-content/flexible-content.php');
    }
    add_action('acf/register_fields', 'my_register_fields');

// Options Page
    include_once( 'includes/add-ons/acf-options-page/acf-options-page.php' );

    if(function_exists("register_options_page"))
    {
        if(current_user_can('edit_theme_options')){
            register_options_page('Main','');
			register_options_page('Branding','');
			register_options_page('Header','');
			register_options_page('Footer','');
        }
    }
    register_options_page();

/*ACF*/


/*Google*/
    add_action('acf/register_fields', 'register_fields');
    function register_fields()
    {
        include_once('registered-fields/presets/acf-presets.php');
        include_once('registered-fields/google-font/acf-googlefonts.php');
        include_once('registered-fields/googlemap/acf-googlemap.php');
    }
/*Google*/

if ( ! isset( $content_width ) ) $content_width = 940;
    
/*Supports images in posts*/
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );

/*Image sizes*/
	add_image_size('home1-blog',285,160,true); 
	
	add_image_size('portfolio-masonry', 600  ); 
	add_image_size('portfolio-square3', 600,600,true); 
	add_image_size('portfolio-square4',600,338,true); 
	add_image_size('portfolio-single-slider',1300,731,true); 
	add_image_size('portfolio-mosaic-vertical',657,1385,true); 
	
	add_image_size('widget-portfolio',600,338,true);
	add_image_size('about-members', 600,600,true);
	add_image_size('gallery-circle', 800,800,true);
	add_image_size('small-thumbs', 400,400,true);
	add_image_size('slider-thumbs', 500,281,true);
	
	add_image_size('blog1', 400,400,true);
	
/*Image sizes */

/*To support post formats*/
	$my_post_formats = array( 'gallery');
	add_theme_support( 'post-formats', $my_post_formats );

/*Excerpt*/
	function custom_excerpt_length($length)
	{
	   return 20;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length');

	function new_excerpt_more($more )
	{
		return '...';
	}
	add_filter('excerpt_more', 'new_excerpt_more');
/*Excerpt*/


	
/*Add Menu Support*/
	add_action( 'init', 'register_my_menus' );
	function register_my_menus() {
		register_nav_menus(array( 'primary'=>'Primary Menu')
		);
	}
/*Add Menu Support*/

/*register Sidebar*/
	function st_widgets_init()
	{
		register_sidebar( array(
			'name' => __( 'Main Sidebar', 'sth_lang' ),
			'id' => 'sidebar-1',
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="title">',
			'after_title' => '</h4>'

		) );	
		
		register_sidebar( array(
			'name' => __( 'MixPage Sidebar', 'sth_lang' ),
			'id' => 'sidebar-2',
			'before_widget' => '<div class="col-md-4" style="height:100%;">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="title">',
			'after_title' => '</h4>'

		) );
		register_sidebar( array(
			'name' => __( 'Shop Sidebar', 'sth_lang' ),
			'id' => 'sidebar-3',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="title">',
			'after_title' => '</h4>'
		) );			
	}

	add_action( 'widgets_init', 'st_widgets_init' );
/*register Sidebar*/
/*Admin js and css*/
	add_action('admin_enqueue_scripts', 'add_my_scripts');
	add_action( 'admin_print_styles', 'load_custom_admin_css' );
	function add_my_scripts()
	{
		wp_enqueue_script("adminJS", get_template_directory_uri()."/js/adminJs.js" ,array(),'',TRUE);		
	}
	function load_custom_admin_css()
	{
		wp_enqueue_style("font_awesome", "http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" , false, "1.0");
		wp_enqueue_style("adminCss", get_template_directory_uri().'/css/adminCss.css' , false, "1.0");
	}
/*Admin js and css*/

/*css*/		
	function add_external_stylesheets()
	{
		wp_enqueue_style("Theme", get_stylesheet_uri() , false, "1.0");	
		wp_enqueue_style("Bootstrap", get_template_directory_uri()."/css/bootstrap.css" , false, "1.0");		
		wp_enqueue_style("superslidesCss", get_template_directory_uri()."/css/superslides.css" , false, "1.0");
		wp_enqueue_style("Owl", get_template_directory_uri()."/js/owl.carousel.2.0.0-beta.2.4/assets/owl.carousel.css" , false, "1.0");
		wp_enqueue_style("font-awesome","http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" , false, "1.0");	
		
		$site_font  = get_field('web_site_font','options');		
		if(!isset($site_font['family'])){
			wp_enqueue_style("GoogleFont","http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900" , false, "1.0");		
		}
		else{
			wp_enqueue_style("GoogleFont", "http://fonts.googleapis.com/css?family=".$site_font['family'].":100,300,400,700" , false, "1.0");
		}		
		
		wp_enqueue_style("AnimateCss", get_template_directory_uri()."/css/animate.css" , false, "1.0");
		wp_enqueue_style("fxfullwidthCss", get_template_directory_uri()."/css/fxfullwidth.css" , false, "1.0");
		wp_enqueue_style("spinners", get_template_directory_uri()."/css/spinners.css" , false, "1.0");
		wp_enqueue_style("titledSlider", get_template_directory_uri()."/css/component.css" , false, "1.0");
		
		wp_enqueue_style("MainCss", get_template_directory_uri()."/css/main.css" , false, "1.0");
		wp_enqueue_style("sth_custom-woocommerce", get_template_directory_uri()."/css/custom-woocommerce.css" , false, "1.0");
		
		$skin = get_field('skin','options');
		if($skin=='dark')
			wp_enqueue_style("darkSkin", get_template_directory_uri()."/css/dark_skin.css" , false, "1.0");
		
	}
	add_action( 'wp_enqueue_scripts', 'add_external_stylesheets' );
/*css*/

/*javascript*/

	function add_external_JS()
	{          
		wp_enqueue_script('jquery'); 	
		wp_enqueue_script("Bootsrap", "http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js",array(),'',TRUE);		
		wp_enqueue_script("OwlCarousel", get_template_directory_uri()."/js/owl.carousel.2.0.0-beta.2.4/owl.carousel.js",array(),'',TRUE);
		wp_enqueue_script("Superslides", get_template_directory_uri()."/js/jquery.superslides.js",array(),'',TRUE);
		wp_enqueue_script("Isotope", get_template_directory_uri()."/js/isotope.pkgd.js",array(),'',TRUE);
		wp_enqueue_script("AnimateEnhanced", get_template_directory_uri()."/js/jquery.animate-enhanced.min.js",array(),'',TRUE);
		
		if(get_field('google_maps_api_key','options')){
			wp_enqueue_script("google_map","https://maps.googleapis.com/maps/api/js?key=".get_field('google_maps_api_key','options'),'','',TRUE);
		} else{
			wp_enqueue_script("google_map","https://maps.googleapis.com/maps/api/js?sensor=true",'','',TRUE);
		}
			
		wp_enqueue_script("Easing", get_template_directory_uri()."/js/jquery.easing.1.3.js",array(),'',TRUE);
		wp_enqueue_script("TouchSwipe", get_template_directory_uri()."/js/jquery.touchSwipe.js",array(),'',TRUE);
		wp_enqueue_script("CarouFredSel", get_template_directory_uri()."/js/jquery.carouFredSel-6.0.4-packed.js",array(),'',TRUE);
		wp_enqueue_script("ProjectLikes", get_template_directory_uri()."/js/projectLike.js",array(),'',TRUE);
		wp_enqueue_script("hammer", get_template_directory_uri()."/js/hammer.min.js",array(),'',TRUE);
		wp_enqueue_script("modernizr", get_template_directory_uri()."/js/modernizr.custom.js",array(),'',TRUE);
		wp_enqueue_script("modernizrTitled", get_template_directory_uri()."/js/titled_slider/modernizr.custom.js",array(),'',TRUE);

		wp_enqueue_script("classieTitled", get_template_directory_uri()."/js/titled_slider/classie.js",array(),'',TRUE);

		wp_enqueue_script("titledSlider", get_template_directory_uri()."/js/tiltSlider.js",array(),'',TRUE);

		wp_enqueue_script("mouseWheel", get_template_directory_uri()."/js/jquery.mousewheel.min.js",array(),'',TRUE);
		wp_enqueue_script("MainJs", get_template_directory_uri()."/js/script.js",array(),'',TRUE);
		wp_enqueue_script("ImagesLoaded", "http://imagesloaded.desandro.com/imagesloaded.pkgd.min.js",'',TRUE);
		wp_enqueue_script("Shortcodes", get_template_directory_uri()."/js/shortcodesScript.js",array(),'',TRUE);
		
		if ( is_singular() ){
			wp_enqueue_script( 'comment-reply','',array(),'',TRUE );
		}			
	}
	add_action( 'wp_enqueue_scripts', 'add_external_JS' );
/*javascript*/	
/*register font*/		
	function register_custom_fonts(){
		$site_font  = get_field('web_site_font','options');
		if(isset($site_font['family'])&&$site_font['family']!=''){
			echo '<style>';
			echo 'body{
					font-family: '.$site_font['family'].' !important;
				}';			
			echo '</style>';
		}
	}
	/*register font*/	
/*Logo Size*/
	function set_logo_dimensioins(){
	
		$logo_height = get_field('logo_height','options');
		$margin_top = round($logo_height/2);
		if($logo_height<=0||!isset($logo_height)){
		  $logo_height = '34';
		  $margin_top = '17';
		}
		
		$logo_width = get_field('logo_width','options');
		if($logo_width<=0||!isset($logo_width)){
		  $logo_width = '100';
		}
		
		 echo   '.center-logo {
				position: absolute;
				top: 50%;
				overflow: hidden;';
				
		echo    'margin-top: -'.$margin_top.'px;';
		echo 	'height: '.$logo_height.'px;';
		echo 	'width: '.$logo_width.'px;';			
		echo    '}';
		
		echo ' .center-logo img{
			width:100%;
		}';
	
	}
/*Logo Size*/
/*Adding likes to project posts*/
	add_action('wp_ajax_stoned_insert_likes', 'stoned_insert_likes');
	add_action('wp_ajax_nopriv_stoned_insert_likes', 'stoned_insert_likes');
	function stoned_insert_likes()
	{
		$post_id = $_POST["post_id"];
		add_like($post_id);
		echo get_post_meta($post_id,'stoned_like',true);
		die();
	}
	function add_like($post_id)
	{
		$like = get_post_meta($post_id,'stoned_like',true);
		$like = $like + 1;
		update_post_meta($post_id,'stoned_like',$like);
	}
	add_action('publish_post', 'add_custom_like');
	function add_custom_like($post_id)
	{
		if ($post->post_date != $post->post_modified)
		{
			global $post;
			setup_postdata( $post );
		 
			if ($_POST['post'] == $post->post_type )
			{
				add_post_meta($post_id, 'stoned_like', 0, true);
			}			
		}
		return true;
	}
/*Adding like to custom post*/	
/*Support Language Translation*/		
	function st_theme_setup(){
		load_theme_textdomain('sth_lang', get_template_directory().'/languages');
	}
	add_action('after_setup_theme', 'st_theme_setup');
/*Support Language Translation*/	

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
/* Google Map */
function sth_acf_google_map_api( $api ){
	
	if(get_field('google_maps_api_key','options')){
		$api['key'] = get_field('google_maps_api_key','options');
	}
	
	return $api;
	
}
add_filter('acf/fields/google_map/api', 'sth_acf_google_map_api');
/* Google Map */
?>