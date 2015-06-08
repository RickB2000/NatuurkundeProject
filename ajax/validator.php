<?php
require_once '../includes/bootstrap.inc.php';
if(!isset($_GET['id']) || !is_numeric($_GET['id'])): echo 'No (valid) parameter given!'; exit(); endif;
try {
	$query = $db->prepare("SELECT id, number, name FROM student WHERE number = :id");
	$query->bindParam(':id', $_GET['id']);
	$query->execute();
	echo $query->rowCount();
} catch(PDOException $e) {
	
}

