<?php
require_once '../includes/bootstrap.inc.php';
if(!isset($_GET['id']) || !is_numeric($_GET['id'])): echo 'INVALID'; exit(); endif;
try {
	$query = $db->prepare("SELECT id, number, name FROM student WHERE number = :id");
	$query->bindParam(':id', $_GET['id']);
	$query->execute();
	if($query->rowCount() != 1){
		echo 'INVALID';
		exit();
	} else {
		$row = $query->fetch(PDO::FETCH_ASSOC);
		echo $row['name'];
		exit();
	}
} catch(PDOException $e) {
	echo 'Connection failed: ' . $e->getMessage();
	exit();
}

