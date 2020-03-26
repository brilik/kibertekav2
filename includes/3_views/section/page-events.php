<?php $s = get_field('events'); ?>
<div class="events" id="two-section">
	<div class="wrapper">
		<div class="events__cnt">
			<div class="events__txt"><?= $s['info']; ?></div>
			<div class="events__items">
				<div class="events__info"><?= $s['info']; ?></div>
				<div class="events__img">
					<img src="<?= $s['img']['url']; ?>" alt="">
				</div>
			</div>
		</div>
	</div>
</div>
<?php unset($s); ?>