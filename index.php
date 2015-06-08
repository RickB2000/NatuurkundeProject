<?php
require_once 'includes/bootstrap.inc.php';

echo Template::getHeader('Home'); 
echo Template::getNavBar('home');
?>
<div class="container">
	<h2>
		Home
	</h2>
	<p>
		Vul hieronder je leerlingnummer in om jouw gepersonaliseerde pagina op te vragen.
	</p>
	<form class="form-horizontal">
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="llnr">Leerlingnummer</label>  
	  <div class="col-md-4">
	  <input id="llnr" name="llnr" placeholder="Leerlingnummer" class="form-control input-md" required="" type="text">

	  </div>
	</div>

	<!-- Button -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="submit"></label>
	  <div class="col-md-4">
		<button id="submit" name="submit" class="btn btn-primary">Verzenden</button>
	  </div>
	</div>

	</form>
	</div>
<?php echo Template::getFooter(); ?>
