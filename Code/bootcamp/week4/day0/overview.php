<html>
<h2>Overview</h2>
<table>
	<tr>
		<th>Name</th>

<?php
//Grab first and last name from contacts

//Display the output


$servername = "localhost";
$username = "homestead";
$password = "secret";
$database = "address_book";

require_once ('inc/database.php');

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password, $database);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $stmt = $conn->prepare("SELECT first_name, last_name, id FROM contacts"); 
	    $stmt->execute();
	    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	    $contacts = $stmt->fetchall();
	    //var_dump($$stmt->fetchall());

	    foreach ( $contacts as $contact)
	    {
	    	//var_dump($contact);
	    	echo "<tr>";
	    	echo "<td><a href='view.php?id=1'>" . $contact ['first_name'] . " " . $contact ['last_name'] . "</a></td>";
	    	
	    	echo "</tr>";
	    }

    }

    //SELECT first_name, last_name FROM contacts;
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }



?>
</table>
</html>