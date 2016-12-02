<?php
/*shortcode*/
/*h1*/
add_shortcode('h1', 'st_h1_shortcode');
function st_h1_shortcode($atts, $content)
{
    extract(shortcode_atts( array('type' => ''), $atts));
    return '  <h1>'.$content.'</h1>';
}

/*h1*/
/*h2*/
add_shortcode('h2', 'st_h2_shortcode');
function st_h2_shortcode($atts, $content)
{
    extract(shortcode_atts( array('type' => ''), $atts));
    return '  <h2>'.$content.'</h2>';
}

/*h2*/
/*h3*/
add_shortcode('h3', 'st_h3_shortcode');
function st_h3_shortcode($atts, $content)
{
    extract(shortcode_atts( array('type' => ''), $atts));
    return '  <h3>'.$content.'</h3>';
}
/*h3*/
/*h4*/
add_shortcode('h4', 'st_h4_shortcode');
function st_h4_shortcode($atts, $content)
{
    extract(shortcode_atts( array('type' => ''), $atts));
    return '  <h4>'.$content.'</h4>';
}
/*h4*/
/*h5*/
add_shortcode('h5', 'st_h5_shortcode');
function st_h5_shortcode($atts, $content)
{
    extract(shortcode_atts( array('type' => ''), $atts));
    return '  <h5>'.$content.'</h5>';
}
/*h5*/
/*h6*/
add_shortcode('h6', 'st_h6_shortcode');
function st_h6_shortcode($atts, $content)
{
    extract(shortcode_atts( array('type' => ''), $atts));
    return '  <h6>'.$content.'</h6>';
}
/*h6*/
/*Tab*/
function st_tab_shortcode($atts, $content){
    extract(shortcode_atts( array('title' => '', 'icon' => ''), $atts));
    $return_statement = '<div class="tab-all" data-title="'.$atts['title'].'" data-icon="'.$atts['icon'].'">'.$content.'</div>';	
    return $return_statement;
}
add_shortcode('tab', 'st_tab_shortcode');
/*Tab*/

/*Tab Group*/
function st_tabgroup_shortcode($atts, $content){
    $content = do_shortcode($content);
    $return_statement ='<div class="row-fluid">
						<div class="cm-md-12">
							<div id="col-container1">
								<div class="tabs-container">
									<ul id="myTab" class="nav nav-tabs" role="tablist"></ul>
									<div id="myTabContent" class="tab-content"></div>
									<div class="tabAllHolder">'.$content.'</div>
                        </div></div></div></div>';
    return $return_statement;
}
add_shortcode('tabgroup', 'st_tabgroup_shortcode');
/*Tab Group*/

/*Accordion Item*/
function st_accordion_item_shortcode($atts, $content){
    extract(shortcode_atts( array('title' => ''), $atts));
    $return_statement = '<div class="accHeader" data-title="'.$atts['title'].'">'.$content.'</div>';
    return $return_statement;
}

add_shortcode('accordion_item', 'st_accordion_item_shortcode');
/*Accordion Item*/
/*Accordion*/
function st_accordion_shortcode($atts, $content){
    $content = do_shortcode($content);
    $return_statement = '<div class="shortcode" id="accordion">	
							<div class="accAllHolder">'. $content.'</div></div>';
    return $return_statement;
}
add_shortcode('accordion', 'st_accordion_shortcode');
/*Accordion*/


/*Pricing table*/
function st_priceTable_shortcode($atts, $content){
	$content = do_shortcode($content);
	extract(shortcode_atts( array('title' => ''), $atts));
    $return_statement = '<h4 style="text-align: center;" class="title">'.$atts['title'].'</h4>
						<ul class="list-unstyled text-center list-inline pricing-tables">
							'.$content.'
						</ul>';	
    return $return_statement;
}
add_shortcode('pricetable', 'st_priceTable_shortcode');
/*Pricing table*/

/*Pricing Col*/
function st_priceCol_shortcode($atts, $content){
	$content = do_shortcode($content);
    extract(shortcode_atts( array('title' => '', 'price' => '', 'showcolor' => ''), $atts));
	
	if($atts['showcolor']=='1'){
    $return_statement = '<li class="pricing-col">
								<div class="pricing-col-header important">
										<h3 class="no-margin">'.$atts['title'].'</h3>
										<p class="no-margin">'.$atts['price'].'</p>
								</div>
								<ul class="list-unstyled">'.$content.'</ul>
						</li>';
	}
	else{
		$return_statement = '<li class="pricing-col">
								<div class="pricing-col-header">
										<h3 class="no-margin">'.$atts['title'].'</h3>
										<p class="no-margin">'.$atts['price'].'</p>
								</div>
								<ul class="list-unstyled">'.$content.'</ul>
						</li>';
	}
						
    return $return_statement;
}
add_shortcode('pricecol', 'st_priceCol_shortcode');
/*Pricing Col*/

/*Pricing item*/
function st_priceitem_shortcode($atts, $content){   
    $content = do_shortcode($content);
	extract(shortcode_atts( array('yesno' => ''), $atts));
	if($atts['yesno']=='yes'){
		$return_statement ='<li>
							<i class="fa fa-check-circle-o pull-right brand-color"></i>
							'.$content.'
						</li>';
		}
	else{
	    $return_statement ='<li>
							<i class="fa fa-times-circle-o pull-right"></i>
							'.$content.'
						</li>';
		}
	
    return $return_statement;
}
add_shortcode('priceitem', 'st_priceitem_shortcode');
/*Pricing item*/

/*alertInfo*/
function st_alertInfo_shortcode($atts, $content){
    $content = do_shortcode($content);
    //$return_statement =' <div class="alert alert-info">'.$content.' <i>X</i></div>';
	 extract(shortcode_atts( array('title' => ''), $atts));
	$return_statement = '<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button>'.
							'<h4>'.$atts['title'].'</h4>'.
							'<p class="post-title">'.$content.'</p></div>';
    return $return_statement;
}
add_shortcode('alertInfo', 'st_alertInfo_shortcode');
/*alertInfo*/
/*alertSuccess*/
function st_alertSuccess_shortcode($atts, $content){
    $content = do_shortcode($content);
   // $return_statement =' <div class="alert alert-success">'.$content.' <i>X</i></div>';
	 extract(shortcode_atts( array('title' => ''), $atts));
	$return_statement = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>'.
							'<h4>'.$atts['title'].'</h4>'.
							'<p class="post-title">'.$content.'</p></div>';
    return $return_statement;
}
add_shortcode('alertSuccess', 'st_alertSuccess_shortcode');
/*alertSuccess*/
/*alertError*/
function st_alertError_shortcode($atts, $content){
    $content = do_shortcode($content);
   // $return_statement =' <div class="alert alert-error">'.$content.' <i>X</i></div>';
	 extract(shortcode_atts( array('title' => ''), $atts));
	$return_statement = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>'.
							'<h4>'.$atts['title'].'</h4>'.
							'<p class="post-title">'.$content.'</p></div>';
    return $return_statement;
}
add_shortcode('alertError', 'st_alertError_shortcode');
/*alertError*/
/*alertWarning*/
function st_alertWarning_shortcode($atts, $content){
    $content = do_shortcode($content);
    //$return_statement =' <div class="alert alert-warning">'.$content.' <i>X</i></div>';
	 extract(shortcode_atts( array('title' => ''), $atts));
	$return_statement = '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">&times;</button>'.
							'<h4>'.$atts['title'].'</h4>'.
							'<p class="post-title">'.$content.'</p></div>';
    return $return_statement;
}
add_shortcode('alertWarning', 'st_alertWarning_shortcode');
/*alertWarning*/


/*fontAwesome*/
function st_fontAwesome_shortcode($atts, $content){
    $content = do_shortcode($content);
    extract(shortcode_atts( array('name' => ''), $atts));
	extract(shortcode_atts( array('size' => ''), $atts));    

    $size = $atts['size'];
	$name = $atts['name'];    
   
    $return_statement = '<i class="fa '.$name.' '.$size.'"></i>';
    return $return_statement;
}
add_shortcode('fontAwesome', 'st_fontAwesome_shortcode');

/*fontAwesome*/


/*Layouts*/
function st_full_width_shortcode($atts,$content){
    $content = do_shortcode($content);	
    return "<div class='col-md-12'>{$content}</div>";
	
}
add_shortcode("full_width","st_full_width_shortcode");

function st_half_width_shortcode($atts,$content){
    $content = do_shortcode($content);	
    return "<div class='col-md-6'>{$content}</div>";
}
add_shortcode("half_width","st_half_width_shortcode");

function st_one_third_shortcode($atts,$content){
	 $content = do_shortcode($content);	
    return "<div class='col-md-4'>{$content}</div>";
}
add_shortcode("one_third","st_one_third_shortcode");

function st_one_fourth_shortcode($atts,$content){
	$content = do_shortcode($content);	
    return "<div class='col-md-3'>{$content}</div>";
}
add_shortcode("one_fourth","st_one_fourth_shortcode");

function st_one_sixth_shortcode($atts,$content){
	$content = do_shortcode($content);	
    return "<div class='col-md-2'>{$content}</div>";
}
add_shortcode("one_sixth","st_one_sixth_shortcode");
/*Layouts*/

/*Slider*/
function st_sliderimages_shortcode($atts, $content){
	extract(shortcode_atts( array('src' => ''), $atts));
	$return_statement = '<div>
							<img src="'.$atts['src'].'">
						</div>';	
    return $return_statement;
}
add_shortcode('sliderimage', 'st_sliderimages_shortcode');

function st_slider_shortcode($atts, $content){
	$content = do_shortcode($content);
	extract(shortcode_atts( array('title' => ''), $atts));
	$return_statement = '<h4 class="title">'.$atts['title'].'</h4>
						<div class="slider-shortcode-container">
							<div class="slider-shortcode">
								'.$content.'
							</div>
							<nav class="slides-navigation nav1">
								<div class="slide-controls">
									<a href="#" class="prev"><i class="fa fa-angle-left"></i></a>
									<span>1/3</span>
									<a href="#" class="next"><i class="fa fa-angle-right"></i></a>
								</div>
							</nav>
						</div>';
    return $return_statement;
}
add_shortcode('st_slider', 'st_slider_shortcode');
/*Slider*/

/*Buttons*/
function st_btn_grey_shortcode($atts,$content){
	$content = do_shortcode($content);	
	extract(shortcode_atts( array('link' => '', 'filled' => ''), $atts));
	
	if(isset($atts['filled']) && $atts['filled']=='1'){
		return '<a href="'.$atts['link'].'" class="button grey filled">'.$content.'</a>';
	}
	else{
		if(isset($atts['link']))
			return  '<a href="'.$atts['link'].'" class="button grey">'.$content.'</a>';
		else
			return  '<a href="" class="button grey">'.$content.'</a>';
	}
}
add_shortcode("btn_grey","st_btn_grey_shortcode");

function st_btn_yellow_shortcode($atts,$content){
	$content = do_shortcode($content);	
	extract(shortcode_atts( array('link' => '', 'filled' => ''), $atts));
	if(isset($atts['filled']) && $atts['filled']=='1'){
		return '<a href="'.$atts['link'].'" class="button yellow filled">'.$content.'</a>';
	}
	else{
		if(isset($atts['link']))
			return  '<a href="'.$atts['link'].'" class="button yellow">'.$content.'</a>';
		else
			return  '<a href="" class="button yellow">'.$content.'</a>';
	}
}
add_shortcode("btn_yellow","st_btn_yellow_shortcode");

function st_btn_black_shortcode($atts,$content){
	$content = do_shortcode($content);	
	extract(shortcode_atts( array('link' => '', 'filled' => ''), $atts));
	if(isset($atts['filled']) && $atts['filled']=='1'){
		return '<a href="'.$atts['link'].'" class="button black filled">'.$content.'</a>';
	}
	else{
		if(isset($atts['link']))
			return  '<a href="'.$atts['link'].'" class="button black">'.$content.'</a>';
		else
			return  '<a href="" class="button black">'.$content.'</a>';
	}
}
add_shortcode("btn_black","st_btn_black_shortcode");

function st_btn_red_shortcode($atts,$content){
	$content = do_shortcode($content);	
	extract(shortcode_atts( array('link' => '', 'filled' => ''), $atts));
	if(isset($atts['filled']) && $atts['filled']=='1'){
		return '<a href="'.$atts['link'].'" class="button red filled">'.$content.'</a>';
	}
	else{
		if(isset($atts['link']))
			return  '<a href="'.$atts['link'].'" class="button red">'.$content.'</a>';
		else
			return  '<a href="" class="button red">'.$content.'</a>';
	}
}
add_shortcode("btn_red","st_btn_red_shortcode");

function st_btn_orange_shortcode($atts,$content){
	$content = do_shortcode($content);	
	extract(shortcode_atts( array('link' => '', 'filled' => ''), $atts));
	if(isset($atts['filled']) && $atts['filled']=='1'){
		return '<a href="'.$atts['link'].'" class="button orange filled">'.$content.'</a>';
	}
	else{
		if(isset($atts['link']))
			return  '<a href="'.$atts['link'].'" class="button orange">'.$content.'</a>';
		else
			return  '<a href="" class="button orange">'.$content.'</a>';
	}
}
add_shortcode("btn_orange","st_btn_orange_shortcode");

function st_btn_green_shortcode($atts,$content){
	$content = do_shortcode($content);	
	extract(shortcode_atts( array('link' => '', 'filled' => ''), $atts));
	if(isset($atts['filled']) && $atts['filled']=='1'){
		return '<a href="'.$atts['link'].'" class="button green filled">'.$content.'</a>';
	}
	else{
		if(isset($atts['link']))
			return  '<a href="'.$atts['link'].'" class="button green">'.$content.'</a>';
		else
			return  '<a href="" class="button green">'.$content.'</a>';
	}
}
add_shortcode("btn_green","st_btn_green_shortcode");

function st_btn_blue_shortcode($atts,$content){
	$content = do_shortcode($content);
	extract(shortcode_atts( array('link' => '', 'filled' => ''), $atts));
	if(isset($atts['filled']) && $atts['filled']=='1'){
		return '<a href="'.$atts['link'].'" class="button blue filled">'.$content.'</a>';
	}
	else{
		if(isset($atts['link']))
			return  '<a href="'.$atts['link'].'" class="button blue">'.$content.'</a>';
		else
			return  '<a href="" class="button blue">'.$content.'</a>';
	}	
}
add_shortcode("btn_blue","st_btn_blue_shortcode");

function st_btn_purple_shortcode($atts,$content){
	$content = do_shortcode($content);	
	extract(shortcode_atts( array('link' => '', 'filled' => ''), $atts));
	if(isset($atts['filled']) && $atts['filled']=='1'){
		return '<a href="'.$atts['link'].'" class="button purple filled">'.$content.'</a>';
	}
	else{
		if(isset($atts['link']))
			return  '<a href="'.$atts['link'].'" class="button purple">'.$content.'</a>';
		else
			return  '<a href="" class="button purple">'.$content.'</a>';
	}	
}
add_shortcode("btn_purple","st_btn_purple_shortcode");

/*Buttons*/

/*Testimonials*/
function st_testimonials_shortcode($atts,$content){
	$content = do_shortcode($content);	
	extract(shortcode_atts( array('title'=>'','top_left' => '',  'author' =>'', 'author_position' => '', 'image_url' => ''), $atts));
	$position = $atts['top_left'];
	if($position=='top'){
		return '<h4 style="text-align: center;" class="title">'.$atts['title'].'</h4>
				<div class="testmonial">
					<div class="testmonial-image">
						<div class="mosaic-square">
							<div class="mosaic-inside">
								<div class="overlay-container img-circle">
									<div class="overlay img-circle brand-color"></div>
									<img src="'.$atts['image_url'].'">
								</div>
							</div>
						</div>
					</div>
					<p class="text-center no-margin">'.$atts['author_position'].'</p>
					<h4 class="text-center testmonial-author">'.$atts['author'].'</h4>
					<div class="text-center">	
						'.$content.'
					</div>
				</div>';
	}
	else{
		return '<h4 style="text-align: center;" class="title">'.$atts['title'].'</h4>
				<div class="testmonial horizontal">
					<div class="testmonial-image">
						<div class="mosaic-square">
							<div class="mosaic-inside">
								<div class="overlay-container img-circle">
									<div class="overlay img-circle brand-color"></div>
									<img src="'.$atts['image_url'].'">
								</div>
							</div>
						</div>
					</div>
					<div class="testmonial-text">
						<p class="no-margin">'.$atts['author_position'].'</p>
						<h4 class="testmonial-author">'.$atts['author'].'</h4>
						<div class="">	
							'.$content.'
						</div>
					</div>
				</div>';
	}	
}
add_shortcode("testimonials","st_testimonials_shortcode");
/*Testimonials*/
/*BlockQoute*/
function st_stblockqoute_shortcode($atts,$content){
	$content = do_shortcode($content);	
	extract(shortcode_atts( array('title'=>'','top_left' => '',  'author' =>''), $atts));
	$position = $atts['top_left'];
	if($position=='top'){
		return '<h4 class="title">'.$atts['title'].'</h4>
				<div class="blockquote">
					<div class="quote text-center">
						<img src="'.get_template_directory_uri().'/img/quote.png">
					</div>
					<div class="text text-center">
						'.$content.'
						<p class="author"><b>'.$atts['author'].'</b></p>
					</div>
				</div>';
	}
	else{
		return '<h4 class="title">'.$atts['title'].'</h4>
				<div class="blockquote2">
					<div class="quote text-center">
						<img src="'.get_template_directory_uri().'/img/quote.png">
					</div>
					<div class="text">
						'.$content.'
						<span class="pull-right author"><b>'.$atts['author'].'</b></span></p>
					</div>
				</div>';
	}	
}
add_shortcode("stblockquote","st_stblockqoute_shortcode");
/*BlockQoute*/

/*shortcode*/

/*Generics*/

add_action('after_setup_theme', 'add_buttons');
function add_buttons() {
    if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
        return;
    }
    if ( get_user_option('rich_editing') == 'true' ) {
        add_filter( 'mce_external_plugins', 'add_plugin' );
        add_filter( 'mce_buttons_3', 'register_button_3' );
		add_filter('mce_buttons_4', 'register_button_4');
    }
}


function register_button_4( $buttons ) {
	 array_push( $buttons, "separator","headings" ); 
	array_push( $buttons, "separator","tabs" );
	array_push( $buttons, "separator","accordion" );
	array_push( $buttons, "separator","PricingTables" );
	array_push( $buttons, "separator","alertInfo" );
    array_push( $buttons, "separator","alertSuccess" );
    array_push( $buttons, "separator","alertError" );
    array_push( $buttons, "separator","alertWarning" );
	array_push( $buttons, "separator","columns" ); 
	array_push( $buttons, "separator","full_width" );
	array_push( $buttons, "separator","half_width" );
	array_push( $buttons, "separator","one_third" );
	array_push( $buttons, "separator","one_fourth" );
	array_push( $buttons, "separator","one_sixth" );
	array_push( $buttons, "separator","st_slider" );
	array_push( $buttons, "separator","buttons" );
	array_push( $buttons, "separator","testimonials" );
	array_push( $buttons, "separator","stblockquote" );
    return $buttons;
}


function register_button_3( $buttons ) {
	array_push($buttons,"separator",'fontAwesome');
    return $buttons;
}

function add_plugin( $plugin_array ) {
   
	$plugin_array['headings'] = get_template_directory_uri() . '/js/tiny_mce_buttons.js';
	$plugin_array['tabs'] = get_template_directory_uri() . '/js/tiny_mce_buttons.js';
    $plugin_array['accordion'] = get_template_directory_uri() . '/js/tiny_mce_buttons.js';
	$plugin_array['PricingTables'] = get_template_directory_uri() . '/js/tiny_mce_buttons.js';
	$plugin_array['alertInfo'] = get_template_directory_uri() . '/js/tiny_mce_buttons.js';
    $plugin_array['alertSuccess'] = get_template_directory_uri() . '/js/tiny_mce_buttons.js';
    $plugin_array['alertError'] = get_template_directory_uri() . '/js/tiny_mce_buttons.js';
    $plugin_array['alertWarning'] = get_template_directory_uri() . '/js/tiny_mce_buttons.js';	
	$plugin_array['fontAwesome'] = get_template_directory_uri() . '/js/tiny_mce_buttons.js';
	$plugin_array['columns'] = get_template_directory_uri() . '/js/tiny_mce_buttons.js';
	$plugin_array['full_width'] = get_template_directory_uri() . '/js/tiny_mce_buttons.js';
	$plugin_array['half_width'] = get_template_directory_uri() . '/js/tiny_mce_buttons.js';
	$plugin_array['one_third'] = get_template_directory_uri() . '/js/tiny_mce_buttons.js';
	$plugin_array['one_fourth'] = get_template_directory_uri() . '/js/tiny_mce_buttons.js';
	$plugin_array['one_sixth'] = get_template_directory_uri() . '/js/tiny_mce_buttons.js';	
	$plugin_array['st_slider'] = get_template_directory_uri() . '/js/tiny_mce_buttons.js';
	$plugin_array['buttons'] = get_template_directory_uri() . '/js/tiny_mce_buttons.js';
	$plugin_array['testimonials'] = get_template_directory_uri() . '/js/tiny_mce_buttons.js';
	$plugin_array['stblockquote'] = get_template_directory_uri() . '/js/tiny_mce_buttons.js';
    return $plugin_array;
}

add_filter( 'mce_external_plugins', 'add_plugin' );

/*Generics*/

//require_once "dialog-forms.php";

?>