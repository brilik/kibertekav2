<?php
/**
 * $menu = $themeAR->get_items_tree_menu( 'main' );
 * <nav class="main-nav">
 * <ul class="main-nav-list">
 * foreach ( $menu[0]->childs as $item ) {
 *** $liClass = "main-nav-list__item";
 *** $aClass  = "main-nav-list__link";
 *** $title   = ( $item['title'] !== "#" ) ? $item['title'] : '';
 *** echo "<li class=" . $liClass . "><a href=" . $item['url'] . " class=$aClass>$title</a></li>";
 * }
 * </ul>
 * </nav>
 */
?>
<ul>
	<li>
		<a href="#">
			О клубах
			<i class="icon-arrow-down-small"></i>
		</a>
		<ul>
			<li><a href="#">Правила центров</a></li>
			<li><a href="#">Вопросы/ответы</a></li>
			<li><a href="#">Проведение мероприятий</a></li>
			<li><a href="#">Для инвесторов</a></li>
		</ul>
	</li>
	<li><a href="#">Новости (акции)</a></li>
	<li>
		<a href="#">
			Информация
			<i class="icon-arrow-down-small"></i>
		</a>
		<ul>
			<li><a href="#">Правила центров</a></li>
			<li><a href="#">Вопросы/ответы</a></li>
			<li><a href="#">Проведение мероприятий</a></li>
			<li><a href="#">Для инвесторов</a></li>
		</ul>
	</li>
	<li><a href="#">Как добраться</a></li>
	<li><a href="#">библиотека игр</a></li>
</ul>
