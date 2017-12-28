<?php
function radio_list($number)
		{
			for($i=1;$i<=$number;$i++)
			{
				?>
				<span id="number"><level for="name"><?php echo $i; ?><input type="radio" name="rate" value="<?php echo $i; ?>" id="name"></level></span>
				<?php
			}
		}
?>