<?php if ( is_active_sidebar( 'sidebar-primary' ) ) : ?>

	<?php dynamic_sidebar( 'sidebar-primary' ); ?>
	
<?php else : ?>

<aside>
	<h1><?php _e( 'Search', 'blankbase' ); ?></h1>
	<?php get_search_form(); ?>

	<?php if ( has_nav_menu( 'secondary' ) ) : ?>	
		<?php _e( 'Submenu', 'blankbase' ); ?>
		<?php 
			wp_nav_menu( array( 
				'theme_location' => 'secondary',
				'container'      => false
			) ); 
		?>
	<?php endif; ?>

	<h1><?php _e( 'Pages', 'blankbase' ); ?></h1>
	<ul>
	<?php wp_list_pages(); ?>
	</ul>
</aside>

<?php endif; ?>