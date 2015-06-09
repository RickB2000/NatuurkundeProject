<?php
/**
 * Validator
 * This script validates the input given at the index page. (Given to this script through AJAX)
 *
 * @package    NatuurkundeProject
 * @author     Rick Bakker <rickb@kker.net>
 * @copyright  2015 Rick Bakker
 */


require_once '../includes/bootstrap.inc.php';
if(isset($_GET['type']) && $_GET['type'] == 'password_check') {
	if(!isset($_GET['id']) || !is_numeric($_GET['id'])): echo 'INVALID'; exit(); endif;
	if(!isset($_GET['password'])): echo 'INVALID'; exit(); endif;
	try {
		$query = $db->prepare("SELECT password FROM student WHERE number = :id");
		$query->bindParam(':id', $_GET['id']);
		$query->execute();
		if($query->rowCount() != 1){
			echo 'INVALID';
			exit();
		} else {
			$row = $query->fetch(PDO::FETCH_ASSOC);
			if($row['password'] == Hash::make($_GET['password'])) {
				echo 'OK';
			}else{
				echo 'INVALID';
			}
			exit();
		}
	} catch(PDOException $e) {
		echo 'Connection failed: ' . $e->getMessage();
		exit();
	}
	exit();
}elseif(isset($_GET['type']) && $_GET['type'] == 'number_check') {
	if(!isset($_GET['id']) || !is_numeric($_GET['id'])): echo 'INVALID'; exit(); endif;
	try {
		$query = $db->prepare("SELECT id, number, name, auth FROM student WHERE number = :id");
		$query->bindParam(':id', $_GET['id']);
		$query->execute();
		if($query->rowCount() != 1){
			echo 'INVALID';
			exit();
		} else {
			$row = $query->fetch(PDO::FETCH_ASSOC);
			if($row['auth'] == 1) {
				echo 'AUTHENTICATION_REQUIRED';
			}else{
				echo $row['name'];
			}
			exit();
		}
	} catch(PDOException $e) {
		echo 'Connection failed: ' . $e->getMessage();
		exit();
	}
}