<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "school_db";

/* Connect to MySQL server */
$conn = new mysqli($host, $user, $pass);

if ($conn->connect_error) {
    die("Connection failed");
}

/* Create database if not exists */
$conn->query("CREATE DATABASE IF NOT EXISTS $db");

/* Select database */
$conn->select_db($db);

/* Create table if not exists */
$conn->query("
    CREATE TABLE IF NOT EXISTS students (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        course VARCHAR(100) NOT NULL
    )
");
?>
