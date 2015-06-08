<?php
require_once 'includes/bootstrap.inc.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_GET['id'])) {
	if(isset($_GET['id'])) {
		$_POST['llnr'] = $_GET['id'];
	}
	if(is_numeric($_POST['llnr'])) {
		try {
			$query = $db->prepare("SELECT id, number, name FROM student WHERE number = :id");
			$query->bindParam(':id', $_POST['llnr']);
			$query->execute();
			if($query->rowCount() == 1){
				$studentInfo = $query->fetch(PDO::FETCH_ASSOC);
			}else{
				Header("Location: index.php?nouserfound");
				exit();
			}
		} catch(PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
			exit();
		}


	}else{
		Header("Location: index.php?nouserfound");
		exit();
	}
}else{
	Header("Location: index.php?nouserfound");
	exit();
}

echo Template::getHeader('Pagina van ' . htmlentities($studentInfo['name'])); 
echo Template::getNavBar('studentpages');
?>
<div class="container">
	<h2>
		Pagina van <?php echo $studentInfo['name']; ?>
	</h2>
	<p>
		
	</p>

</div>
<?php echo Template::getFooter(); ?>
