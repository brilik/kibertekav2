<!-- BEGIN LIBRARY BLOCK -->
<?php $s = get_field( 'events' ); ?>
<div class="library-block" id="two-section">
	<div class="wrapper">
		<div class="library-block__panel">
            <?php
            get_search_form();
            the_platforms();
            ?>
        </div>
        <div class="library-block__items-wrap result-search">
            <div class="preloader" style="width: 100%;text-align: center; padding-bottom: 40px; display: none">
                <img src="<?= $themeAR->get_src(); ?>/assets/img/loader.gif" class="loader">
            </div>
            <div class="library-block__items list js-result-search-list">
                <?php show_games(); ?>
            </div>
			<a href="#" class="library-block__btn-more"><?php _e('Больше игр','kiberteka'); ?></a>
		</div>
        <!-- END pc -->

    </div>
</div>
<?php unset($s); ?>
<!-- LIBRARY BLOCK EOF   -->