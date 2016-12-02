<?php
add_filter('get_avatar','change_avatar_css');		
		function change_avatar_css($class) {
			$class = str_replace("class='avatar", "class='pull-left", $class) ;
			return $class;
		}
		
	if ( ! function_exists( 'sth_muze_comment' ) ) :
	/**
	 * Template for comments and pingbacks.
	 *
	 * To override this walker in a child theme without modifying the comments template
	 * simply create your own sth_muze_comment(), and that function will be used instead.
	 *
	 * Used as a callback by wp_list_comments() for displaying the comments.	
	 */
		function sth_muze_comment( $comment, $args, $depth ) {
			$GLOBALS['comment'] = $comment;
			switch ( $comment->comment_type ) :
				case 'pingback' :
				case 'trackback' :
				// Display trackbacks differently than normal comments.
			?>
			<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
				<p><?php _e( 'Pingback:', 'sth_lang' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'sth_lang' ), '<span class="edit-link">', '</span>' ); ?></p>
			<?php
					break;
				default :
				// Proceed with normal comments.
				global $post;
			?>			
					<li>
						<a class="comment-reply-link" href="" onclick="">									
							<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( '<input type="submit" value="reply"><span class="fa fa-reply"></span>'), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );?>
						</a>					
						<?php
							$avatar_size = 60;
							if ( '0' != $comment->comment_parent )
								$avatar_size = 39;
							echo get_avatar( $comment, $avatar_size );
							?>	
						<h1 class="comment-user"><?php echo get_comment_author_link();?></h1>
						<?php
							echo '<h2 class="comment-user">'.get_comment_date().' , '.get_comment_time().'</h2>';
						?>					
						<div class="comment-text">
							<?php $coment_con  = get_comment_text(); ?>
							<?php echo $coment_con;?>
						</div>				
					</li>
			<?php
				break;
			endswitch; // end comment_type check
		}
		endif;
	/* Comments */
