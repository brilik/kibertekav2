<!-- BEGIN PLANNING -->
<?php $s = get_field( 'planning' ); ?>
<section class="planning js-copy-text-in-form">
	<div class="wrapper">
		<div class="planning-content">
			<h2 class="white"><?= $s['title']; ?></h2>
			<?php if(!empty($s['list'])): ?>
				<div class="planning-buttons">
					<?php foreach ($s['list'] as $item): ?>
						<a href="#" class="btn" data-popup-link="js-popup-booking"><?= $item['name']; ?></a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<img data-src="<?= $themeAR->get_src(); ?>/assets/img/planning-decor.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="decor" class="planning-decor js-img">
</section>
<?php unset( $s ); ?>
<!-- PLANNING EOF   -->