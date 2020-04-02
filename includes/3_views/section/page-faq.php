<?php
$faq = get_posts([
	'numberposts'      => -1,
	'orderby'          => 'date',
	'order'            => 'DESC',
	'post_type'        => 'faq',
]);
?>
<div class="faq" id="two-section">
	<div class="wrapper">
		<div class="faq__items">
			<?php foreach ($faq as $item): ?>
            <div class="faq__item">
				<div class="faq__title">
					<span><?= $item->post_title; ?></span>
					<div class="faq__title-btn js-toggle-btn">
						<span class="faq__title-plus"></span>
					</div>
				</div>
				<div class="faq__info js-toggle-info"><?= apply_filters('the_content', $item->post_content); ?></div>
			</div>
            <?php endforeach; ?>
		</div>
	</div>
</div>