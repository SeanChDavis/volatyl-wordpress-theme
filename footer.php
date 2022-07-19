<?php
/**
 * Closing body tag and full site footer
 */
?>

	<footer class="site-footer">
		<div class="inner">
			<div class="site-info">
				<?php echo bloginfo( 'name' ) . ' &copy; ' . date('Y'); ?>
			</div>
		</div>
	</footer>

</div><!--#page-->

<?php wp_footer(); ?>
</body>

</html>