<!-- BEGIN SINGLE NEWS -->
<?php $s = get_field( 'content' ); ?>
<div class="single-news">
	<div class="wrapper">
		<div class="single-news__content js-add-wrap-for-img">
			<?php
			echo str_replace(['height=','<img class="', 'src='], ['data-height=','<img class="js-img ','data-src='], $s['desc']);
			the_share();
			?>
		</div>
	</div>
</div>
<?php unset( $s ); ?>
<!-- SINGLE NEWS EOF   -->