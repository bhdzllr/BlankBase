		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php the_post_thumbnail(); ?>
			
			<header>
				<?php if ( is_single() ) : ?>
				
					<h1><?php the_title(); ?></h1>
					
				<?php else : ?>
				
					<h1>
						<a href="<?php esc_url( the_permalink() ); ?>" title="<?php _e( 'Permalink to ', 'blankbase' ); the_title(); ?>" rel="bookmark">
							<?php the_title(); ?>
						</a>
					</h1>
					
				<?php endif; ?>
				
				<div>
					<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
					
						<?php _e( 'Featured', 'blankbase' ); ?>
							
					<?php endif; ?>
					
					<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'd.m.Y, H:m' ) ); ?></time>
					
					<a href="<?php echo esc_attr( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo get_the_author(); ?>"><?php the_author(); ?></a>
					
					<a class="entry-format" href="<?php echo esc_url( get_post_format_link( 'quote' ) ); ?>"><?php echo get_post_format_string( 'quote' ); ?></a>
					
					<?php comments_popup_link( 
						__( 'Leave a comment', 'blankbase' ), 
						__( '1 Comment', 'blankbase' ), 
						__( '% Comments', 'blankbase' ) 
					); ?>
					
					<?php edit_post_link( __( 'Edit', 'blankbase' ) ); ?>
				</div>
			</header>
			
			<div>
				<?php 
				
				the_content();

				wp_link_pages();
				
				?>
			</div>
			
			<footer>
				<?php the_category( ', ' ); ?>
				<?php the_tags( ', ' ); ?>
				
				<?php if ( is_singular() && get_the_author_meta( 'description' ) ) : ?>
				
					<?php the_author(); ?>
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 32, null, get_the_author() ); ?>
					<?php the_author_meta( 'description' ); ?>
					
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
						<?php _e( 'View all posts by', 'blankbase' ); ?>
						<?php the_author(); ?>
					</a>
					
				<?php endif; ?>
			</footer>	
		</article>