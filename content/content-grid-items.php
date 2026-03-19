<?php
/**
 * General grid item template and styles
 *
 * Used by blog post archives, but can be used for other queried elements.
 */

$the_post_id = get_the_ID();

// Set the appropriate grid item container classes
$container_classes = array( 'v-grid-item-container' );
if ( is_search() ) {
	$container_classes[] = 'v-subdued';
}
?>

<article id="post-<?php echo $the_post_id; ?>" <?php post_class( implode( ' ', $container_classes ) ); ?>>
	<div class="v-grid-item-content-wrap">
		<?php if ( ! is_search() ) { ?>
			<figure class="v-grid-item-media v-padding-0 v-margin-0">
				<?php if ( has_post_thumbnail( $the_post_id ) ) { ?>
					<a href="<?php echo esc_url( get_permalink( $the_post_id ) ); ?>" aria-hidden="true" tabindex="-1"><?php echo get_the_post_thumbnail( $the_post_id, 'v-grid-item-media_large' ); ?></a>
				<?php } ?>
			</figure>
		<?php } ?>
		<header class="v-grid-item-header">
			<h3 class="h5 v-grid-item-title"><a href="<?php echo esc_url( get_permalink( $the_post_id ) ); ?>"><?php echo esc_html( get_the_title( $the_post_id ) ); ?></a></h3>
			<span class="v-grid-item-meta"><?php is_search() ? volatyl_posted_on() : ''; volatyl_posted_by( $the_post_id ); ?></span>
		</header>
		<?php if ( ! is_search() ) { ?>
			<section class="v-grid-item-body">
				<p class="v-grid-item-description"><?php echo wp_kses_post( get_the_excerpt( $the_post_id ) ); ?></p>
			</section>
		<?php } ?>
		<?php if ( ! is_search() ) { ?>
			<footer class="v-grid-item-footer">
				<p class="read-more"><a href="<?php echo esc_url( get_permalink( $the_post_id ) ); ?>"><?php esc_html_e( 'Continue Reading', 'volatyl' ); ?></a></p>
			</footer>
		<?php } ?>
	</div>
</article>
