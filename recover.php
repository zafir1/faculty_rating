<?php 
	include "core/init.php";
	logged_in_redirect();
	include "includes/overall/header.php"; 
?>
	<h1>Recover</h1>
<?php
	if(isset($_GET['success']) === true and empty($_GET['success']) === true)
	{
?>
		<p>Thank you. We have mailed You.</p>
<?php
	}
	else
	{
		$mode_allowed = array('username','password');
		if(isset($_GET['mode']) === true and in_array($_GET['mode'], $mode_allowed))
		{
			if(isset($_POST['email']) === true and empty($_POST['email']) === false)
			{
				if(mail_exist($_POST['email']) === true)
				{
					// recover username or password.;
					//recover($_GET['mode'],$_POST('email'));
					header("Location:recover.php?success");
					exit();
				}
				else
				{
					echo "Sorry! this email address doesnot exist in our database.";
				}
					
			}
			else if(isset($_POST['email']) and empty($_POST['email']) === true)
			{
				echo "A registered email address is required to recover the username or password.";
			}
?>
		<form action="" method="POST">
			<ul>
				<li>
					PLease enter a email address:<br>
					<input type="text" name="email">
				</li>
				<li>
					<input type="submit" name="submit" value="Recover">
				</li>
			</ul>
			
<?php
		}
		else
		{
			header("Location:index.php");
		}
	}
?>
<?php include "includes/overall/footer.php"; ?>