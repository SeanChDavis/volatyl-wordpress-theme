<?php
/**
 * Page header or hero section depending on the context of the page being viewed.
 */

$front_page_hero_dark = volatyl_front_page_hero_dark();
$hero_bg_color      = 'v-gray-background';
if ( $front_page_hero_dark && is_front_page() && ! is_home() ) {
	$hero_bg_color = 'v-dark-background';
}
?>

<section class="content-header <?php echo $hero_bg_color; ?>">
	<div class="inner v-small">
		<?php
		if ( is_front_page() && ! is_home() ) {
			$front_page_hero_title = get_bloginfo( 'description' ) ?: sprintf( 'Welcome to %1$s', get_bloginfo( 'name' ) );
			if ( ! empty( get_theme_mod( 'volatyl_front_page_hero_title' ) ) ) {
				$front_page_hero_title = get_theme_mod( 'volatyl_front_page_hero_title' );
			}
			$hero_args = array(
					'title'         => $front_page_hero_title,
					'subtitle'      => get_theme_mod( 'volatyl_front_page_hero_subtitle', '' ),
					'alignment'     => get_theme_mod( 'volatyl_front_page_hero_centered', 0 ),
					'primary_cta'   => array(
							'url'  => get_theme_mod( 'volatyl_front_page_hero_primary_cta_button_url', '' ),
							'text' => get_theme_mod( 'volatyl_front_page_hero_primary_cta_button_text', '' ),
					),
					'secondary_cta' => array(
							'url'  => get_theme_mod( 'volatyl_front_page_hero_secondary_cta_button_url', '' ),
							'text' => get_theme_mod( 'volatyl_front_page_hero_secondary_cta_button_text', '' ),
					),
			);
			volatyl_hero( $hero_args );
		} elseif ( is_home() && ! is_front_page() ) {
			$blog_title = get_the_title( get_option( 'page_for_posts' ) );
			if ( get_theme_mod( 'volatyl_blog_title' ) ) {
				$blog_title = get_theme_mod( 'volatyl_blog_title',
						get_the_title( get_option( 'page_for_posts' ) )
				);
			}
			?>
			<div class="content-container">
				<div class="content-primary">
					<h1 class="content-title"><?php echo $blog_title; ?></h1>
					<?php if ( get_theme_mod( 'volatyl_blog_description' ) ) { ?>
						<p class="content-description"><?php echo get_theme_mod( 'volatyl_blog_description' ); ?></p>
					<?php } ?>
				</div>
				<?php if ( get_theme_mod( 'volatyl_blog_search_form', 0 ) ) { ?>
					<div class="content-secondary">
						<?php get_search_form(); ?>
					</div>
				<?php } ?>
			</div>
			<?php
		} elseif ( is_page() ) {
			?>
			<h1 class="content-title"><?php echo get_the_title(); ?></h1>
			<?php if ( has_excerpt() ) : ?>
				<p class="content-description"><?php echo get_the_excerpt(); ?></p>
			<?php endif; ?>
			<?php
		} elseif ( is_single() ) {
			if ( ! empty( get_the_title() ) ) {
				?>
				<h1 class="content-title"><?php echo get_the_title(); ?></h1>
				<?php
			}
		} elseif ( is_search() ) {
			?>
			<div class="content-container">
				<div class="content-primary">
					<h1 class="content-title">
						<span class="v-subdued-title v-large">
							<?php printf( esc_html__( 'Search results for:', 'volatyl' ) ); ?>
						</span>
						<?php echo esc_html( get_search_query() ); ?>
					</h1>
				</div>
				<div class="content-secondary">
					<?php get_search_form(); ?>
				</div>
			</div>
			<?php
		} elseif ( is_archive() ) {
			if ( ! empty( get_the_archive_title() ) ) {
				?>
				<h1 class="content-title archive-title v-margin-bottom-3"><?php echo get_the_archive_title(); ?></h1>
				<?php
			}
			if ( ! empty( get_the_archive_description() ) ) {
				?>
				<div class="content-description">
					<?php echo get_the_archive_description(); ?>
				</div>
				<?php
			}
		}
		?>
	</div>
</section>


