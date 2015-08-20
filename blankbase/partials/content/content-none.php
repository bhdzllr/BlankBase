		<article id="post-none">
			<header>
				<h1><?php _e( 'Nothing found', 'blankbase' ); ?></h1>
			</header>
		
			<div>
				<?php if ( is_search() ) : ?>

					<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'blankbase' ); ?></p>
					<?php get_search_form(); ?>

				<?php else : ?>

					<p><?php _e( 'Sorry, no content here.', 'blankbase' ); ?></p>
					<?php get_search_form(); ?>

				<?php endif; ?>
			</div>
		</article>