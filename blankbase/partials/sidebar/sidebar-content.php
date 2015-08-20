<?php

if ( ! is_active_sidebar( 'aside-content' ) ) {
	return;
}

?>

<?php dynamic_sidebar( 'aside-content' ); ?>