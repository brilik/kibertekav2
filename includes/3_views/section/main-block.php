<!-- BEGIN MAIN BLOCK -->
<?php $s = get_field('main'); ?>
<div class="main-block">
	<div class="main-block__box js-img" data-src="<?= $s['bg_img']['url']; ?>">
		<div class="wrapper">
			<div class="main-block__info">
				<div class="main-block__info-title">
					<h1><?= $s['title']; ?></h1>
				</div>
				<div class="main-block__info-subtitle">
					<span><?= $s['subtitle']; ?></span>
				</div>
			</div>
			<div class="main-block__text"><?= $s['desc']; ?></div>
			<a href="#about-sect" class="btn-down js-scroll"><i class="icon-arrow-down"></i></a>
		</div>
	</div>
</div>
<?php unset($s); ?>
<!-- MAIN BLOCK EOF   -->