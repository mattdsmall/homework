<head>
	<style>
		table,tr
		{
			border: 1px solid black;
			text-align: left;
		}
	</style>
</head>
<h2>Overview</h2>
<table>
<tr>
	<th>Name</th></th>
</tr>
<?php
require_once ('inc/database.php');
try {
    	$stmt = $conn->prepare("SELECT first_name, last_name, id FROM contacts");
    	$stmt->execute();
    	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    	$contacts = $stmt->fetchAll();
    	//var_dump($stmt->fetchAll());
    	foreach ( $contacts as $contact)
    	{
    		//var_dump($contact);
    		echo "<tr>";
    		echo "<td><a href='view.php?id=1'> {$contact['first_name']} {$contact['last_name']}</a></td>";
   
    		echo "</tr>";
    	}
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
</table>