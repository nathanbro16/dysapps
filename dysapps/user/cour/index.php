<?php
?>
<!DOCTYPE html>
<html>
<head>
	<title>sélectioner votre matière</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

</head>
<body>
	<div class="container">
		<a href="redac.php">rédaction</a>
		<div class="row">
			<?php
			 $SELECT = $bdd->query("SELECT `matiere` FROM `cahier`");
			 while ($donné = $SELECT->fetch()) {
			 	?>
			 	<div class="col">
			 		<h1><?= $donné['matiere'] ?></h1>		 		
			 	</div>
			 	<?php
			 }
			 $SELECT->closeCursor();
			?>
			
		</div>
	
	</div>
</body>
</html>