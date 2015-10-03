<?php get_header(); ?>
	
		<main role="main">
			<article id="error">
				<header>
					<h1><?php _e( 'Not Found', 'blankbase' ); ?></h1>
				</header>
				
				<p>
					<?php _e(
						'The requested page can not be found, does not exist or does not exist anymore.
						Please use the navigation, search form or inform the publisher of the website. 
						Thank you.', 'blankbase'
					); ?>
				</p>

				<?php get_search_form(); ?>
			</article>
		</main>
		
		<?php get_sidebar(); ?>

<?php get_footer(); ?>