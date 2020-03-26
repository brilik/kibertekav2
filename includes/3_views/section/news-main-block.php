<!-- BEGIN MAIN BLOCK -->
<?php $s = get_field( 'main' ); ?>
<div class="main-block main-block__inner main-block__news-single">
	<div class="main-block__box js-img" data-src="<?= $s['bg_img']['url']; ?>">
		<div class="wrapper">
			<div class="main-block__info">
				<div class="box-breadcrumbs"><?php the_breadcrumbs(); ?></div>
				<div class="main-block__info-title">
					<?php the_title('<h1>','</h1>'); ?>
					<span class="news-single__date"><?php the_date(); ?></span>
				</div>
			</div>
			<?php the_share(); ?>
		</div>
	</div>
</div>
<?php unset( $s ); ?>
<!-- MAIN BLOCK EOF   -->