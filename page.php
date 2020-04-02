<?php
global $themeAR;
get_header();
while ( have_posts() ) :
	the_post();
	$style = '';
	if ( ! empty( get_field( 'block_style' ) ) ) {
		$style = get_field( 'block_style' );
	}
	if ( is_privacy_policy() ) {
		echo '<main class="content">';
		ar_the_view( 'privacy-policy' );
		echo '</main>';
		continue 1;
	}
	the_content();
	switch ( $style ):
		case 'faq':
			echo '<main class="content">';
			ar_the_view( 'section__page-main-block' );
			ar_the_view( 'section__page-faq' );
			echo '</main>';
			break;
		case 'events':
			echo '<main class="content">';
			ar_the_view( 'section__page-main-block' );
			ar_the_view( 'section__page-events' );
			echo '</main>';
			break;
		case 'contacts':
			echo '<main class="content contacts-page">';
			ar_the_view( 'section__page-main-block' );
			ar_the_view( 'section__page-contacts' );
			echo '</main>';
			break;
		case 'investors':
			echo '<main class="content">';
			ar_the_view( 'section__page-main-block' );
			ar_the_view( 'section__page-investors' );
			echo '</main>';
			break;
		case 'library':
			echo '<main class="content library-page">';
			ar_the_view( 'section__page-main-block' );
			ar_the_view( 'section__page-library' );
			echo '</main>';
			break;
		case 'rules_page':
			echo '<main class="content">';
			ar_the_view( 'section__page-main-block' );
			ar_the_view( 'section__page-rules_page' );
			echo '</main>';
			break;
		default:
			break;
	endswitch;
endwhile;
get_footer();