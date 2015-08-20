<?php if ( is_active_sidebar( 'sidebar-primary' ) ) : ?>

	<?php dynamic_sidebar( 'sidebar-primary' ); ?>
	
<?php else : ?>

	<?php _e( 'Search', 'blankbase' ); ?>
	<?php get_search_form(); ?>

	<?php _e( 'Submenu', 'blankbase' ); ?>
	<?php 
		wp_nav_menu( array( 
			'theme_location' => 'secondary' 
		) ); 
	?>

	<?php _e( 'Pages', 'blankbase' ); ?>
	<ul>
	<?php wp_list_pages(); ?>
	</ul>

<?php endif; ?>