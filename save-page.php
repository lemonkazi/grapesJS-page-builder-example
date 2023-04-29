<?php

// Connect to the database
$db = new PDO('mysql:host=localhost;dbname=grapesjs', 'root', '');

// Get the page title and HTML content from the POST request
$title = "llll";
$html = $_POST['html'];

// Insert the page into the database
try {
	$sql = "INSERT INTO pages (title, html) VALUES (?, ?)";
$stmt = $db->prepare($sql);
$stmt->execute([$title, $html]);

// Redirect the user to the homepage
// Return a JSON response with the success status
header('Content-Type: application/json');
echo json_encode(['status' => 'success','html'=>$html]);
} catch (\Throwable $th) {
header('Content-Type: application/json');
echo json_encode(['status' => 'failed','html'=>$th]);
	//throw $th;
}



?>
