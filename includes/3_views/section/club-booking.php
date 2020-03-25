<!-- BEGIN BOOKING -->
<?php $s = get_field( 'club-booking' ); ?>
<section class="about club-booking">
    <div class="wrapper">
        <div class="about-content club-booking-content">
            <div class="about-info club-booking-info">
                <h3><?= $s['title']; ?></h3>
                <ul class="club-booking-social">
					<?php
					if ( $link = ( $s['contact_club']['whatsup'] ) ) {
						echo "<li class=\"social-icon\"><a href=\"{$link}\"><i class=\"icon-whatsup\"></i></a></li>";
					}
					if ( $link = ( $s['contact_club']['telegram'] ) ) {
						echo "<li class=\"social-icon\"><a href=\"{$link}\"><i class=\"icon-telegram\"></i></a></li>";
					}
					if ( $link = ( $s['contact_club']['phone'] ) ) {
						$phone = $themeAR->get_clear_phone( $link, true );
						echo "<li><a href=\"tel:+{$phone}\" class=\"link club-address__tel\">{$link}</a></li>";
					}
					?>
                </ul>
                <div class="club-booking-info__block">
					<?php if ( $list = $s['steps'] ): ?>
                        <ul>
							<?php foreach ( $list as $item ): ?>
                                <li><span><?= $item['num']; ?></span> <?= $item['desc']; ?></li>
							<?php endforeach; ?>
                        </ul>
					<?php endif; ?>
                    <a href="#" class="btn"><?php _e( 'Забронировать онлайн', 'kiberteka' ); ?></a>
                </div>
            </div>
            <div class="about-img">
                <img data-src="<?= $s['img']['url']; ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="<?= $s['img']['alt']; ?>" class="js-img">
            </div>
        </div>
    </div>
</section>
<?php unset( $s ); ?>
<!-- BOOKING EOF   -->