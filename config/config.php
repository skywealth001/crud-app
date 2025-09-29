<?php
session_start();

$host = 'localhost';
$dbname = 'crud_app';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

function requireAuth() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../pages/login.php");
        exit();
    }
}

function redirectIfAuth() {
    if (isset($_SESSION['user_id'])) {
        header("Location: ../pages/dashboard.php");
        exit();
    }
}
?>