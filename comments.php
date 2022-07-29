<?php
/**
 * Comments and comment form markup
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	if ( have_comments() ) :
		?>
		<span class="h3 comments-title">
			<?php
			$volatyl_comment_count = get_comments_number();
			if ( '1' === $volatyl_comment_count ) {
				printf(
				/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'volatyl' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf(
				/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $volatyl_comment_count, 'comments title', 'volatyl' ) ),
					number_format_i18n( $volatyl_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</span>

		<?php the_comments_navigation(); ?>

		<div class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'       => 'div',
					'short_ping'  => true,
					'avatar_size' => '60'
				)
			);
			?>
		</div>

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'volatyl' ); ?></p>
		<?php
		endif;

	endif;

	comment_form();
	?>

</div>
