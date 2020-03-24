<!-- BEGIN ABOUT -->
<?php $s = get_field( 'about' ); ?>
<section class="about" id="about-sect">
    <div class="wrapper">
        <div class="about-content">
            <div class="about-info">
                <h2><?= $s['left']['title']; ?></h2>
				<?= $s['left']['desc']; ?>
            </div>
            <div class="about-img">
                <img data-src="<?= $s['img']['url']; ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="<?= $s['img']['alt']; ?>" class="js-img">
            </div>
        </div>
    </div>
</section>
<?php unset( $s ); ?>
<!-- ABOUT EOF   -->