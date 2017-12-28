<?php
	function has_rated($user_id,$teacher_id)
	{
		$teacher_id 	= (int)$teacher_id;
		$user_id 		= (int)$user_id; 
		return (mysql_result(mysql_query("SELECT COUNT(`rating_id`) FROM `rating_table` WHERE `user_id` = $user_id AND `teacher_id` = $teacher_id") ,0) == 1) ? true : false;
		
	}
	
	function rate_value_by_user_to_teacher($user_id,$teacher_id)
	{
		$teacher_id 	= (int)$teacher_id;
		$user_id 		= (int)$user_id;
		return mysql_result(mysql_query("SELECT `rate_value` FROM `rating_table` WHERE `user_id` = $user_id AND `teacher_id` = $teacher_id") ,0);
	}
	
	
	function update_rating_table($user_id,$teacher_id,$rate_value)
	{
		$teacher_id 	= (int)$teacher_id;
		$user_id 		= (int)$user_id;
		$rate_value		= (int)$rate_value;
		mysql_query("UPDATE `rating_table` SET `rate_value` = $rate_value WHERE `user_id` = $user_id AND `teacher_id` = $teacher_id");	
	}
	
	function update_teacher_table($teacher_id)
	{
		$raters 	= raters($teacher_id);
		$rating 	= total_rating_value($teacher_id);
		$average	= average_rating($teacher_id);
		mysql_query("UPDATE `teachers` SET `raters` = $raters, `rating` = $rating, `average` = $average WHERE `teacher_id` = $teacher_id");
	}
	
	function insert_rate_teacher($user_id,$teacher_id,$rate_value)
	{
		//mysql_query("INSERT INTO `u410837921_lr`.`rating_table` (`rating_id`, `user_id`, `teacher_id`, `rate_value`) VALUES (NULL, '$user_id', '$teacher_id', '$rate_value') ");
		mysql_query("INSERT INTO `lr`.`rating_table` (`rating_id`, `user_id`, `teacher_id`, `rate_value`) VALUES (NULL, '$user_id', '$teacher_id', '$rate_value') ");
	}
	
	
	
	function radio_list($number, $teacher_id)
	{
		for($i=1;$i<=$number;$i++)
		{
			?>
			<span id="number"><level for="name"><?php echo $i; ?><input type="radio" name="<?php echo $teacher_id; ?>" value="<?php echo $i; ?>" id="name" <?php if((isset($_POST[$teacher_id])) === true and $_POST[$teacher_id] == $i) { echo "checked"; } ?> ></level></span>
			<?php
		}
	}
	
	function raters($teacher_id)
	{
		return mysql_result(mysql_query("SELECT COUNT(`rating_id`) FROM `rating_table` WHERE `teacher_id` = $teacher_id"),0);
	}
	
	function average_rating($teacher_id)
	{
		return mysql_result(mysql_query("SELECT AVG(`rate_value`) FROM `rating_table` WHERE `teacher_id` = $teacher_id"), 0);
	}
	
	function total_rating_value($teacher_id)
	{
		return mysql_result(mysql_query("SELECT SUM(`rate_value`) FROM `rating_table` WHERE `teacher_id` = $teacher_id"), 0);
	}
	
	/*function radio_list($number, $teacher_id)
	{
		for($i=1;$i<=$number;$i++)
		{
			?>
			<span id="number"><level for="name"><?php echo $i; ?><input type="radio" name="rate" value="<?php echo $i; ?>" id="name" <?php if((isset($_POST['rate'])) === true and $_POST['rate'] == $i) { echo "checked"; } ?> ></level></span>
			<?php
		}
	}*/
		
	function teacher_data($teacher_id)
	{
		$data = array();
		$teacher_id = (int)$teacher_id;
		
		$func_num_args = func_num_args();
		$func_get_args = func_get_args();
		
		if($func_get_args > 1)
		{
			unset($func_get_args[0]);
			$fields = "`".implode('`,`', $func_get_args)."`";
			$query = "SELECT ".$fields. " FROM `teachers` WHERE `teacher_id` = ".$teacher_id;
			$data = mysql_fetch_assoc(mysql_query($query));
			return $data;
		}
		
	}
	
	
	function teacher_block($teacher_id)
	{
		//require "teachers_data.php";
		
		$teacher_data = teacher_data($teacher_id,'teacher_id','name','branch','designation','contact_number','email','detail_link','raters','rating','average');
		echo nl2br("\n");
		
?>
	
		
<fieldset class="teachers_nav">
	<legend><a href="<?php echo $teacher_data['detail_link']; ?>"><?php echo $teacher_data['name']; ?></a><br></legend>
	<ul>
		<?php 
			if((isset($_POST['submit'])) === true and (isset($_POST[$teacher_id])) === true)
				{
					global $user_data;
					
					$rating_value = $_POST[$teacher_id];
					//echo "Rating value = ".$rating_value."<br>";
					//echo "Yor rating for ".$teacher_data['name']." is ".$rating_value."<br>";
					
					if(has_rated($user_data['user_id'],$teacher_id) === true)
					{
						update_rating_table($user_data['user_id'],$teacher_id,$rating_value);
						update_teacher_table($teacher_id);
						echo " Successfully Updated.";
					}
					else
					{
						insert_rate_teacher($user_data['user_id'],$teacher_id,$rating_value);
						update_teacher_table($teacher_id);
						echo "Rating is Successfull.";
					}
				
				}
			
			
		?>
		<div id="nav_list">
			<li>
				<b>Department:</b> <?php echo $teacher_data['branch']; ?>
			</li>
			<li>
				<b>Designation:</b> <?php echo $teacher_data['designation']; ?>
			</li>
			<li>
				<b>Something about:</b>
			</li>
			<li>
				<b>Contact number:</b> <?php echo $teacher_data['contact_number']; ?> 
			</li>
			<li>
				<b>Email id:</b> <?php echo $teacher_data['email']; ?>
			</li>
			<li>
				<b>Total number of raters:</b> <?php echo $teacher_data['raters']; ?>
			</li>
			<li>
				<b>Total rating score:</b> <?php echo $teacher_data['rating']; ?>
			</li>
			<li>
				<b>Average rating score:</b> <?php echo $teacher_data['average']; ?>
			</li>
			<?php
				/*if((isset($_POST['submit'])) === true and (isset($_POST[$teacher_id])) === true)
				{
					global $user_data;
					echo "user_id = ". $user_data['user_id']."<br>";
					$rating_value = $_POST[$teacher_id];
					echo "Rating value = ".$rating_value."<br>";
					echo "Yor rating for ".$teacher_data['teacher_id'].".".$teacher_data['name']." is ".$rating_value."<br>";
					
					if(has_rated($user_data['user_id'],$teacher_id) === true)
					{
						update_rating_table($user_data['user_id'],$teacher_id,$rating_value);
						update_teacher_table($teacher_id);
						echo " Successfully Updated.";
					}
					else
					{
						insert_rate_teacher($user_data['user_id'],$teacher_id,$rating_value);
						update_teacher_table($teacher_id);
						echo "Rating is Successfull.";
					}
				
				}*/
				global $user_data;
				if((has_rated($user_data['user_id'], $teacher_id)) === true )
				{
					
					echo "Your rating for ".$teacher_data['name']." is ".rate_value_by_user_to_teacher($user_data['user_id'] , $teacher_id)."<br>";
				}
				else
				{
					echo "Still you have not rated this teacher.";
				}
			?>
			<form action="" method="POST">
			<li>
				<?php radio_list(10, $teacher_id);?>
			</li>
			<li>
			
				<input type="submit" name="submit" value=<?php global $user_data; if(has_rated($user_data['user_id'],$teacher_id) === true) { echo "UPDATE"; } else{ echo "Rate"; }?> id="rate_button"/>
				
			</li>
			</form>
		</div>
	</ul>
	

</fieldset>
		
		<?php
	}
?>