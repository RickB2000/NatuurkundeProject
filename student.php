<?php
/**
 * This page is th student's page itself.
 *
 * @package    NatuurkundeProject
 * @author     Rick Bakker <rickb@kker.net>
 * @copyright  2015 Rick Bakker
 */

require_once 'includes/bootstrap.inc.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_GET['id'])) {
	if(isset($_GET['id'])) {
		$_POST['llnr'] = $_GET['id'];
	}
	if(is_numeric($_POST['llnr'])) {
		try {
			$query = $db->prepare("SELECT id, number, name, hidden, auth, password FROM student WHERE number = :id");
			$query->bindParam(':id', $_POST['llnr']);
			$query->execute();
			if($query->rowCount() == 1){
				$studentInfo = $query->fetch(PDO::FETCH_ASSOC);
				if($studentInfo['auth'] == 1) {
					if(isset($_GET['id'])) {
						Header("Location: index.php?login&username=" . urlencode($_GET['id']));
						exit();
					}
				}
				if(($studentInfo['auth'] == 1 && $studentInfo['password'] != Hash::make($_POST['password']))) {
					Header("Location: index.php?nouserfound");
					exit();
				}
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

echo Template::getHeader(htmlentities($studentInfo['name'])); 
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
