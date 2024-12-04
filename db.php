<?php
$host = 'localhost';
$db_name = 'gym_management';
$username = 'root'; // default username for XAMPP/WAMP
$password = ''; // default password for XAMPP/WAMP

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>