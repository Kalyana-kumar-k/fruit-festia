<?php
$acntName = $_SESSION['username'];
$DBserver = "localhost";
$DBuser = "root";
$DBpassword = "";
$DBname = "fruitfestia";

$conn = new PDO("mysql:host=$DBserver;dbname=$DBname", $DBuser, $DBpassword);
//PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "connected Sussessfully..";

$id = $_GET['id'] ?? '';

if ($id) {
    $stmt = $conn->prepare("DELETE FROM orders WHERE id = ?");
    $stmt->execute([$id]);
}
