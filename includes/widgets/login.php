<div class="widget">
	<h2>Login/register</h2>
		<div class="inner_widget">
			<form action="login.php" method="POST">
				<ul id="login">
					<li>
						username:<br>
						<input type="text" name="username">
					</li>
					<li>
						Password:<br>
						<input type="password" name="password">
					</li>
					<li>
						<input type="submit" name="submit" value="Log in">
					</li>
					<li>
						<a href="register.php">Register!</a>
					</li>
					<li>
						Forgotten <a href="recover.php?mode=username">username</a> or <a href="recover.php?mode=password">password</a> ? 
					</li>
					
				</ul>
			</form>
		</div>
</div>
