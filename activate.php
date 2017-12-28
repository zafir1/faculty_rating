<?php  
	include "core/init.php";
	logged_in_redirect();
	include "includes/overall/header.php";
	if(isset($_GET['success']) === true and empty($_GET['success']) === true)
	{
		echo "Your account has been activated successfully. <br> Now you are free to log in with your registered email address and password.";
	}
	 else if(isset($_GET['email']) === true and isset($_GET['email_code']) === true)
	{
		$email = trim($_GET['email']);
		$email_code = trim($_GET['email_code']);
		if(mail_exist($email) === false)
		{
			$errors = "Opps! something went wrong, we couldn't find this email address!";
		}
		else if(activate($email,$email_code) === false)
		{
			$errors = "Sorry! we had problems activating your account.";
		}
		if(empty($errors) === false)
		{
?>
		<h2>Opps!!!!!</h2>	
<?php
		echo output_errors($errors);
		}
		else{
			header("Location:activate.php?success");
			exit();
		}
	}
	else
	{
		header("Location:index.php");
	}
	// http://localhost/series/lr/activate.php?email=ahmadzafir01@gmail.com&email_code=123
	
	include "includes/overall/footer.php";
 ?>