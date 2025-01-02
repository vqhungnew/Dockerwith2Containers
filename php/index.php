<?php

echo "Hello NEW BEGINNERS for DOCKER COMPOSE <br>";

echo "This is the Webpage demo for 2 containers, 1 for Web and 1 for DB <br>";
$servername = getenv('DB_HOST');
$username = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$database = getenv('DB_NAME');


// Create a connection
$conn = new mysqli($servername, $username, $password, $database);
// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected DB successfully!";


$sqlCreateTable="CREATE TABLE IF NOT EXISTS Persons (PersonID int, LastName varchar(255), FirstName varchar(255), Address varchar(255), City varchar(255))";
$result = $conn->query($sqlCreateTable) or die($conn->error);
echo "CREATE table Persons successfully!<br>";

$sql_add_new= "INSERT INTO Persons (PersonID, LastName, FirstName, Address, City) VALUES ('1','Cloud','Computing','1 CONG HOA','TAN BINH')";
$result = $conn->query($sql_add_new) or die($conn->error);
echo "INSERT sample data to table Persons successfully!<br>";


$sqlSample="SELECT * from Persons";
$result = $conn->query($sqlSample) or die($conn->error);
echo "SELECT sample data from table Persons successfully!<br>";

while ($row = $result->fetch_assoc()) {
    echo $row['PersonID']."-".$row['LastName']."-".$row['FirstName']."-".$row['Address']."-".$row['City']."<br>";
}
?>
