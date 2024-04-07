<?php
define( 'DOMAIN', 'http://localhost/firefly/');

$host_name = "localhost";
$username = "root";
$password = "";
$db_name = "restaurant_table_reservation";

try {
    $conn = new PDO("mysql:host=$host_name; dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "connection failed : ". $e->getMessage();

}