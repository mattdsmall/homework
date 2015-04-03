<?php
require_once 'inc/database.php';
//Grab ID from URL
$id = $_GET['id'];
//var_dump($id);
$stmt = $conn->prepare("SELECT * FROM contacts WHERE id = $id");
$result = $stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$contact = current($stmt->fetchAll());
//var_dump($contact);
//Create Header for Name
?>

<h2><?= $contact['first_name'] . " " .  $contact['last_name'] ?></h2>
Email: <a href="mailto:<?= $contact['email'] ?>"><?= $contact['email'] ?></a>
<br />
Address: <?= $contact['address'] ?>
<br />
Phone #: <?= $contact['phone'] ?>
<br />
<a href="edit.php?id=<?= $id ?>"><button>Edit this Contact</button></a>
<a href="delete.php?id=<?= $id ?>"><button>Delete this Contact</button></a>
<?php include 'inc/footer.php' ?>