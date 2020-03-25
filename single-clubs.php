<?php
global $themeAR;
get_header();
ar_the_view( 'section__club-main-block' );
ar_the_view( 'section__club-booking' );
ar_the_view( 'section__finding' );
ar_the_view( 'section__club-advantages' );
ar_the_view( 'section__club-prices' );
ar_the_view( 'section__clubs' );
ar_the_view( 'section__club-address' );
?>
    <script>
        setTimeout(function () {
            var elem = document.createElement('script');
            elem.type = 'text/javascript';
            elem.src = 'https://api-maps.yandex.ru/2.1/?lang=ru_RU&onload=getYaMap';
            document.getElementsByTagName('body')[0].appendChild(elem);
        }, 2000);
    </script>
<?php
get_footer();