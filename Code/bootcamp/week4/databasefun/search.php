<?php
//Get Parameter from URL
$query = $_GET['q'];
$servername = "localhost";
$username = "homestead";
$password = "secret";
$dbname = "search";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // prepare sql and bind parameters
    $stmt = $conn->prepare("SELECT * FROM languages WHERE name LIKE :criteria ORDER BY name ASC");
    $query = "%$query%";
    $stmt->bindParam(':criteria', $query );
    //$params = array($query);
    $stmt->execute();
    $languages = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($languages as $language)
    {
    	echo $language['name'] . "<br />";
    }
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
	$conn = null;