<?php
require_once 'includes/bootstrap.inc.php';
try {
	$query = $db->prepare("SELECT id, number, name FROM student WHERE hidden = 0 ORDER by number ASC");
	$query->execute();
	$pages = $query->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
	echo 'Connection failed: ' . $e->getMessage();
	exit();
}

echo Template::getHeader('Leerlingpagina\'s'); 
echo Template::getNavBar('studentpages');
?>
<div class="container">
	<h2>
		Alle leerlingpagina's
	</h2>
	<p>
		Hieronder is een lijst van pagina's van leerlingen te vinden:<br />
		<small><em>Let op, pagina's van leerlingen die afgeschermd wensen te blijven, worden niet weergegeven.</em></small>
	</p>
	
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Naam</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($pages as $page): ?>
			<tr>
				<td><?php echo $page['number']; ?></td>
				<td><?php echo $page['name']; ?></td>
				<td><a href="student.php?id=<?php echo $page['number']; ?>" class="btn btn-default">Pagina bekijken <span class="glyphicon glyphicon-chevron-right"></span></a></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<?php echo Template::getFooter(); ?>