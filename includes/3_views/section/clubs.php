<!-- BEGIN CLUBS -->
<?php $s = get_field( 'clubs' ); ?>
<section class="clubs">
	<div class="wrapper">
		<h2><?= $s['title']; ?></h2>
		<div class="clubs-content">
			<?php if(!empty($s['list'])): ?>
			<div class="clubs-items js--clubs-items">
				<div class="swiper-wrapper">
					<?php foreach ($s['list'] as $item): ?>
                        <a href="<?= $item['img']['url']; ?>" class="clubs-item swiper-slide js-fancybox">
                            <img src="<?= $item['img']['url']; ?>"  alt="<?= $item['img']['alt']; ?>">
                        </a>
					<?php endforeach; ?>
				</div>
			</div>
			<span class="nav-arrow nav-arrow-left"><i class="icon-arrow-right"></i></span>
			<span class="nav-arrow nav-arrow-right"><i class="icon-arrow-right"></i></span>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php unset( $s ); ?>
<!-- CLUBS EOF   -->