<?php
global $themeAR;
get_header();
if ( have_posts() ) :
	echo '<main class="content club-single-content">';
	while ( have_posts() ) : the_post();
		the_content();
		ar_the_view( 'section__club-main-block' );
		ar_the_view( 'section__club-booking' );
		ar_the_view( 'section__finding' );
		ar_the_view( 'section__club-advantages' );
		ar_the_view( 'section__club-prices' );
		ar_the_view( 'section__clubs' );
		ar_the_view( 'section__club-address' );

		$contacts = get_field('contacts');
		$yamap = json_decode($contacts['location']['yamap'],true);
		?>
        <script>
            setTimeout(function () {
                var elem = document.createElement('script');
                elem.type = 'text/javascript';
                elem.src = 'https://api-maps.yandex.ru/2.1/?lang=ru_RU&onload=getYaMap';
                document.getElementsByTagName('body')[0].appendChild(elem);
            }, 200);
        </script>
	<?php
	endwhile;
	echo '</main>';
endif;
get_footer();
?>
<script>
    setTimeout(function(){
        if ($('#map').length) {
            ymaps.ready(function () {
                var myMap = new ymaps.Map('map', {
                    center: [<?= $yamap['center_lat']; ?>, <?= $yamap['center_lng']; ?>],
                    zoom: <?= $yamap['zoom']; ?>
                }, {
                    searchControlProvider: 'yandex#search'
                })

                if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
                    myMap.behaviors.disable('multiTouch');
                    myMap.behaviors.disable('scrollZoom');
                    myMap.behaviors.disable('drag');
                };
                myMap.behaviors.disable('scrollZoom');
                myMap.controls.remove('geolocationControl');
                myMap.controls.remove('searchControl');
                myMap.controls.remove('trafficControl');
                myMap.controls.remove('typeSelector');
                myMap.controls.remove('fullscreenControl');
                myMap.controls.remove('rulerControl');
            });

        };
    }, 2000)
</script>