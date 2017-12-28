<?php
	/*include "includes/overall/header.php"; 
	require "core/init.php";
	if(session_destroy())
	{
		echo "Successfully Loged Out.<br>";
		echo "<a href='index.php'>Home page</a>";
	}
	 include "includes/overall/footer.php"; 
*/
	session_start();
	session_destroy();
	header("Location: index.php");
?>