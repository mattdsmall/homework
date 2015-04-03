<?php
require_once('inc/database.php');
if(!empty($_GET['id']))
	$id = $_GET['id'];
try
{
	//Read from Database
	$stmt = $conn->prepare("SELECT first_name, last_name FROM contacts WHERE id =:id");
	$stmt->bindParam(':id', $id);
	$result = $stmt->execute();
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	$contact = current($stmt->fetchAll());
	//Display Name of contact
}
catch(PDOException $e)
{
	echo $e->getMessage();
}
if( isset($_POST['confirm']) ) 
{
	$id = $_POST['id'];
	try
	{
		$stmt = $conn->prepare("DELETE FROM contacts WHERE id =:id");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		echo "Contact Deleted!";
		header('Location: index.php');
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
}
?>
<p>Are you sure?</p>
<p><?= "{$contact['first_name']} {$contact['last_name']}" ?>, will be deleted</p>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" >
<input type="hidden" name="id" value="<?= $id ?>" />
<a href="view.php?id=<?=$id ?>"><input type="button" value="Cancel" /></a>
<input type="submit" name="confirm"value="Yes"/>
</form>