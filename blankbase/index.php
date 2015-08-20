<h1>BlankBase</h1>

<?php

if ( have_posts() ) :

	/** the loop */
	while ( have_posts() ) : the_post(); ?>
		
		<article>
			<header>
				<h2><?php the_title(); ?></h2>
			</header>

			<?php the_content(); ?>
		</article>

		<hr />
		
	<?php endwhile;

else:

	_e( 'Nothing here.', 'blankbase' );

endif;

?>