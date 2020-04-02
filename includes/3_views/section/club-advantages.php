<!-- BEGIN ADVANTAGES -->
<?php $s = get_field( 'advantages' ); ?>
<section class="advantages">
	<div class="wrapper">
        <h2 class="white"><?= $s['title']; ?></h2>
		<?php if ( ! empty( $s['list'] ) ): ?>
			<div class="advantages-content">
				<?php foreach ($s['list'] as $key => $item): ?>
					<div class="advantages-item<?= $key % 2 > 0 ? ' advantages-item__reverse' : ''; ?>">
						<div class="advantages-item__img">
							<img data-src="<?= $themeAR->get_src(); ?>/assets/img/advan-triangle<?= $key % 2 < 1 ? '1' : '2'; ?>.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="decor" class="js-img advantages-item__triangle">
							<img data-src="<?= $item['img']['url']; ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="<?= $item['img']['alt']; ?>" class="js-img">
						</div>
						<div class="advantages-item__info"><?= $item['desc']; ?></div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php unset($s); ?>
<!-- ADVANTAGES EOF   -->