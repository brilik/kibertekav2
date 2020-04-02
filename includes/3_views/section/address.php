<!-- BEGIN CLUB ADDRESS -->
<?php $s = get_field( 'kluby' ); ?>
<?php
$block_class = 'club-address';
$block_id = '';
if(!empty($args)){
    $block_class .= ' '.$args['block']['class'];
    $block_id .= $args['block']['id'];
}
?>
<div class="<?= $block_class; ?>" id="<?= $block_id; ?>">
	<div class="wrapper">
		<?php foreach ($s as $key => $item): ?>
        <?php $contacts = get_field('contacts', $item->ID); ?>
			<div class="club-address__item<?= ($key % 2 > 0) ? ' club-address__item-reverse' : '' ?>">
                <?php if( $key < 1 ): ?>
				<img data-src="<?= $themeAR->get_src(); ?>/assets/img/main-decor1.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="<?=get_field('preview', $item->ID)['img']['alt']; ?>" class="js-img club-address__item-decor">
				<?php endif; ?>
				<div class="club-address__item-img">
                    <?php if ( isset( $args['map'] ) ): ?>
                        <div id="map<?=$key+1?>" class="map-cont"></div>
                    <?php else: ?>
					    <img data-src="<?=get_field('preview', $item->ID)['img']['url']; ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="<?=get_field('preview', $item->ID)['img']['alt']; ?>" class="js-img">
                    <?php endif; ?>
				</div>
				<div class="club-address__item-info">
					<h3><?= get_field( 'preview', $item->ID )['title']; ?></h3>
					<div class="club-address__item-detail">
						<?php if ( $link = $contacts['location']['address'] ): ?>
                            <ul>
                                <li class="social-icon"><a href="<?php if( is_home() || is_front_page() ){ the_permalink( $item->ID ); } else{ echo 'javascript:void(0);'; } ?>"><i
                                                class="icon-marker"></i></a></li>
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
						<?php if ( is_home() || is_front_page() ): ?>
                            <a href="<?php the_permalink( $item->ID ); ?>" class="btn">
								<?php _e( 'подробнее', 'kiberteka' ); ?>
                            </a>
						<?php else: ?>
							<?php if ( $link = ( $contacts['contact_club']['work_time'] ) ) { ?>
                                <ul>
                                    <li class="social-icon"><a href="javascript:void(0);"><i class="icon-time"></i></a></li>
                                    <li class="club-address__item-detail-text"><?= $link; ?></li>
                                </ul>
							<?php }; ?>
						<?php endif; ?>
                    </div>
				</div>
			</div>
            <?php $yamap = json_decode($contacts['location']['yamap'],true); ?>
            <?php if(isset($args['map']) && !empty($contacts['location']['yamap'])): ?>
            <script>
                setTimeout(function(){
                    if ($('#map<?=$key+1?>').length) {
                        ymaps.ready(function () {
                            var myMap = new ymaps.Map('map<?=$key+1?>', {
                                center: [<?= $yamap['center_lat']; ?>, <?= $yamap['center_lng']; ?>],
                                zoom: <?= $yamap['zoom']; ?>
                            }, {
                                searchControlProvider: 'yandex#search'
                            })

                            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
                                myMap.behaviors.disable('multiTouch');
                                myMap.behaviors.disable('scrollZoom');
                                myMap.behaviors.disable('drag');
                            };
                            myMap.behaviors.disable('scrollZoom');
                            myMap.controls.remove('geolocationControl');
                            myMap.controls.remove('searchControl');
                            myMap.controls.remove('trafficControl');
                            myMap.controls.remove('typeSelector');
                            myMap.controls.remove('fullscreenControl');
                            myMap.controls.remove('rulerControl');
                        });

                    };
                }, 2000)
            </script>
            <?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>
<?php unset( $s ); ?>
<!-- PLANNING EOF   -->