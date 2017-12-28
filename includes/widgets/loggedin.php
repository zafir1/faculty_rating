<div class="widget">
	<h2>Hello <br><?php echo $user_data['first_name']. " ". $user_data['last_name']; ?>!</h2>
		<div class="inner_widget">
			<?php 
				if(isset($_FILES['profile']) === true)
				{
					if(empty($_FILES['profile']['name']) === true)
					{
						echo "Please Select a file.";
					}
					else
					{
						$allowed = array('jpg','png','jpeg','gif');
						$file_name = $_FILES['profile']['name'];
						$file_extn = strtolower(end(explode('.',$file_name)));
						$file_temp = $_FILES['profile']['tmp_name'];
						if(in_array($file_extn, $allowed) === true)
						{
							// Upload file.
							change_profile_image($session_user_id,$file_temp,$file_extn);
							header("Location: index.php");
						}
						else
						{
							echo "Incorrect file type. Allowed: ";
							echo implode(", ", $allowed);
						}
							
					}
				}
			
				if(empty($user_data['profile']) === false){	
			?>
				<div class="profile">
					<?php echo '<img src="'.$user_data['profile'].'" alt="'.$user_data['first_name'].'">'; ?>
					
				</div>
			
			<?php
				}
			?>
			<div  id="upload_img_form">
			<form action="" method="POST" enctype="multipart/form-data">
				<input type="file" name="profile">
				<span id="upload_button"><input type="submit" name="submit" value="Upload!"><span>
			</form>
			</div>
			<ul>
				<li><a href="logout.php">Log out</a></li>
				<li><a href="<?php echo $user_data['username']; ?>">Profile</a></li>
				<li><a href="changepassword.php">change password!</a></li>
				<li><a href="setting.php">Settings</a></li>
			
			</ul>
		</div>
</div>
