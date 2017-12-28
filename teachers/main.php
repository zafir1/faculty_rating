<?php include "core/functions/teacher_function.php";?>
<!DOCTYPE html>
<html>
<head>
	<title>
		onlineHIT
	</title>
	<link rel="stylesheet" type="text/css" href="css/teachers.css">
</head>
<body>
	<fieldset>

		<header>
			<legend><h1><a href="">Teacher's name</a></h1></legend>
		</header>
		<aside>
			<h1 id="image">Image</h1>
		</aside>
			<nav>
				<ul>
					<li>
						Department:<br><br>
					</li>
					<li>
						Status:<br><br>
					</li>
					<li>
						Something About:<br><br>
					</li>
					<li>
						Contact number:<br><br>
					</li>
					<li>
						Email id:<br><br>
					</li>
					<li>
						Total number of raters:<br><br>
					</li>
					<li>
						Total rating score:<br><br>
					</li>
					<li>
						Average:<br><br>
					</li>
				</ul>
			</nav>

		<section>
			<article>
				<h3>Give some rating to this teacher :</h3>
			</article>
		</section>

		

		<footer>
			<div class="radio_list">
			<?php radio_list(10);?><br>
			</div>

			<div id="submit_button">
				<input type="submit" name="submit" value="Rate!">	
			</div>
		</footer>

</fieldset>
</body>
</html>