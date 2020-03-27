<?php
/*
 * $keyGoogleMap = 'AIzaSyCGLMb4BX0iIbD98PzkJXT7J8TbuBK2fq8';
 * $keyGoogleMap = 'AIzaSyBLUNaZ85lCMN7fStJw2Bi3';
*/
function includes_full_files( $dir ) {
	foreach ( glob( $dir . '/*.php' ) as $file ) {
		include_once $file;
	}
}

$include_path = get_template_directory() . '/includes';
define( "VIEWS_DIR", $include_path . "/3_views/" );
add_action( 'init', 'ar_theme_init', 10 );
$themeAR = false;
function ar_theme_init() {
	global $include_path, $themeAR;
	include_once $include_path . "/theme_functions.php";
	includes_full_files( $include_path . "/4_classes" );
	$themeAR = new ThemeAR();
	$themeAR->disable_emojis();
}

add_action( 'wp_enqueue_scripts', 'ar_theme_name_style' );
function ar_theme_name_style() {
	$theme_uri = get_template_directory_uri() . '/assets/';
	wp_register_style( 'theme-style1', get_stylesheet_uri() );
	wp_register_style( 'theme-style2', $theme_uri . 'css/style2.css' );
	wp_enqueue_style( 'theme-style1' );
	if ( is_404() || is_privacy_policy() || is_page() ) {
		wp_enqueue_style( 'theme-style2' );
	}
}

add_action( 'wp_enqueue_scripts', 'ar_theme_name_scripts', 100 );
function ar_theme_name_scripts() {
	$theme_uri = get_template_directory_uri() . '/assets/';
	wp_register_style( 'main', $theme_uri . 'css/main.css', [], null );
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jq', $theme_uri . 'js/jquery-3.0.0.min.js', [], null, true );
	wp_register_script( 'jq-migrate', $theme_uri . 'js/jquery-migrate-1.4.1.min.js', [], null, true );
	wp_register_script( 'swiper', $theme_uri . 'js/components/swiper.min.js', [], null, true );
	wp_register_script( 'lazyload', $theme_uri . 'js/components/lazyload.min.js', [], null, true );
	wp_register_script( 'jq-maskedinput', $theme_uri . 'js/components/jquery.maskedinput.js', [], null, true );
	wp_register_script( 'jq-fancybox', $theme_uri . 'js/components/jquery.fancybox.js', [], null, true );
	wp_register_script( 'jq-validate', $theme_uri . 'js/components/jquery.validate.js', [], null, true );
	wp_register_script( 'jq-datetimepicker', $theme_uri . 'js/components/jquery.datetimepicker.js', [], null, true );
	wp_register_script( 'list', $theme_uri . 'js/components/list.min.js', [], null, true );
	wp_register_script( 'custom', $theme_uri . 'js/custom.js', [], null, true );
	wp_register_script( 'custom2', $theme_uri . 'js/custom2.js', [], null, true );
	wp_enqueue_script( 'jq' );
	wp_enqueue_script( 'jq-migrate' );
	if ( is_home() || is_front_page() || is_singular( 'clubs' ) || is_singular( 'news' ) ) {
		wp_enqueue_script( 'swiper' );
		wp_enqueue_script( 'lazyload' );
		wp_enqueue_script( 'jq-maskedinput' );
		wp_enqueue_script( 'jq-fancybox' );
		wp_enqueue_script( 'jq-validate' );
		wp_enqueue_script( 'jq-datetimepicker' );
	} elseif ( is_page() ) {
		optiomization();
		wp_enqueue_script( 'swiper' );
		wp_enqueue_script( 'lazyload' );
		wp_enqueue_script( 'jq-maskedinput' );
		wp_enqueue_script( 'jq-fancybox' );
		wp_enqueue_script( 'jq-validate' );
		wp_enqueue_script( 'jq-datetimepicker' );
		wp_enqueue_script( 'list' );
		wp_enqueue_script( 'custom2' );
	} elseif ( is_404() || is_privacy_policy() ) {
		optiomization();
		wp_enqueue_script( 'swiper' );
		wp_enqueue_script( 'lazyload' );
		wp_enqueue_script( 'jq-maskedinput' );
		wp_enqueue_script( 'jq-fancybox' );
		wp_enqueue_script( 'custom2' );
	} elseif ( is_archive() ) {
		optiomization();
		wp_enqueue_script( 'swiper' );
		wp_enqueue_script( 'lazyload' );
		wp_enqueue_script( 'jq-maskedinput' );
		wp_enqueue_script( 'jq-fancybox' );
		wp_enqueue_script( 'jq-validate' );
		wp_enqueue_script( 'jq-datetimepicker' );
	} else {
		wp_enqueue_script( 'lazyload' );
	}
	wp_enqueue_script( 'custom' );
}

function optiomization(){
	wp_deregister_style('heateor_sss_frontend_css');
	wp_deregister_style('heateor_sss_sharing_svg');
	wp_deregister_style('heateor_sss_sharing_svg_hover');
	wp_deregister_script('hoverintent-js');
}

/** Подлючаем svg файлы */
add_filter( 'upload_mimes', 'cc_mime_types' );
function cc_mime_types( $file_types ) {
	$new_filetypes        = [];
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types           = array_merge( $file_types, $new_filetypes );

	return $file_types;
}