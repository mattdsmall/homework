<?php
	require_once('inc/database.php');
	try
	{
		$stmt = $conn->prepare("SELECT * FROM contacts WHERE id =:id");
		$stmt->bindParam(':id', $_GET['id']);
    	$stmt->execute();
    	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    	$contact = $stmt->fetchAll();
    	$contact = current($contact);
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
	//Grab Form Fields from Post
	if( isset($_POST['submit'] ))
	{
		//Field Variables
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$id = $_POST['id'];
		try
		{
			$stmt = $conn->prepare("UPDATE contacts 
				SET first_name=:firstname, last_name=:lastname, phone=:phone, email=:email, address=:address 
				WHERE id = :id");
			$stmt->bindParam(':firstname', $first_name);
			$stmt->bindParam(':lastname', $last_name);
			$stmt->bindParam(':phone', $phone);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':address', $address);
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			echo "Updated contact $first_name $last_name!";
			header('Location: index.php');
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	//Insert into Database
?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
	<fieldset>
		<legend>Edit a Contact</legend>
		<input type="text" name="first_name" value="<?= $contact['first_name'] ?>" placeholder=" First Name" maxlength="50"/>
		<input type="text" name="last_name" value="<?= $contact['last_name'] ?>" placeholder="Last Name" maxlength="50"/>
		<br />
		<input type="text" name="email" value="<?= $contact['email'] ?>" placeholder="Email Address" maxlength="150"/>
		<br />
		<input type="text" name="address" value="<?= $contact['address'] ?>" placeholder="Address" maxlength="150" />
		<br />
		<input type="text" name="phone" value="<?= $contact['phone'] ?>" maxlength="10" placeholder="Phone" />
		<br />
		<input type="hidden" name="id" value="<?= $contact['id'] ?>" />
		<input type="submit" name="submit" value="Submit Changes"/>
	</fieldset>
</form>

<?php include 'inc/footer.php' ?>