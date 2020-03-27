<?php
global $themeAR;
$themeAR->create_post_type( __( 'Клубы', 'kiberteka' ), 'clubs', true, [ 'title', 'editor', 'thumbnail' ] );
$themeAR->create_post_type( __( 'Новости', 'kiberteka' ), 'news', true, [ 'title', 'editor', 'thumbnail' ] );
$themeAR->create_post_type( __( 'Акции', 'kiberteka' ), 'stock', true, [ 'title', 'editor', 'thumbnail' ] );
$themeAR->create_post_type( __( 'FAQ', 'kiberteka' ), 'faq', true, [ 'title', 'editor', 'thumbnail' ], false );
$themeAR->create_post_type( __( 'Игры', 'kiberteka' ), 'game', true, [ 'title', 'thumbnail' ], false );
$themeAR->create_taxonomy( __( 'Платформа', 'kiberteka' ), 'platform', [ 'game' ], false );
$themeAR->acf_add_page( 'Настройки темы', 'Настройки темы' );