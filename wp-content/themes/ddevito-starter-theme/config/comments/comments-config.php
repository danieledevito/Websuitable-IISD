<?php

/**
 * Config file for comments
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

$commenter = wp_get_current_commenter();
$user = wp_get_current_user();
$user_identity = $user->exists() ? $user->display_name : '';

$req      = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );
$html_req = ( $req ? " required='required'" : '' );
$html5    = 'html5';

/* =========================
 * Change anything in the $fields array to override default core behavior.
 *
 * filter -> comment_form_default_fields
 *  ========================= */
$fields = array(
	'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' /></p>',
			'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			            '<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></p>',
			'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label> ' .
			            '<input id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
);

return array(
	'components'    => array(

		'form_defaults_overwrite'    => array(
			'fields'               => $fields, // change the $fields array above.

//			'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label> <textarea id="comment" name="comment" cols="45" rows="8"  aria-required="true" required="required"></textarea></p>',
//			/** This filter is documented in wp-includes/link-template.php */
//			'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
//			/** This filter is documented in wp-includes/link-template.php */
//			'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
//			'comment_notes_before' => '<p class="comment-notes"><span id="email-notes">' . __( 'Your email address will not be published.' ) . '</span>'. ( $req ? $required_text : '' ) . '</p>',
//			'comment_notes_after'  => '',
//			'id_form'              => 'commentform',
//			'id_submit'            => 'submit',
			'class_submit'         => 'submit button',
//			'name_submit'          => 'submit',
//			'title_reply'          => __( 'Leave a Reply' ),
//			'title_reply_to'       => __( 'Leave a Reply to %s' ),
//			'cancel_reply_link'    => __( 'Cancel reply' ),
			'label_submit'         => __( 'Post Comment' ),
//			'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
//			'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
//			'format'               => 'xhtml',
		),
	),
);