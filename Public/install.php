<?php
require "Config.php";

try {
    // Establish database connection
    $connection = new PDO("mysql:host=$host", $username, $password, $options);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Execute SQL script to initialize database schema
    $sql = file_get_contents("Data/init.sql.txt");
    $connection->exec($sql);

    // Output success message
    echo "DB setup";
} catch (PDOException $e) {
    // Handle database connection errors
    echo "Database setup failed: " . $e->getMessage();
    exit(); // Terminate script execution
}
?>