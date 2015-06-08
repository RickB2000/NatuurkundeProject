<?php
require_once 'includes/bootstrap.inc.php';

echo Template::getHeader('Home'); 
echo Template::getNavBar('home');
?>
<div class="container">
	<?php 
	if(isset($_GET['nouserfound'])) {
		echo '<div class="alert alert-danger"><strong>Foutmelding!</strong>&nbsp;&nbsp;Er kon geen leerling worden gevonden met het opgegeven nummer.</div>';
	}
	?>
	
	<h2>
		Home
	</h2>
	<p>
		Vul in het onderstaande formulier jouw leerlingnummer in om jouw gepersonaliseerde pagina op te vragen.<br />
		De onderstaande knop zal automatisch activeren wanneer de invoer correct is.
	</p>
	<form class="form-horizontal" method="post" action="student.php">
	<!-- Text input-->
	<div class="form-group" id="llnr-form-group">
	  <label class="col-md-4 control-label" for="llnr">Leerlingnummer</label>  
	  <div class="col-md-4">
		  <input id="llnr" name="llnr" placeholder="Leerlingnummer" class="form-control input-md" required="" type="text">
		  <span class="help-block" id="student_name">&nbsp;</span>  
	  </div>
	</div>

	<!-- Button -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="submit"></label>
	  <div class="col-md-4">
		<button id="submit" name="submit" class="btn btn-primary" disabled>Opvragen</button>
	  </div>
	</div>

	</form>
	</div>
<?php echo Template::getFooter(); ?>
