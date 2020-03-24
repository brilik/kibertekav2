<?php
function ar_the_view( $name, $args = [] ) {
	global $themeAR;
	$themeAR->the_view( $name, $args );
}

function ar_the_pagination() {
	the_posts_pagination( [
		'prev_text'          => "",
		'next_text'          => "",
		"mid_size"           => 1,
		"end_size"           => 3,
		"screen_reader_text" => ""
	] );
}

;
add_filter( 'navigation_markup_template', 'glp_navigation_template', 100, 2 );
function glp_navigation_template( $template, $class ) {
	$template = '
    <nav class="pagination " role="navigation"> 
        %3$s 
    </nav>';

	return $template;
}

add_theme_support( 'post-thumbnails', [ 'feedback' ] );
add_filter( 'body_class', function ( $classes ) {

	// добавим класс 'class-name' в массив классов $classes
	if ( is_page() ) {
		$classes[] = 'it_is_page';
	} elseif ( is_404() ) {
		$classes[] = 'loaded error-body';
	}

	return $classes;
} );
add_action( 'admin_menu', function () {
	$user = wp_get_current_user();
	if ( $user && isset( $user->user_email ) ) {
		if ( 'megabrilik@gmail.com' != $user->user_email && 'bryl.sliceplanet@gmail.com' != $user->user_email ) {
			remove_menu_page( 'edit.php?post_type=acf-field-group' );
		}
	}
}, 999 );
/**
 * Отключаем гутенберг на определенных типах постов или страницах.
 */
add_filter( 'use_block_editor_for_post', 'disable_gutenberg_for_post', 10, 2 );
function disable_gutenberg_for_post( $use, $post ) {

	if ( get_page_template_slug() === 'templates/main-page.php' ) {
		return false;
	}

	return $use;
}

/**
 * Отключаем гутенберга на определенном шаблоне
 */
//add_action( 'init', 'wph_hide_editor', 10 );
function wph_hide_editor() {
	$post_id = isset( $_GET['post'] ) ? $_GET['post'] : isset( $_POST['post_ID'] );
	if ( ! isset( $post_id ) ) {
		return;
	}
	$template_file = get_post_meta( $post_id, '_wp_page_template', true );
	if ( $template_file == 'template/gallery-inner.php' ) {
		remove_post_type_support( 'post', 'editor' );
	}
}

/**
 * Удаляем груповые действия: деактивировать и удалить плагина
 */
add_filter( 'plugin_action_links', 'disable_plugin_deactivation', 10, 2 );
function disable_plugin_deactivation( $actions, $plugin_file ) {
	// Удаляет действие "Редактировать" у всех плагинов
	unset( $actions['edit'] );
	// Удаляет действие "Деактивировать" у важных для сайта плагинов
	$important_plugins = [
		'advanced-custom-fields-pro/acf.php',
	];
	if ( in_array( $plugin_file, $important_plugins ) ) {
		unset( $actions['deactivate'] );
		$actions['info'] = '<b class="musthave_js">Обязателен для темы</b>';
	}

	return $actions;
}

// не помню что это, но это связано с деактивацией плагина
add_filter( 'admin_print_footer_scripts-plugins.php', 'disable_plugin_deactivation_hide_checkbox' );
function disable_plugin_deactivation_hide_checkbox( $actions ) {
	?>
    <script>
        jQuery(function ($) {
            $('.musthave_js').closest('tr').find('input[type="checkbox"]').remove();
        });
    </script>
	<?php
}

/**
 * Отключаем обновление плагина
 */
add_filter( 'site_transient_update_plugins', 'disable_plugin_updates' );
function disable_plugin_updates( $value ) {

	$pluginsToDisable = [
		'advanced-custom-fields-pro/acf.php',
	];
	if ( isset( $value ) && is_object( $value ) ) {
		foreach ( $pluginsToDisable as $plugin ) {
			if ( isset( $value->response[ $plugin ] ) ) {
				unset( $value->response[ $plugin ] );
			}
		}
	}

	return $value;
}

/**
 * Заменяем стандартное название в подвале старницы админки "Спасибо вам за творчество с WordPress."
 */
add_filter( 'admin_footer_text', function () {
	echo '<span id="footer-thankyou">' . __( 'Сделано с любовью' ) . '&nbsp;<a href="https://vertkovo.ru/"><b>Verstkovo</b></a></span>';
} );
function the_socials( array $args = [], string $ulClass = '' ) {
	global $themeAR;
	$soc   = get_field( 'socials', 'options' );
	$res   = "<ul class=\"{$ulClass}\">";
	$phone = '';
	foreach ( get_array_sort_template( $soc, $args ) as $i ) {
		if ( ! in_array( $i['select'], $args ) ) {
			continue;
		}
		$aClass  = '';
		$link    = $i['link'];
		$liClass = 'social-icon';
		$text    = "<i class=\"icon-{$i['select']}\"></i>";
		if ( $i['select'] === 'phone' ) {
			if ( $ulClass === 'header-social' ) {
				$phone = $i['link'];
				continue;
			}
			$liClass = '';
			$text    = $link;
			$link    = str_replace( 'tel:', '', $link );
			$link    = 'tel:' . $themeAR->get_clear_phone( $link, false );
			$aClass  .= 'link';
			$res .= "<li class=\"{$liClass}\"><a href=\"{$link}\" class=\"{$aClass}\">{$text}</a></li>";
		} elseif ($i['select'] === 'email') {
			$res .= "<li class=\"{$liClass}\"><a href=\"mailto:{$i['link']}\"><i class=\"icon-mail\"></i></a></li>";
            $res .= "<li><a href=\"mailto:{$i['link']}\" class=\"link\">{$i['link']}</a></li>";
		} else {
			$res .= "<li class=\"{$liClass}\"><a href=\"{$link}\" class=\"{$aClass}\">{$text}</a></li>";
		}
	}
	$res .= '</ul>';
	if ( $ulClass === 'header-social' ) {
		$res .= '<a href="tel:' . $themeAR->get_clear_phone( $phone, false ) . "\" class=\"header-tel\">{$phone}</a>";
	}
	echo $res;
}

/**
 * Возвращает отсортированный массив по шаблону.
 *
 * @param array $sort_array
 * @param array $needly_for_template
 *
 * @return array
 */
function get_array_sort_template( array $sort_array, array $needly_for_template ) {
	$res = [];
	foreach ( $needly_for_template as $key => $needle_item ) {
		foreach ( $sort_array as $sort ) {
			if ( $sort['select'] === $needle_item ) {
				$res[ $key ] = $sort;
			}
		}
	}

	return $res;
}

add_action('wp_ajax_send_form', 'send_form_ajax');
add_action('wp_ajax_nopriv_send_form', 'send_form_ajax');
function send_form_ajax() {
	$tranlate = [
		'complection' => 'Комплектация',
		'num'         => 'Количество',
		'time'        => 'Время с',
		'email'       => 'Номер теелфона или почта для подтверждения',
		'name2'       => 'Имя',
		'form_title'  => 'Заголовок формы',
		'club'        => 'Клуб',
	];
	$to       = get_field( 'email', 'options' )['to'] ?? get_option( 'admin_email ' );
	$title    = $_POST['form_title'];
	unset( $_POST['action'], $_POST['form_title'] );
	$msg = '';
	foreach ( $_POST as $key => $item ) {
		if ( array_key_exists( $key, $tranlate ) ) {
			$key = $tranlate[ $key ];
		}
		$msg .= "{$key}: {$item}\r\n";
	}
	if ( wp_mail( $to, $title, $msg ) ) {
		echo "openPopup";
	} else {
		Debug::pr( $_POST );
	}
	wp_die();
}