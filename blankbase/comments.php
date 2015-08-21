<?php if ( post_password_required() ) return; ?>

<section id="comments">
	<?php if ( have_comments() ) : ?>

		<h1><?php _e( 'Comments', 'blankbase' ); ?></h1>
		<p><?php _e( 'This post currently has')?> <?php comments_number( 'no responses', 'one response', '% responses' ); ?>.</p>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			
			<nav>
				<h2><?php _e( 'Comment navigation', 'blankbase' ); ?></h2>
				<?php previous_comments_link( __( 'Older Comments', 'blankbase' ) ) ?>
				<?php next_comments_link( __( 'Newer Comments', 'blankbase' ) ); ?>
			</nav>

		<?php endif; ?>

		<ol>
			<?php wp_list_comments( array(
				'callback' => 'blankbase_comment_markup',
				'format'   => 'html5',
				'style'    => 'ol'
			) ); ?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			
			<nav>
				<h2><?php _e( 'Comment navigation', 'blankbase' ); ?></h2>
				<?php previous_comments_link( __( 'Older Comments', 'blankbase' ) ) ?>
				<?php next_comments_link( __( 'Newer Comments', 'blankbase' ) ); ?>
			</nav>

		<?php endif; ?>

	<?php else : ?>

		<?php _e( 'No comments yet.', 'blankbase' ); ?>

	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
	
		<?php _e( 'Comments are closed.', 'blankbase' ); ?>
	
	<?php endif; ?>
</section>

<?php if ( comments_open() ) : ?>
<section>
	<?php

	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$comment_form_args = array(		
		'comment_field' => '<label for="comment">' . _x( 'Comment', 'noun' ) . '</label>'
			. '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' . '</textarea>',
		'fields'  => array(
			'author' => '<label for="author">' . __( 'Name', 'blankbase' ) . '</label> '
				. ( $req ? '<span class="required">*</span>' : '' )
				. '<input type="text" id="author" name="author" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />',
			'email' => '<label for="email">' . __( 'Email', 'blankbase' ) . '</label> '
				. ( $req ? '<span class="required">*</span>' : '' )
				. '<input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />',
		),
		'format' => 'html5'
	);

	comment_form( $comment_form_args ); 

	?>
</section>
<?php endif; ?>