<?php
	include "core/init.php";
	logged_in_redirect();
	if(empty($_POST) === false)
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		if(empty($username)===true || empty($password)===true)
		{
			$errors[] = "You need to enter a username and a password .";
		}
		else if (user_exist($username) === false)
		{
			$errors[] = "Sorry this username doesn't exist in our database. Have you registered.";
		}
		else if (user_active($username) === false)
		{
			$errors[] = "Sorry Your account is not activated. Please activate your account for further movement.";
		}
		else
		{
			if(strlen($password) > 32)
			{
				$errors[] = "Very long password.";
			}
			$login = login($username, $password);
			if($login === false)
			{
				$errors[] = "This username and password combination is incorrect.";
			}
			else{
				$_SESSION['user_id'] = $login;
				header('Location:index.php');
				exit();
			}
			
		}
		
	}
	else{
		$errors[] = "No data received";
	}
	include "includes/overall/header.php";
	if(empty($errors) === false){
		
?>
	<h2>We tried to log you in But....</h2>
<?php 
	}
	echo output_errors($errors);

include "includes/overall/footer.php"; ?>