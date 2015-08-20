		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php the_post_thumbnail(); ?>
			
			<header>
				<h1><?php the_title(); ?></h1>
			</header>
			
			<div>
				<?php the_excerpt(); ?>
			</div>
		</article>