<?php

global $themeAR;

get_header();
echo '<main class="content">';
while ( have_posts() ) :
    the_post();
    the_content();
    ar_the_view( 'acf-section' );
endwhile;
echo '</main>';
get_footer();