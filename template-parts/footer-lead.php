<?php // Call-to-action above all footer elements
$volatyl_footer_lead_title           = get_theme_mod( 'volatyl_footer_lead_title' );
$volatyl_footer_lead_description     = get_theme_mod( 'volatyl_footer_lead_description' );
$volatyl_footer_lead_cta_button_url  = get_theme_mod( 'volatyl_footer_lead_cta_button_url' );
$volatyl_footer_lead_cta_button_text = get_theme_mod( 'volatyl_footer_lead_cta_button_text' );
?>

<div class="footer-lead v-dark-background">
	<div class="inner v-small">
		<div class="footer-lead-cta v-grid v-grid-columns_2">
			<?php if ( $volatyl_footer_lead_title || $volatyl_footer_lead_description ) { ?>
				<div class="cta-content">
					<?php if ( $volatyl_footer_lead_title ) { ?>
						<span class="h3 cta-title"><?php echo $volatyl_footer_lead_title; ?></span>
					<?php } ?>
					<?php if ( $volatyl_footer_lead_description ) { ?>
						<p><?php echo $volatyl_footer_lead_description; ?></p>
					<?php } ?>
				</div>
			<?php } ?>
			<?php if ( $volatyl_footer_lead_cta_button_url && $volatyl_footer_lead_cta_button_text ) { ?>
				<div class="cta-action">
					<a href="<?php echo $volatyl_footer_lead_cta_button_url; ?>" class="v-button v-large"><?php echo $volatyl_footer_lead_cta_button_text; ?></a>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
