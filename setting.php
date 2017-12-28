<?php 
	include "core/init.php";
	protect_page();
	include "includes/overall/header.php";
	if(empty($_POST) === false)
	{
		$required_fields = array('username','first_name','email');
		foreach($_POST as $key=>$value)
		{
			if(empty($value) and in_array($key, $required_fields))
			{
				$errors[] = "Fields mark with an asterisk is required.";
				break;
			}
		}
	}
	
	if(empty($errors) === true)
	{
		if(isset($_POST['email']))
		{
			if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false)
			{
				$errors[] = "A valid email address is required.";
			}
			else if(mail_exist($_POST['email']) === true and ($user_data['email'] !== $_POST['email']))
			{
				$errors[] = "This mail id is already in use.";
			}
		}
		
	}
	
	
?>
<h1>Settings</h1>
<?php
	if(isset($_GET['success']) and empty($_GET['success']))
	{
		echo "Your details has been updated successfully.";
	}
	else
	{
		if(empty($_POST) === false and empty($errors) === true)
		{
			//update users account.
			$allow_email = ($_POST["allow_email"]) ? 1 : 0;
			$update_user = array(
				'first_name' 	=> $_POST['first_name'],
				'last_name'  	=> $_POST['last_name'],
				'email'      	=> $_POST['email'],
				'username'   	=> $_POST['username'],
				'allow_email'	=> $allow_email
			
			);
			
				update_user($update_user);
				header('Location: setting.php?success');
				exit();
			
			/*else if(user_exist($_POST['username']) === true)
			{
				$errors[] = "This username ".$_POST['username']." is already in use. Please try something different. ";
			}*/
		}
		else if(empty($errors) === false)
		{
			echo output_errors($errors);
		}

	?>
		<form action="setting.php" method="post">
			<ul>
				<li>
					Username*:<br><input type="text" name="username" value="<?php echo $user_data['username']; ?>"/>
				</li>
				<li>
					First name*:<br><input type="text" name="first_name" value="<?php echo $user_data['first_name']; ?>" >
				</li>
				<li>
					Last name*:<br><input type="text" name="last_name" value="<?php echo $user_data['last_name']; ?>" >
				</li>
				<li>
					email*:<br><input type="text" name="email" value="<?php echo $user_data['email']; ?>" >
				</li>
				<li>
					<input type="checkbox" name="allow_email" <?php if($user_data['allow_email'] == 1) {echo 'checked = "checked"'; }?>>  Would You like receive email from us?
				</li>
				<li>
					<input type="submit" name="submit" value="Update!"/>
				</li>
			</ul>
		</form>

<?php
	}
	include "includes/overall/footer.php"; ?>
