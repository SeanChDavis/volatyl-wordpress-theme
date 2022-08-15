<?php // Template part for displaying content in the full-width templates ?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'v-content-container' ); ?>>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
</div>
