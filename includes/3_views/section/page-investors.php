<?php $s = get_field('investors'); ?>
<div class="for-investors" id="two-section">
	<div class="wrapper">
		<div class="for-investors__cnt">
			<div class="for-investors__txt"><?= $s['text']; ?></div><?= $s['desc']; ?>
		</div>
	</div>
</div>
<?php unset($s); ?>