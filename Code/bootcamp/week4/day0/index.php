<head>
    <style>
        table,tr
        {
            border: 1px solid black;
            text-align: left;
        }
    </style>
    <link rel="stylesheet" href="css/jquery-ui.css"/>
</head>
<body>
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
            echo "<td><a href='view.php?id={$contact['id']}'> {$contact['first_name']} {$contact['last_name']}</a></td>";
            echo "</tr>";
        }
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
</table>
<a href="add.php"><button name="add">Add Contact</button></a>
<br />
<script src="js/jquery-1.11.2.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
        //Listen for Click Event
        $("button[name='add']").click(function(event){
            //Purpose: Disable bubbling up
            //Effect: Disables a link from sending us to add.php
            event.preventDefault();
            //Display UI Modal
            //.load function does an AJAX call to our form
            $('#dialog-form').load('add.php').dialog({
                autoOpen: true,
                height: 300,
                width: 350,
            });
        });
    });
    
</script>
<div id="dialog-form" style="display: none;">
</div>
</body>
&copy; Codervox 2015 