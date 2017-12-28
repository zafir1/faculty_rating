<?php 
	include "core/init.php";
	protect_page();
	admin_protect();
	include "includes/overall/header.php"; 
	
?>
	<h1>Email All users:</h1>
<?php
	if(isset($_GET['success']) and (empty($_GET['success'])) === true)
	{
		echo "Mail has Sent to all the registerd users.";
	}
	else
	{
		if(empty($_POST) === false)
		{
			if(empty($_POST['subject']) === true)
			{
				$errors[] = "Subject is empty.";
			}
			if(empty($_POST['body']) === true)
			{
				$errors[] = "Body is empty.";
			}
			if(empty($errors) === false)
			{
				echo output_errors($errors);
			}
			else if(empty($errors) === true)
			{
				mail_users($_POST['subject'], $_POST['body']); 
				header("Location: mail.php?success");
				exit();
			}
		}
	?>
		<form action="" method="POST">
			<ul>
				<li>
					Subject*: <br>
					<input type="text" name="subject" value="<?php if(isset($_POST['subject'])) { echo $_POST['subject']; }?>">
				</li>
				<li>
					Body*:<br>
					<textarea name="body" cols="60" rows="8" ><?php if(isset($_POST['body'])) { echo $_POST['body']; }?></textarea>
				</li>
				<li>
					<input type="submit" name="send_mail" value="Send"/>
				</li>
			</ul>
		
		
		</form>
<?php 
	}

include "includes/overall/footer.php"; ?>