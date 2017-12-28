<?php 
include "core/init.php";
include "includes/overall/header.php";
	if(isset($_GET['username']) === true and empty($_GET['username']) === false)
	{
		$username = $_GET['username'];
		if(user_exist($username) === true)
		{
			$user_id = user_id_from_username($username);
			$profile_data = user_data($user_id,'first_name','last_name','email');
		?>
			<div id="profile">
				<div id="profile_picture">
					profile picture.
				</div>
				<h1><?php echo $profile_data['first_name'];?>'s Profile</h1><br><br>
				USERNAME: <?php echo $username."<br>"; ?>
				FULL NAME: <?php echo $profile_data['first_name']." ".$profile_data['last_name']."<br>"; ?>
				EMAIL: <?php echo $profile_data['email']."<br>"; ?>
				
			</div>
		<?php
		}
		
		else
		{
			echo "Sorry this username doesnot exist.";
		}
	}
	else
	{
		header("Location:index.php");
	}
include "includes/overall/footer.php";

?>