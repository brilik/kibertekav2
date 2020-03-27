<!-- BEGIN NEWS -->

<div class="news" id="news-section">
    <div class="wrapper">
        <div class="news-content">
            <img data-src="<?= $themeAR->get_src(); ?>/assets/img/main-decor1.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="" class="js-img news-decor1">
            <img data-src="<?= $themeAR->get_src(); ?>/assets/img/about-decor.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="" class="js-img news-decor2">
	        <?php
	        // Start the Loop.
	        while ( have_posts() ) :
		        the_post();
		        ?>
                <div class="news-item">
                    <span class="news-item__title"><?php the_title(); ?></span>
                    <p><?= wp_trim_words( get_field( 'content' )['excerpt'], 30, '...' ); ?></p>
                    <a href="<?php the_permalink(); ?>" class="btn"><?= __( 'прочитать полностью', 'kiberteka' ); ?></a>
                    <span class="news-item__date"><?= get_the_date(); ?></span>
                </div>
	        <?
	        endwhile;
	        // End the loop.
	        ?>
        </div>
        <div class="news-pagination">
		    <?php
		    // Previous/next page navigation
		    the_news_navigation();
		    wp_reset_postdata();
		    ?>
        </div>
    </div>
</div>

<!-- NEWS EOF   -->