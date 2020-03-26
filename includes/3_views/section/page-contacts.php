<!-- BEGIN CLUB ADDRESS -->
<?php
$s    = get_field( 'events' );
$args = [
	'block' => [
		'class' => 'contacts-club-address',
		'id'    => 'two-section'
	]
];
ar_the_view( 'section__address', $args );
unset( $s );
?>
<!-- CLUB ADDRESS EOF   -->