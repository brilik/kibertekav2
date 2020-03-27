<!-- BEGIN CLUBS -->
<?php $s = get_field( 'clubs' ); ?>
<?php if ( ! empty( $s['list'][0]['img'] ) ): ?>
    <section class="clubs">
        <div class="wrapper">
            <h2><?= $s['title']; ?></h2>
            <div class="clubs-content">
				<?php if ( ! empty( $s['list'] ) ): ?>
                    <div class="clubs-items js--clubs-items">
                        <div class="swiper-wrapper">
							<?php foreach ( $s['list'] as $key => $item ): ?>
                                <a href="<?= $item['img']['url']; ?>" class="clubs-item swiper-slide js-fancybox">
                                    <div><img src="<?= $item['img']['url']; ?>" alt="<?= $item['img']['alt']; ?>"></div>
                                    <img src="<?= $themeAR->get_src(); ?>/assets/img/club-item-bg<?=$key%2==0?1:2;?>.svg" alt="<?= $item['img']['alt']; ?>" class="clubs-item__bg">
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
<?php endif; ?>
<?php unset( $s ); ?>
<!-- CLUBS EOF   -->