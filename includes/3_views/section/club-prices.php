<!-- BEGIN PRICES -->
<?php $s = get_field( 'prices' ); ?>
<section class="prices">
	<div class="wrapper">
		<h2 class="white"><?= $s['title']; ?></h2>
		<div class="prices-content">
			<ul class="prices-panel">
				<li><a href="#prices-time" class="prices-panel__time active"><?php _e('Игровое время','kiberteka'); ?></a></li>
				<li><a href="#prices-food" class="prices-panel__food"><?php _e('еда и напитки','kiberteka'); ?></a></li>
			</ul>
			<div class="prices-box">
				<div class="prices-block" id="prices-time">
					<?php foreach($s['list_game'] as $item): ?>
						<div class="prices-time__item">
							<div class="prices-time__item-info"><?= $item['times']; ?></div>
							<div class="prices-time__item-price"><?= $item['time_hours']; ?></div>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="prices-block hide-tab" id="prices-food">
					<?php foreach ($s['list_eat'] as $item): ?>
					<div class="prices-food__item">
						<h5><?= $item['title']; ?></h5>
						<div class="prices-food__item-block"><?= $item['desc']; ?></div>
						<div class="prices-food__item-bottom"><?= $item['penalty']; ?></div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
			<a href="#" class="btn"><?php _e('Забронировать','kiberteka'); ?></a>
		</div>
	</div>
</section>
<?php unset($s); ?>
<!-- PRICES EOF   -->