<?php
	require_once('inc/database.php');
	//Grab Form Fields from Post
	if( isset($_POST['submit'] ))
	{
		//Field Variables
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		try
		{
			$stmt = $conn->prepare("INSERT INTO contacts (first_name, last_name, phone, email, address) VALUES (:firstname, :lastname, :phone, :email, :address)");
			$stmt->bindParam(':firstname', $first_name);
			$stmt->bindParam(':lastname', $last_name);
			$stmt->bindParam(':phone', $phone);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':address', $address);
			$stmt->execute();
			echo "Added $first_name $last_name as a Contact!";
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	//Insert into Database
?>

<form action="add.php" method="post">
	<fieldset>
		<legend>Add a Contact</legend>
		<input type="text" name="first_name" value="" placeholder=" First Name" maxlength="50"/>
		<input type="text" name="last_name" value="" placeholder="Last Name" maxlength="50"/>
		<br />
		<input type="text" name="email" value="" placeholder="Email Address" maxlength="150"/>
		<br />
		<input type="text" name="address" value="" placeholder="Address" maxlength="150" />
		<br />
		<input type="text" name="phone" value="" maxlength="10" placeholder="Phone" />
		<br />
		<input type="submit" id="add_contact" name="submit" value="+ Contact"/>
	</fieldset>
</form>

<?php include 'inc/footer.php' ?>