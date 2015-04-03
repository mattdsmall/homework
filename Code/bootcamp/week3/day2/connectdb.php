<?php
$servername="localhost";
$username = "homestead";
$password = "secret";
$database = "bookstore";
//Create the connection
$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn)
{
	die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully to: " . $database;
$sql = "SELECT * FROM books ORDER BY price DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<head>
	<title>Read from Database</title>
	<style>
	td
	{
		text-align: center;
	}
	</style>
</head>
<table id="books" border="1px solid black;">
<tr>
	<th>ID</th>
	<th>Title</th>
	<th>Author</th>
	<th>Price</th>
</tr>
<tbody>
<?php if( mysqli_num_rows($result) > 0 ): ?>
	<?php while($row = mysqli_fetch_assoc($result)): ?>
		<tr>
			<td><?= $row['id']; ?></td><td><?= $row['title']; ?></td>
			<td><?= $row['author']; ?></td><td><?= $row['price']; ?></td>
		</tr>
	<?php endwhile; ?>
<?php endif; ?>

</tbody>
</table>
<br />

<?php 
if( isset($_POST['submit']) )
{
	$title = $_POST['title'];
	$author = $_POST['author'];
	$price = $_POST['price'];
	$sql = "INSERT INTO books (author, title, price) VALUES ('$author', '$title', $price)";
	mysqli_query($conn, $sql);
	header('Location: bookstore.php');
}
?>
<form action="bookstore.php" method="post">
Author: <input type="text" name="author" />
<br />
Title: <input type="text" name="title" />
<br />
Price: <input type="text" name="price" />
<br />
<input type="submit" name="submit" value="Add Book" />

</form>