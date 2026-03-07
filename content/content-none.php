<?php // When there's no relevant content to display

$nothing_found = __( 'Nothing Found', 'volatyl' );

if ( is_home() && current_user_can( 'publish_posts' ) ) :
	?>
	<span class="h3"><?php echo $nothing_found; ?></span>
	<?php
	printf(
			'<p>' . wp_kses(
			/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'volatyl' ),
					array(
							'a' => array(
									'href' => array(),
							),
					)
			) . '</p>',
			esc_url( admin_url( 'post-new.php' ) )
	);
elseif ( is_search() ) :
	?>
	<p><?php esc_html_e( 'Sorry. Nothing matched your search terms. Try different keywords. Or...', 'volatyl' ); ?></p>
	<p><a class="button" href="<?php echo home_url(); ?>"><?php esc_html_e( 'Return to Home', 'volatyl' ); ?></a></p>
<?php
elseif ( is_404() ) :
	?>
	<p><a class="button" href="<?php echo home_url(); ?>"><?php esc_html_e( 'Return to Home', 'volatyl' ); ?></a></p>
	<?php
else :
	?>
	<span class="h3"><?php echo $nothing_found; ?></span>
	<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Searching can help.', 'volatyl' ); ?></p>
	<?php
	get_search_form();
endif;