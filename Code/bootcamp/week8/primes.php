<?php
//Create connection to database
$servername = "localhost";
$username = "homestead";
$password = "secret";
$database = "primes";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
//Alternative
//$i = 1;
//while ($i <= 1000) 
// Loop through 1 to 1000.
//Or you could have started at 2 since 2 is the first prime number
for($i = 1; $i <= 10000; $i++)
{
    if(isPrime($i))
    {
        //Insert into database
        //echo $i . " is Prime </br>";
        $sql = "INSERT INTO numbers (number) 
        VALUES ($i)";
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
}
    }
    //Else do nothing
}
$conn->close();
function isPrime($n)
{
    if ($n <= 1)
        return false;
    for($j = 2; $j <= sqrt($n); $j++)
        if($n % $j == 0)
            return false;
    return true;
}