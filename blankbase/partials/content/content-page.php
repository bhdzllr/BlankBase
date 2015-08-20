		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php the_post_thumbnail(); ?>
			
			<header>
				<h1><?php the_title(); ?></h1>
			</header>
			
			<div>
				<?php the_content(); ?>
			</div>
			
			<?php if ( wp_link_pages() || edit_post_link() ) : ?>
			<footer>
				<?php
				
				wp_link_pages();
					
				edit_post_link( __( 'Edit', 'blankbase' ) );
				
				?>
			</footer>
			<?php endif; ?>
		</article>