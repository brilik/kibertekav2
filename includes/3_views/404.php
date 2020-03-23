<?php $np = get_field( 'no_page', 'options' ); ?>
<?php get_header(); ?>
    <!-- BEGIN CONTENT -->

    <main class="content">
        <div class="error-page">
            <div class="error-page__cnt">
                <div class="error-page__info">
                    <div class="error-page__title">
                        <h1><?= $np['title']; ?></h1>
                        <span><?= $np['error']; ?></span>
                    </div>
                    <?= $np['desc']; ?>
                    <a href="<?= home_url(); ?>" class="error-page__btn btn"><?php _e('вернуться на главную','kiberteka'); ?></a>
                </div>
            </div>
        </div>
    </main>

    <!-- CONTENT EOF   -->

<?php get_footer(); ?>