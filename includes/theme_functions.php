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

add_filter( 'navigation_markup_template', 'glp_navigation_template', 100, 2 );
function glp_navigation_template( $template, $class ) {
	$template = '
    <nav class="pagination " role="navigation"> 
        %3$s 
    </nav>';

	return $template;
}

add_theme_support( 'post-thumbnails', [ 'game', 'stock' ] );

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
	remove_menu_page( 'edit.php' );
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

	if ( get_page_template_slug() === 'templates/main-page.php' || $post->post_type == 'page' ) {
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
			$res     .= "<li class=\"{$liClass}\"><a href=\"{$link}\" class=\"{$aClass}\">{$text}</a></li>";
		} elseif ( $i['select'] === 'email' ) {
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

add_action( 'wp_ajax_send_form', 'send_form_ajax' );
add_action( 'wp_ajax_nopriv_send_form', 'send_form_ajax' );
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

function the_breadcrumbs() {
	$postType = get_post_type_object( get_post_type() );
	$res      = '<ul class="breadcrumbs">';
	$res      .= '<li><a href="' . home_url() . '">' . __( 'Главная', 'kiberteka' ) . '</a></li>';
	if ( is_archive() ) {
		$res .= '<li>'. esc_html( $postType->labels->singular_name ) . '</li>';
	} else {
		if ( $postType ) {
			$res .= '<li><a href="/' . get_post_type() . '/">' . esc_html( $postType->labels->singular_name ) . '</a></li>';
		}
		$res .= '<li>' . get_the_title() . '</li>';
	}
	$res .= '</ul>';
	echo $res;
}

function the_share(){
    ?>
    <div class="shared-block">
        <span><?php _e('Поделиться:','kiberteka'); ?></span>
        <?= do_shortcode('[Sassy_Social_Share style="background-color:#000;"]'); ?>
    </div>
    <?php
}





add_filter('get_search_form', 'ba_search_form');
function ba_search_form( $form ) {

	global $themeAR;
	$form = '
		<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" class="library-search">
			<input type="text" value="' . get_search_query() . '" name="s" class="search-input search" id="s" placeholder="Найти игру..." autocomplete="off" required>
			<button type="submit" class="library-search__btn">
                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" data-src="' . $themeAR->get_src() . '/assets/img/icons/search.svg" class="js-img" alt="search">
            </button>
            <input type="hidden" name="platform" value="all">
		</form>
	';

	return $form;
}


add_action('wp_ajax_nopriv_ajax_search_games','ajax_search_games');
add_action('wp_ajax_ajax_search_games','ajax_search_games');
function ajax_search_games(){

    global $themeAR;
    $s = htmlspecialchars($_POST['term']);
    $platform = htmlspecialchars($_POST['platform']);

    if($platform === 'all'){
	    $args = array(
		    's' => $s,
		    'post_type' => 'game',
		    'posts_per_page' => -1
        );
    } else {
	    $args = array(
		    's' => $s,
		    'post_type' => 'game',
		    'posts_per_page' => -1,
		    'tax_query' => array(
			    array(
				    'taxonomy' => 'platform',
				    'field'    => 'slug',
				    'terms'    => $platform
			    )
		    )
	    );
    }

	$the_query = new WP_Query($args);
	if ($the_query->have_posts()) {
		while ($the_query->have_posts()) {
			$the_query->the_post();
			?>
                <a href="<?php the_permalink(); ?>" class="library-block__item">
                    <span class="name"><?php the_title(); ?></span>
	                <?php
	                if(has_post_thumbnail()) {
		                echo '<img src="' . get_the_post_thumbnail_url() . '" class="js-img" alt="' . get_the_title() . '">';
	                } else {
		                echo '<img src="'. $themeAR->get_src() .'/images/noimage.png" class="js-img" alt="noimage">';
	                }
	                ?>
                </a>
			<?php
		}
	} else {
		?>
        <div class="result_item">
            <span class="not_found"><?php _e('Ничего не найдено, попробуйте другую игру','kiberteka'); ?></span>
        </div>
		<?php
	}
	exit;
}

add_action('wp_head','initialVariablesForJavaScript');
function initialVariablesForJavaScript() {
	echo '<script>
        var themeUrl = "' . get_template_directory_uri() . '"
        var homeUrl  = "' . home_url() . '"
    </script>';
}

function the_platforms() {
	$res      = (string) '';
	$taxonomy = [
		'taxonomy'   => 'platform',
		'hide_empty' => true,
		'order'      => 'DESC'
	];
	$terms    = get_terms( $taxonomy );
	if ( $terms && ! is_wp_error( $terms ) ) :
		$res .= '<ul class="library-types">';
		foreach ( $terms as $term ) {
			$res .= '<li><a href="#' . $term->slug . '">' . $term->name . '</a></li>';
		}
		$res .= '</ul>';
	endif;
	echo $res;
}

function show_games(){
	$games = get_posts( [
		'numberposts' => -1,
		'orderby'     => 'date',
		'order'       => 'DESC',
		'post_type' => 'game',
	] );
	foreach( $games as $game ){
		setup_postdata($game);
		?>
        <a href="javascript:void(0)" class="library-block__item">
            <span class="name"><?php the_title($game->ID); ?></span>
            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" data-src="<?= get_the_post_thumbnail_url($game->ID); ?>" class="js-img" alt="game">
        </a>
		<?php
	}

	wp_reset_postdata();
}

function the_news_navigation() {

	the_posts_pagination(
		[
			'show_all'  => true,
			'type'      => 'list',
			'mid_size'  => 2,
			'prev_text' => sprintf(
				'<i class="icon-arrow-paging"></i>%s %s',
				'',
				__( 'Назад', 'kiberteka' )
			),
			'next_text' => sprintf(
				'%s %s',
				'<i class="icon-arrow-paging"></i>',
				__( 'Вперёд', 'kiberteka' )
			),
		]
	);
}