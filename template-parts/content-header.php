<?php
/**
 * Page header or hero section depending on the context of the page being viewed.
 */

// Set the args for the content header/hero.
// This can create both a hero section like the front page and a standard content header for other pages.
$args = wp_parse_args( $args ?? array(), array(
	'title'           => get_the_title(),
	'description'     => '',
	'is_centered'     => 0,
	'primary_cta'     => array( 'text' => '', 'url' => '' ),
	'secondary_cta'   => array( 'text' => '', 'url' => '' ),
	'is_dark'         => volatyl_has_dark_header(),
	'has_search_form' => false,
) );

// is_centered can also be passed as 'alignment' for back-compat with the front page template
if ( ! $args['is_centered'] && isset( $args['alignment'] ) && 1 === $args['alignment'] ) {
	$args['is_centered'] = 1;
}

// Set the classes for the content header/hero section based on the args passed in.
$content_header_classes = 'content-header';
if ( isset( $args['is_dark'] ) && $args['is_dark'] ) {
	$content_header_classes .= ' v-dark-background';
} else {
	$content_header_classes .= ' v-gray-background';
}
if ( isset( $args['is_centered'] ) && $args['is_centered'] ) {
	$content_header_classes .= ' v-text-align-center';
}

// Determine hero featured image (front page with a static page set only).
$hero_image_html  = '';
$hero_image_style = 'flush';
if ( is_front_page() && volatyl_show_on_front_is_page() ) {
	$front_page_id = (int) get_option( 'page_on_front' );
	if ( has_post_thumbnail( $front_page_id ) ) {
		$hero_image_style = get_theme_mod( 'volatyl_front_page_hero_image_style', 'flush' );
		$hero_image_html  = get_the_post_thumbnail( $front_page_id, 'full' );
		$content_header_classes .= ' has-hero-image hero-image-style-' . esc_attr( $hero_image_style );
	}
}
?>

<section class="<?php echo esc_attr( $content_header_classes ); ?>">
	<div class="inner">
		<?php
		if ( is_front_page() ) {
			?>
			<h1 class="content-header-title"><?php echo wp_kses_post( $args['title'] ); ?></h1>
			<?php if ( ! empty( $args['description'] ) ) { ?>
				<p class="content-header-description"><?php echo wp_kses_post( $args['description'] ); ?></p>
			<?php } ?>
			<?php if ( ! empty( $args['primary_cta']['url'] ) && ! empty( $args['primary_cta']['text'] ) ) { ?>
				<p class="content-header-primary-cta">
					<a href="<?php echo esc_url( $args['primary_cta']['url'] ); ?>" class="v-button v-large"><?php echo esc_html( $args['primary_cta']['text'] ); ?></a>
				</p>
			<?php } ?>
			<?php if ( ! empty( $args['secondary_cta']['url'] ) && ! empty( $args['secondary_cta']['text'] ) ) { ?>
				<p class="content-header-secondary-cta">
					<a href="<?php echo esc_url( $args['secondary_cta']['url'] ); ?>"><?php echo esc_html( $args['secondary_cta']['text'] ); ?></a>
				</p>
			<?php } ?>
			<?php
		} elseif ( is_home() && ! is_front_page() ) {
			$blog_title = get_the_title( get_option( 'page_for_posts' ) );
			if ( get_theme_mod( 'volatyl_blog_title' ) ) {
				$blog_title = get_theme_mod( 'volatyl_blog_title',
						get_the_title( get_option( 'page_for_posts' ) )
				);
			}
			?>
			<h1 class="content-header-title"><?php echo wp_kses_post( $blog_title ); ?></h1>
			<?php if ( get_theme_mod( 'volatyl_blog_description' ) ) { ?>
				<p class="content-header-description"><?php echo wp_kses_post( get_theme_mod( 'volatyl_blog_description' ) ); ?></p>
			<?php } ?>
			<?php if ( get_theme_mod( 'volatyl_blog_search_form', 0 ) ) { ?>
				<div class="content-header-search-form">
					<?php get_search_form(); ?>
				</div>
			<?php } ?>
			<?php
		} elseif ( is_page() ) {
			?>
			<h1 class="content-header-title"><?php echo wp_kses_post( $args['title'] ); ?></h1>
			<?php if ( has_excerpt() ) : ?>
				<p class="content-header-description"><?php echo wp_kses_post( get_the_excerpt() ); ?></p>
			<?php endif; ?>
			<?php
		} elseif ( is_single() ) {
			if ( ! empty( get_the_title() ) ) {
				?>
				<h1 class="content-header-title"><?php echo wp_kses_post( $args['title'] ); ?></h1>
				<?php
			}
		} elseif ( is_search() ) {
			?>
			<h1 class="content-header-title">
				<span class="v-subdued-title v-large">
					<?php printf( esc_html__( 'Search results for:', 'volatyl' ) ); ?>
				</span>
				<?php echo esc_html( get_search_query() ); ?>
			</h1>
			<?php
		} elseif ( is_archive() ) {
			if ( ! empty( get_the_archive_title() ) ) {
				?>
				<h1 class="content-header-title archive-title v-margin-bottom-3"><?php echo wp_kses_post( get_the_archive_title() ); ?></h1>
				<?php
			}
			if ( ! empty( get_the_archive_description() ) ) {
				?>
				<div class="content-header-description">
					<?php echo wp_kses_post( get_the_archive_description() ); ?>
				</div>
				<?php
			}
		} else {
			?>
			<h1 class="content-header-title"><?php echo wp_kses_post( $args['title'] ); ?></h1>
			<?php if ( ! empty( $args['description'] ) ) { ?>
				<p class="content-header-description"><?php echo wp_kses_post( $args['description'] ); ?></p>
			<?php } ?>
			<?php
		}

		// Display the search form if the args say to, and we're not on the blog page
		// that has its own search form display logic.
		if ( $args['has_search_form'] && ! is_home() ) {
			echo '<div class="content-header-search-form">';
			get_search_form();
			echo '</div>';
		}
		?>
	</div>
	<?php if ( $hero_image_html ) : ?>
		<div class="content-header-featured-image">
			<?php echo wp_kses_post( $hero_image_html ); ?>
		</div>
	<?php endif; ?>
</section>