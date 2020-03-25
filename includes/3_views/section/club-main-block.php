<!-- BEGIN MAIN BLOCK -->
<?php $contacts = get_field( 'contacts' ); ?>
<div class="main-block main-block__club-single">
	<div class="main-block__box js-img" data-src="<?= $contacts['background_img']['url']; ?>">
		<div class="wrapper">
			<div class="main-block__wrap">
				<div class="main-block__info">
					<div class="main-block__info-title">
						<h1><?= $contacts['title']; ?></h1>
					</div>
					<div class="main-block__info-subtitle">
						<span><?= $contacts['subtitle']; ?></span>
					</div>
					<div class="club-address__item-detail">
						<?php if($link = $contacts['location']['address']): ?>
							<ul>
								<li class="social-icon"><a href="<?php the_permalink($item->ID); ?>"><i class="icon-marker"></i></a></li>
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
						<ul>
							<?php
							if ( $link = ( $contacts['contact_club']['work_time'] ) ) {
								echo "<li class=\"social-icon\"><a href=\"#\"><i class=\"icon-time\"></i></a></li>";
								echo "<li class=\"club-address__item-detail-text\">{$link}</li>";
							}
							?>
						</ul>
					</div>
				</div>
				<div class="main-block__map">
					<div id="map"></div>
				</div>
			</div>

		</div>
	</div>
</div>
<?php unset($contacts); ?>
<!-- MAIN BLOCK EOF   -->