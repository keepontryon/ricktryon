<?php 
function brand_color($brand_color,$opacity){

	 list($r, $g, $b) = sscanf($brand_color, "#%02x%02x%02x");
	 $rgba =  "$r".","."$g".","."$b".",".($opacity/10);

	
	echo 'a:hover, .nav2 a:hover span, .nav2 a:hover, .button.dark:hover, .filters a:hover, .brand-color, .comment-reply-link input[type="submit"], .comment-reply-link span, 
			.contact-item-icon, .nav-tabs > li > a:hover, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus, .widget .menu li a:hover, 
			.alt-filtering a:hover, .alt-filtering > a:hover:after, .blog2-item:hover > h4 > a, .home-products h5 a:hover {
				color: '.$brand_color.';/*brand*/
			}

			.overlay.brand-color{
				background: rgba('.$rgba.');
			}

			input[type="text"]:focus, textarea:focus, .box, .tags a:hover{
				border: 2px solid '.$brand_color.';
			}

			.important{
				background: '.$brand_color.'; /*brand*/
			}';
	
}
function overlay($overlay_color , $opacity){

	 list($r, $g, $b) = sscanf($overlay_color, "#%02x%02x%02x");
	 $rgba =  "$r".","."$g".","."$b".",".($opacity/10);

	
	echo '.overlay.dark{
				background: rgba('.$rgba.');
			}';
	
}
function back_color($color){
	echo 'body{
		background: '.$color.';
	}';
}
function headings_color($color){
	echo 'h1, h2, h3, h4, h5, h6{
			color: '.$color.';
		}';
}
function paragraphs_color($color){
	echo 'p{
			color: '.$color.';
		}';
}
?>
