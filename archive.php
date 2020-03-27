<?php

get_header();

echo '<main class="content news-page">';

if ( have_posts() ) :
	ar_the_view( 'section__archive-main-block' );
	ar_the_view( 'section__archive-news' );
	ar_the_view( 'section__archive-stock' );
else:
	ar_the_view( 'section__not-page' );
endif;

echo '</main>';

get_footer();