<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head></head>

<body>
	<?php

	if($_SERVER['REQUEST_METHOD'] == "POST") 
	{
		if($_POST["username"] == "Matt" && $_POST["password"] == "five")
		{
			$_SESSION["Admin"] = true;
			$_SESSION["Count"] = 1;
			?>You have logged in!  <a href="home.php">Go to the main page</a><?php 
		}
		else 
		{
			?>You have not logged in<?php

		}
	}
	else
	{
		?>
		<form action="login.php" method="POST">
			Username:<br>
			<input type="text" name="username" value="">
			<br>
			Password:<br>
			<input type="text" name="password" value="">
			<br><br>
			<input type="submit" value="Submit">
		</form>

		<?php 
	}

	?>
	

</body>
</html>
