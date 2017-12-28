<?php 
	include "core/init.php";
	protect_page();
	
	include "includes/overall/header.php"; 
	if(empty($_POST) === false)
	{
		$required_fields = array('current_password','password','password_again');
		foreach($_POST as $key=>$value)
		{
			if(empty($value) and in_array($key, $required_fields)===true)
			{
				$errors[] = "Fields marked with an asterisk is required. ";
				break ;
			}
		}
		if(md5($_POST['current_password']) === $user_data['password'])
		{
			if(trim($_POST['password']) !== trim($_POST['password_again']))
			{
				$errors[] = "Your new passwords doesnot match";
			}
			else if(strlen($_POST['password']) < 6)
			{
				$errors[] = "Your Password Must be greatter then 6 character.";
			}
			
			
		}
		else
		{
			$errors[] = "Your current password is incorrect.";
		}
		
	}
?>
	<h1>Change password</h1><br>
	
<?php
	if(isset($_GET['password_changed']) and empty($_GET['password_changed']))
	{
		echo "Your Password has been changed successfully.";
		
	}
	else
	{
		if(empty($_POST) === false and empty($errors) === true)
		{
			//change user_password.
			change_password($session_user_id,$_POST['password']);
			header("Location: changepassword.php?password_changed");
			exit();
			
		}
		else if(empty($errors) === false)
		{
?>
		<h2>We have tried to change your password but......</h2><br>
<?php
		// show Errors.
		echo output_errors($errors);
		
		}
	
	

?>
	<form action="changepassword.php" method="POST">
	<p>
		<ul>
			<li>
				Current Password*:<br>
				<input type="text" name="current_password">
			</li>
			<li>
				New Password*:<br>
				<input type="text" name="password">
			</li>
			<li>
				New Password again*:<br>
				<input type="text" name="password_again">
			</li>
			<li>
				
				<input type="submit" name="submit" value="Change password">
			</li>
		</ul>
	</p>
	</form>
<?php 
	}
	include "includes/overall/footer.php"; 

?>