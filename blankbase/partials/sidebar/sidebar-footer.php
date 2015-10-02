<?php if ( is_active_sidebar( 'aside-footer' ) ) : ?>
	
	<?php dynamic_sidebar( 'aside-footer' ); ?>
		
<? else : ?>

	<p>&copy; 2014<?php if ( date( 'Y' ) > '2014' ) echo ' - ' . date( 'Y' ); ?> bhdzllr</p>
	
<?php endif; ?>