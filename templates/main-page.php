<?php
/**
 * Template Name: Главная страница (6 блоков)
 * Template Post Type: Page
 */
global $themeAR;
get_header();
echo '<div class="content">';
ar_the_view( 'section__main-block' );
ar_the_view( 'section__about' );
ar_the_view( 'section__finding' );
ar_the_view( 'section__clubs' );
ar_the_view( 'section__planning' );
ar_the_view( 'section__address' );
echo '</div>';
get_footer();