<?php $s = get_field('main'); ?>
<div class="main-block main-block__inner<?= ( is_page(402) ? ' main-block__library' : '' ); ?>">
	<div class="main-block__box js-img" data-src="<?= $s['bg_img']['url']; ?>">
		<div class="wrapper">
			<div class="main-block__info">
				<div class="main-block__info-title"><?php the_title('<h1>','</h1>'); ?></div>
                <?php
                if($txt = $s['subtitle'] ){
                  echo "<div class=\"main-block__info-subtitle\"><span>{$txt}</span></div>";
                }
                ?>
			</div>
			<a href="#two-section" class="btn-down js-scroll"><i class="icon-arrow-down"></i></a>
		</div>
	</div>
</div>
<?php unset($s); ?>