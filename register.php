<?php 
	include "core/init.php";
	logged_in_redirect();
	include "includes/overall/header.php";
	if(empty($_POST) === false)
	{
		$required_fields = array('username','password','password_again','first_name','email');
		foreach($_POST as $key=>$value){
			if(empty($value) and in_array($key, $required_fields)===true)
			{
				$errors[] = "Fields marked with an asterisk is required. ";
				break ;
			}
		}
		if(empty($errors) === true)
		{
			if(user_exist($_POST['username']))
			{
				$errors[] = "Sorry this username '".$_POST['username']."' has already taken.<br> Please Try something different.";
			}
			if(preg_match("/\\s/",$_POST['username']) == true)
			{
				$errors[] = "Username must not contain any space";
			}
			if(strlen($_POST['password']) < 6)
			{
				$errors[] = "Your Password Must be greatter then 6 character.";
			}
			if($_POST['password'] !== $_POST['password_again'])
			{
				$errors[] = "Your password doesnot match.";
			}
			if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false)
			{
				
				$errors[] = "The email address '".$_POST['email']."' is invalid. Please Supply a valid email address.";
			}
			if(mail_exist($_POST['email']) == true)
			{
					$errors[] = " SORRY! This mail_id '".$_POST['email']."' is alreday in use.<br> Please try with some another email. ";
			}
		}
	}
	
?>
	<h1>Register</h1>
<?php
	if(isset($_GET['success']) === true and empty($_GET['success']) === true)
	{
		echo "You have been registerd successfully!<br> Please check your email to activate the account.<br><br>";
		//echo "Please use this url to activate your account <br>http://localhost/series/lr/activate.php?email=&email_code=";
	}
	else
	{
		if(empty($_POST) === false and empty($errors))
		{
			$register_data = array(
			'username' 		=> $_POST['username'],
			'password' 		=> $_POST['password'],
			'first_name' 	=> $_POST['first_name'],
			'last_name' 	=> $_POST['last_name'],
			'email' 		=> $_POST['email'],
			'email_code'	=> md5($_POST['username']+ time())
			
			);
			$register_user = register_user($register_data);
			header('Location: register.php?success');
			exit();
		}
		
		else if(empty($errors) === false)
		{
			echo output_errors($errors);
		}
	
?>
	
		<form action="register.php" method="POST">
			<ul>
				<li>
					Username*:<br>
					<input type="text" name="username"  />
				</li>
				<li>
					Password*:<br>
					<input type="password" name="password" />
				</li>
				<li>
					Password Again*:<br>
					<input type="password" name="password_again" />
				</li>
				<li>
					First Name*:<br>
					<input type="text" name="first_name"/>
				</li>
				<li>
					Last Name:<br>
					<input type="text" name="last_name"/>
				</li>
				<li>
					email*:<br>
					<input type="text" name="email"/>
				</li>
				<li>
					<input type="submit" name="submit" value="Register"/>
				</li>
			</ul>
		</form>
<?php
	}
 include "includes/overall/footer.php"; ?>
