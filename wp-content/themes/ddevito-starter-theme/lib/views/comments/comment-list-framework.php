<?php

/**
 * Comment list framework
 *
 * Replaces the core comment item output.
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */
?>

<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?>>
<article id="div-comment-<?php comment_ID(); ?>" class="comment-body row">
	<?php if ( 0 != $args['avatar_size'] ) { ?>
	<div class="large-3 columns avatar-container">
		<?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
	</div>
	<div class="large-9 columns comment-container">
		<?php } ?>
		<div class="comment-inner-wrap">

			<div class="comment-meta">
				<div class="comment-author vcard">
					<?php printf( __( '%s <span class="says">says:</span>' ), sprintf( '<b class="fn">%s</b>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author -->

				<div class="comment-metadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'tbsc' ), get_comment_date(), get_comment_time() ); ?>
						</time>
					</a>
					<?php edit_comment_link( __( 'Edit', 'tbsc' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-metadata -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'tbsc' ); ?></p>
				<?php endif; ?>
			</div><!-- .comment-meta -->

			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->

			<div class="reply">
				<?php
				comment_reply_link( array_merge( $args, array(
					'add_below' => 'div-comment',
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
					'before'    => '',
					'after'     => ''
				) ) );
				?>
			</div><!-- end .reply -->

		</div><!-- .comment-inner-wrap -->
		<?php if ( 0 != $args['avatar_size'] ) { ?>
	</div><!-- end .comment-container .columns -->
<?php } ?>
</article><!-- end .comment-body .row -->
