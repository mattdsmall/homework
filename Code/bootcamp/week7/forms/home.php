<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head></head>

<body>
	<?php
	if( !empty( $_SESSION["Admin"] ) )
	{

		if($_SESSION["Admin"] == true)
		{
			$_SESSION["Count"]+=4086;
			echo "You have " . $_SESSION["Count"] . " points!!!!";
		}
		else
		{
			echo "Dude, you need to login";
		}

	}
	else
	{
		echo "Dude, you need to log in!!! <a href=\"login.php\">Click here</a> to login ";
	}
	?>
</body>
</html>