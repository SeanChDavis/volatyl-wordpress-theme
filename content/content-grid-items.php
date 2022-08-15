<?php
/**
 * General grid item template and styles
 *
 * Used by blog post archives, but can be used for other queried elements.
 */

// Set the post ID based on query context
$the_post_id = 0;
if ( is_front_page() && ! is_home() ) {
	$the_post_id = $post['ID'];
} else {
	$the_post_id = get_the_ID();
}

// Set the appropriate grid item container classes
$container_classes = array( 'v-grid-item-container' );
if ( is_search() ) {
	$container_classes[] = 'v-subdued';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( implode( ' ', $container_classes ) ); ?>>
	<div class="v-grid-item-content-wrap">
		<?php if ( ! is_search() ) { ?>
			<figure class="v-grid-item-media v-padding-0 v-margin-0">
				<?php if ( has_post_thumbnail( $the_post_id ) ) { ?>
					<a href="<?php echo get_permalink( $the_post_id ); ?>"><?php echo get_the_post_thumbnail( $the_post_id, 'v-grid-item-media_large' ); ?></a>
				<?php } ?>
			</figure>
		<?php } ?>
		<header class="v-grid-item-header">
			<h3 class="h5 v-grid-item-title"><a href="<?php echo get_permalink( $the_post_id ); ?>"><?php echo get_the_title( $the_post_id ); ?></a></h3>
			<span class="v-grid-item-meta"><?php is_search() ? volatyl_posted_on() : ''; volatyl_posted_by( $the_post_id ); ?></span>
		</header>
		<?php if ( ! is_search() ) { ?>
			<section class="v-grid-item-body">
				<p class="v-grid-item-description"><?php echo get_the_excerpt( $the_post_id ); ?></p>
			</section>
		<?php } ?>
		<?php if ( ! is_search() ) { ?>
			<footer class="v-grid-item-footer">
				<p class="read-more"><a class="v-button" href="<?php echo get_permalink( $the_post_id ); ?>"><?php _e( 'Keep reading', 'volatyl'); ?></a></p>
			</footer>
		<?php } ?>
	</div>
</article>
