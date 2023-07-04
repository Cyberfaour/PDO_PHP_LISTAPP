<?php

// Database connection
require 'config.php';
$host = $config['database']['host'];
$dbname = $config['database']['name'];
$user = $config['database']['user'];
$pass = $config['database']['pass'];
$dsn="mysql:host=$host;dbname=$dbname;charset=utf8mb4";
try {
    $pdo = new PDO($dsn, $user, $pass);
    echo "Database connection successful!";
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
// Return the database connection settings
return [
    'pdo' => $pdo,
    'dsn' => $dsn,
    'username' => $user,
    'password' => $pass
];
?>