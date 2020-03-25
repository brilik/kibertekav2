<?php $l = get_field( 'footer', 'options' ); ?>
<!-- BEGIN FOOTER -->
<footer class="footer">
	<div class="footer-top">
		<div class="wrapper">
			<div class="footer-top__box">
				<div class="footer-col footer-col__nav">
                    <div class="footer-logo">
						<?php
						if ( ! empty( $l['logo'] ) ):
							if ( is_front_page() || is_home() ) {
								echo "<img data-src=\"{$l['logo']['url']}\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACw=\" alt=\"{$l['logo']['alt']}\" class=\"js-img\">";
							} else {
								echo '<a href="' . home_url() . '">';
								echo "<img data-src=\"{$l['logo']['url']}\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACw=\" alt=\"{$l['logo']['alt']}\" class=\"js-img\">";
								echo '</a>';
							}
						endif;
						?>
                    </div>
					<div class="footer-nav__box">
						<?php ar_the_view('menu__footer'); ?>
						<div class="footer-social"><?php the_socials(['vk','instagram']); ?></div>
					</div>
				</div>
				<div class="footer-col footer-col__center">
					<div class="footer-call">
						<span><?= $l['msg_plan']; ?></span>
						<a href="#" class="btn" data-popup-link="js-popup-call"><?= $l['btn_call_popup_name']; ?></a>
					</div>
				</div>
				<div class="footer-col footer-col__info">
					<div class="footer-info__block"><?php the_socials(['whatsup','telegram','phone']); ?></div>
					<div class="footer-info__block"><?php the_socials(['email']); ?></div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="wrapper">
			<div class="footer-bottom__box">
				<?php
				echo $l['copy'];
				if ( ! empty( get_privacy_policy_url() ) ) {
					echo '<p><a href="' . get_privacy_policy_url() . '">' . __( 'Политика конфиденциальности', 'kibrteka' ) . '</a></p>';
				}
				echo '<p>Дизайн разработан <a href="https://verstkovo.ru/">Slice Planet</a></p>';
				?>
			</div>
		</div>
	</div>
</footer>
<!-- FOOTER EOF   -->