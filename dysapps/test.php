<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/x-icon" href="icon" />
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="library/bootstrap-4.0.0-beta/scss/css/bootstrap.min.css">
	<link rel="stylesheet" href="library\fontawesome-free-5.0.6\web-fonts-with-css\css\fontawesome-all.css">
	<style type="text/css">
		body {
			background: url(picture/font2.jpg);
			background-position: center;
		}
	</style>


	<title>Auto-test</title>
</head>
<body>
	<div class="container">
		<h2>Vérification de connexion </h2>
		<br>
		<div class="row">
			<?php

			define('OK', '<span class="badge badge-success"> Succès !</span><br />');
			define('non', '<span class="badge badge-danger"> Erreur !</span><br />');
			try
			{
				include 'sql.php';
			}
			catch (Exception $e)
			{
	  				echo '<div class="alert alert-danger">';
					echo 'Connection base de donner : ' . non ;
					echo "Erreur :".utf8_encode($e->getMessage());
					echo "</div>";
      ?>
    		<div class="col-sm"></div>
    	</div>
    </div>
</body>
</html>
    			<?php
    			die();

			}
				?><div class="alert alert-success col-sm"><?php

					echo 'Connection base de donner : ' . OK ;
				?>
					<meta http-equiv="refresh" content="1 ; url=connection">
				</div>
					<div class="fa-3x">
					  <i class="fas fa-sync fa-spin"></i>
					</div>
				
				<div class="col-sm"></div>
			</div>
			<div class="row">
				<div class="col-">
					<?php
						echo '<p class="text-info">Redirection en cours veuillez patienter...</p>';
					?>
				
				</div>
			</div>
	</div>
</body>
</html>
