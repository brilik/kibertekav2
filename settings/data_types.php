<?php

global $themeAR;

$themeAR->create_post_type( __("Клубы", 'kiberteka'), 'clubs', true, array( 'title', 'editor', 'thumbnail' ) );
$themeAR->create_post_type( __("Новости", 'kiberteka'), 'news', true, array( 'title', 'editor', 'thumbnail' ) );
$themeAR->create_post_type( __("FAQ", 'kiberteka'), 'faq', true, array( 'title', 'editor', 'thumbnail' ), false );
//$themeAR->create_taxonomy( __("Category"), "category-news", [ "news" ], false );
//$themeAR->create_taxonomy( __("Category"), "category-clubs", [ "clubs" ], false );
$themeAR->acf_add_page('Настройки темы','Настройки темы');