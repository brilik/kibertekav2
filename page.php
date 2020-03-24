<?php

global $themeAR;

get_header();

while ( have_posts() ) :
    the_post();

	if(is_privacy_policy()){
		ar_the_view('privacy-policy');
	} else {
		the_content();
		ar_the_view( 'acf-section' );
	}
endwhile;

get_footer();