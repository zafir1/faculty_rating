<div class="widget">
	<h2>USERS</h2>
		<div class="inner_widget">
		<?php
			$user_count = users_count();
			$suffix = ($user_count >1) ? 's' : '';
		?>
			We have <?php echo users_count(); ?> registered user<?php echo $suffix; ?> in present.
		</div>
</div>