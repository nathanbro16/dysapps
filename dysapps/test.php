<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="library/bootstrap-4.0.0-beta/scss/css/bootstrap.min.css">
	<link rel="stylesheet" href="library\font-awesome-4.7.0\css\font-awesome.min.css">

	<title>Vérification des fichiers</title>
</head>
<body>
	<div class="container">
		<h2>Vérification de connection </h2>
		<br>
			<div class="row">
			<?php

			define('OK', '<span class="badge badge-success"> succès !</span><br />');
			define('non', '<span class="badge badge-danger"> Erreur !</span><br />');
			try
			{
				include 'sql.php';
			}
			catch (Exception $e)
			{
				?><div class="alert alert-danger col-sm"><?php

					echo 'Connection basse de donner : ' . non ;
    				die('Erreur : ' . utf8_encode($e->getMessage()));
    			
    			?></div>
    			<div class="col-sm"></div>
    			<?php

			}
				?><div class="alert alert-success col-sm"><?php

					echo 'Connection basse de donner : ' . OK ;
					header('refresh:1;URL=connection');
				?></div>
				<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
					<h4><span class="sr-only">Loading...</span></h4>
				
				<div class="col-sm"></div>
			</div> 

			<div class="row">
				<div class="col-sm">
					<?php
						echo '<p class="text-info">Redirections en cours veuillez patientez...</p>';
					?>
				</div>
			
		</div>
		
	</div>


</body>
</html>
