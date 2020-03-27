<?php $o = get_field( 'header', 'options' ); ?>
<!-- BEGIN HEADER -->

<header class="header">
    <div class="header-box header-box__black">
        <div class="header-left">
            <span class="header-time"><?= $o['work_time']; ?></span>
			<?php the_socials( [ 'whatsup', 'telegram', 'phone' ], 'header-social' ); ?>
		</div>
        <div class="header-logo">
	        <?php
	        if ( is_front_page() || is_home() ) {
		        echo "<img data-src=\"{$o['logo']['url']}\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACw=\" alt=\"{$o['logo']['alt']}\" class=\"js-img\">";
	        } else {
		        echo '<a href="' . home_url() . '">';
		        echo "<img data-src=\"{$o['logo']['url']}\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACw=\" alt=\"{$o['logo']['alt']}\" class=\"js-img\">";
		        echo '</a>';
	        }
	        ?>
        </div>
		<div class="header-right">
			<a href="#call-modal" class="header-call btn js-fancybox" data-popup-link="js-popup-call"><?= $o['btn_callback_name']; ?></a>
			<div class="header-btn__nav">
				<a href="#" class="button-nav js-button-nav">
					<span></span>
                    <span></span>
                    <span></span>
                </a>
            </div>
        </div>
    </div>
    <nav class="header-nav"><?php ar_the_view( 'menu__header' ); ?></nav>
</header>

<!-- HEADER EOF   -->
