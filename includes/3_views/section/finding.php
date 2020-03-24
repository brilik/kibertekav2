<!-- BEGIN FINDING -->
<?php $s = get_field( 'finding' ); ?>
<section class="finding">
	<div class="wrapper">
		<h2 class="white"><?= $s['title']; ?></h2>
		<div class="finding-content">
			<?php foreach ( $s['list'] as $item ): ?>
				<div class="finding-item">
					<div class="finding-item__img">
						<img data-src="<?= $item['img']['url']; ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="<?= $item['img']['alt']; ?>" class="js-img">
					</div>
					<span><?= $item['text']; ?></span>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<img data-src="<?= $themeAR->get_src(); ?>/assets/img/finding-decor1.png" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="decor" class="finding-decor1 js-img">
	<img data-src="<?= $themeAR->get_src(); ?>/assets/img/finding-decor2.png" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="decor" class="finding-decor2 js-img">
</section>
<?php unset( $s ); ?>
<!-- FINDING EOF   -->