<?php
global $themeAR;
get_header();
if ( have_posts() ) :
	echo '<main class="content news-single-page">';
	while ( have_posts() ) : the_post();
		the_content();
		ar_the_view( 'section__news-main-block' );
		ar_the_view( 'section__news-content' );
		ar_the_view( 'section__news-other' );
	endwhile;
	echo '</main>';
endif;
get_footer();