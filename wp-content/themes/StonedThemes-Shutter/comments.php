<div class="comments">
<?php if (comments_open() ):?>
   <h4 class="title"><?php _e('Leave a comment','sth_lang');?></h4>
	<div class="row">
		<?php

		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );

		$name        = 'Name';
		$authorEmail = "Email";
		$website = "Website";

		$comment_args = array(
			'id_form' => 'commentform',
			'id_submit' => 'submit',
			'title_reply' => '',
			'title_reply_to' => __( 'Leave a Reply to %s','sth_lang' ),
			'cancel_reply_link' => __( 'Cancel Reply','sth_lang' ),
			'label_submit' => __( 'leave comment','sth_lang' ),
			'comment_field' => '<div class="col-md-12"><textarea class="field-color-2" id="comment" name="comment" aria-required="true" placeholder="your comment goes here..."></textarea></div><div class="col-md-12">',
			'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
			'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
			'comment_notes_before' => '',
			'comment_notes_after' => '',
			'fields' => apply_filters( 'comment_form_default_fields', array(
					'author' => '<div class="col-md-4"><input placeholder="'.esc_attr($name)  .'" id="author" name="author" type="text" class="field-color-2" value="" ' . $aria_req . ' /></div>',
					'email' => '<div class="col-md-4"><input placeholder="'.esc_attr($authorEmail)  .'" id="email" name="email" type="text" class="field-color-2" value=""' . $aria_req . ' /></div>',
					'website' => '<div class="col-md-4"><input placeholder="'.esc_attr($website)  .'" id="website" name="website" type="text" class="field-color-2" value=""' . $aria_req . ' /></div>'
				)
			)
		);

		?>
		<?php comment_form( $comment_args); ?>	
		</div>
	</div><!--row-->
<?php  endif; ?>

  
    <?php if ( post_password_required() ) : ?>
    <p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'sth_lang' ); ?></p>
		
		<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
		endif;		
		?>
	
		<?php if ( have_comments() ) : ?>
		    <div class="current-comments">
				<ul>
					<?php           
						wp_list_comments( array( 'callback' => 'sth_muze_comment' ) );
					?>
				</ul>
			</div><!-- #current-comments -->
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
				<nav id="comment-nav-below">
					<div class="nav-previous"><?php previous_comments_link('&larr; Previous'); ?></div>
					<div class="nav-next"><?php next_comments_link('Next &rarr;'); ?></div>
				</nav>
			<?php endif; // check for comment navigation ?>

			<?php
			/* If there are no comments and comments are closed, let's leave a little note, shall we?
			 * But we only want the note on posts and pages that had comments in the first place.
			 */
			if ( ! comments_open() && get_comments_number() ) : ?>
				<p class="nocomments"><?php _e( 'Comments are closed.' , 'sth_lang' ); ?></p>
			<?php endif; ?>

		<?php endif; // have_comments() ?>
	
</div><!-- #comments -->
