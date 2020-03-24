<!-- BEGIN CLUB ADDRESS -->
<?php $s = get_field( 'clubs' ); ?>
<div class="club-address">
	<div class="wrapper">
		<?php foreach ($s as $key => $item): ?>
        <?php $contacts = get_field('contacts', $item->ID); ?>
			<div class="club-address__item<?= ($key % 2 > 0) ? ' club-address__item-reverse' : '' ?>">
				<img data-src="<?= $themeAR->get_src(); ?>/assets/img/main-decor1.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="<?=get_field('preview', $item->ID)['img']['alt']; ?>" class="js-img club-address__item-decor">
				<div class="club-address__item-img">
					<img data-src="<?=get_field('preview', $item->ID)['img']['url']; ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="<?=get_field('preview', $item->ID)['img']['alt']; ?>" class="js-img">
				</div>
				<div class="club-address__item-info">
					<h3><?= get_field( 'preview', $item->ID )['title']; ?></h3>
					<div class="club-address__item-detail">
						<?php if($link = $contacts['location']): ?>
                            <ul>
                                <li class="social-icon"><a href="<?php the_permalink($item->ID); ?>"><i class="icon-marker"></i></a></li>
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
                        <a href="<?php the_permalink($item->ID); ?>" class="btn"><?php _e('подробнее','kiberteka'); ?></a>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<?php unset( $s ); ?>
<!-- PLANNING EOF   -->