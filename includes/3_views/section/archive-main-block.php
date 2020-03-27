<!-- BEGIN MAIN BLOCK -->

<div class="main-block main-block__inner main-block__inner-news">
	<div class="main-block__box js-img" data-src="<?= $themeAR->get_src(); ?>/assets/img/news-main-bg.svg">
		<div class="wrapper">
			<div class="main-block__info">
				<div class="box-breadcrumbs"><?php the_breadcrumbs(); ?></div>
				<div class="main-block__info-title">
					<h1><?= post_type_archive_title(); ?></h1>
				</div>
			</div>
			<a href="#news-section" class="btn-down js-scroll"><i class="icon-arrow-down"></i></a>
		</div>
	</div>
</div>

<!-- MAIN BLOCK EOF   -->