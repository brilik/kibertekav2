<?php
$menu = $themeAR->get_items_tree_menu( 'header' );
if ( ! empty( $menu[0]->childs ) ) {
	$res = '<ul class="footer-nav">';
	foreach ( $menu[0]->childs as $key => $item ) {
		$liClass = "main-nav-list__item";
		$aClass  = "main-nav-list__link";
		$title   = ( $item['title'] !== "#" ) ? $item['title'] : '';
		$res     .= "<li class=\"{$liClass}\">";
		$res     .= "<a href=\"{$item['url']}\" class=\"{$aClass}\">{$title}";
		if ( ! empty( $menu[ $item['ID'] ] ) ) {
			$res .= '<i class="icon-arrow-down-small"></i></a>';
			$res .= '<ul>';
			foreach ( $menu[ $item['ID'] ]->childs as $submenu ) {
				if ( empty( $submenu['title'] ) ) {
					continue;
				}
				$res .= '<li>';
				$res .= "<a href=\"{$submenu['url']}\">{$submenu['title']}</a>";
				$res .= '</li>';
			}
			$res .= '</ul>';
		} else {
			$res .= '</a>';
		}
		$res .= '</li>';
	}
	$res .= '</ul>';
	echo $res;
}