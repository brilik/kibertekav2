<?php
ar_the_view( 'header' );
if ( ! is_404() ) {
	ar_the_view( 'footer' );
}
ar_the_view( 'popup__call' );
ar_the_view( 'popup__booking' );
?>
</div>

<div class="icon-load"></div>

<!-- BODY EOF   -->
<?php wp_footer(); ?>
</body>

</html>