<!-- BEGIN OTHER NEWS -->
<?php $currID = get_the_ID(); ?>
<?php $s = get_field('all_posts'); ?>
<div class="other-news">
	<div class="wrapper">
		<div class="other-news__content">
			<div class="other-news__slider-navs">
				<span class="news-nav-arrow news-nav-arrow-left"><i class="icon-arrow-right-big"></i> предыдущая новость</span>
				<span class="news-nav-arrow news-nav-arrow-right">следующая новость<i class="icon-arrow-right-big"></i></span>
			</div>
			<div class="other-news__slider js--other-news__slider">
				<div class="swiper-wrapper" style="width:100%;">
					<?php
					$args = array(
						'posts_per_page' => $s['count'],
						'post_type' => 'news',
						'post_status' => array('publish'),
						'post__not_in' => [$currID],
						'order' => 'ASC'
					);
					$query = new WP_Query($args);

					while ( $query->have_posts() ) : $query->the_post();
					?>
					<div class="news-item swiper-slide">
						<span class="news-item__title"><?php the_title(); ?></span>
						<p><?= wp_trim_words( get_field('content')['excerpt'], 50, ' ...' ); ?></p>
						<a href="<?php the_permalink(); ?>" class="btn"><?= __('прочитать полностью','kiberteka'); ?></a>
						<span class="news-item__date"><?= get_the_date(); ?></span>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
            <?php wp_reset_query(); ?>
		</div>
	</div>
</div>
<?php unset($s, $currID); ?>
<!-- OTHER NEWS EOF   -->