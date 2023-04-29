<?php
// Connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=grapesjs', 'root', '');

// Fetch the page data from the database using its ID
$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM pages WHERE id = ?');
$stmt->execute([$id]);
$pageData = $stmt->fetch();

// Return the page data as a JSON-encoded string
header('Content-Type: application/json');
echo json_encode($pageData);
?>