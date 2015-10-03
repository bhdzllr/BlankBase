<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label><?php echo _e( 'Search', 'blankbase' ); ?></label>
	<input type="search" name="s" value="<?php echo get_search_query(); ?>"  placeholder="<?php echo esc_attr__( 'Search for &hellip;', 'blankbase' ); ?>" title="<?php echo esc_attr( 'Search', 'blankbase' ); ?>" />
	<input type="submit" value="<?php echo esc_attr__( 'Search', 'blankbase' ); ?>" />
</form>