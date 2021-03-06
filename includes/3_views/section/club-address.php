<!-- BEGIN CLUB ADDRESS -->
<?php $s = get_field( 'other_club' ); ?>
<?php if(!empty($s)): ?>
<?php $contacts = get_field('contacts', $s->ID); ?>
<div class="club-address club-single-address">
	<div class="wrapper">
			<div class="club-address__item">
				<img data-src="<?= $themeAR->get_src(); ?>/assets/img/main-decor1.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="<?=get_field('preview', $s->ID)['img']['alt']; ?>" class="js-img club-address__item-decor">
				<div class="club-address__item-img">
					<img data-src="<?=get_field('preview', $s->ID)['img']['url']; ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="<?=get_field('preview', $s->ID)['img']['alt']; ?>" class="js-img">
				</div>
			<div class="club-address__item-info">
				<h3>Клуб на ВЫХИНО</h3>
				<div class="club-address__item-detail">
					<?php if($link = $contacts['location']['address']): ?>
						<ul>
							<li class="social-icon"><a href="<?php the_permalink($s->ID); ?>"><i class="icon-marker"></i></a></li>
							<li class="club-address__item-detail-text"><?= $link; ?></li>
						</ul>
					<?php endif; ?>
					<ul>
						<?php
						if ( $link = ( $contacts['contact_club']['whatsup'] ) ) {
							echo "<li class=\"social-icon\"><a href=\"{$link}\"><i class=\"icon-whatsup\"></i></a></li>";
						}
						if ( $link = ( $contacts['contact_club']['telegram'] ) ) {
							echo "<li class=\"social-icon\"><a href=\"{$link}\"><i class=\"icon-telegram\"></i></a></li>";
						}
						if ( $link = ( $contacts['contact_club']['phone'] ) ) {
							$phone = $themeAR->get_clear_phone( $link, true );
							echo "<li><a href=\"tel:+{$phone}\" class=\"link club-address__tel\">{$link}</a></li>";
						}
						?>
					</ul>
					<a href="<?php the_permalink($s->ID); ?>" class="btn"><?php _e('подробнее','kiberteka'); ?></a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
<?php unset( $s ); ?>
<!-- PLANNING EOF   -->