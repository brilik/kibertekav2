<!-- BEGIN STOCK -->
<?php
// параметры по умолчанию
$posts = get_posts( array(
	'numberposts' => -1,
	'orderby'     => 'date',
	'order'       => 'DESC',
	'post_type'   => 'stock',
) );
?>
<section class="stock">
	<div class="wrapper">
		<h2 class="white"><?= __('Наши акции','kiberteka'); ?></h2>
		<div class="stock-content">
			<div class="stock-items js--stock-items">
				<div class="swiper-wrapper">
					<?php foreach ( $posts as $post ) : ?>
						<?php setup_postdata( $post ); ?>
                        <div class="stock-item swiper-slide">
                            <div class="stock-item__date">
                                <span><?= get_field( 'time', $post->ID ); ?></span>
                            </div>
                            <div class="stock-item__img">
                                <img src="<?= get_the_post_thumbnail_url($post->ID); ?>" alt="stock">
                            </div>
                            <div class="stock-item__info">
                                <span class="stock-item__title"><?= get_the_title($post->ID); ?></span>
								<p><?= wp_trim_words( get_field('content')['excerpt'], 50, ' ...' ); ?></p>
                                <a href="<?php the_permalink($post->ID); ?>" class="btn"><?= __( 'Узнать больше', 'kiberteka' ); ?></a>
                            </div>
                        </div>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>
                </div>
			</div>
			<span class="nav-arrow nav-arrow-left"><i class="icon-arrow-right"></i></span>
			<span class="nav-arrow nav-arrow-right"><i class="icon-arrow-right"></i></span>
		</div>
		<img data-src="<?= $themeAR->get_src(); ?>/assets/img/stock-decor.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="decor" class="stock-decor js-img">
	</div>
</section>

<!-- STOCK EOF   -->