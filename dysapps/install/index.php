<?php session_start(); 
if (isset($_POST['validDB'])) {
	if (!empty($_POST['DBadresse'])) {
		if (!empty($_POST['DBuser'])) {
			if (condition) {
				# code...
			}
		}else{

		}
	} else {
		if (!empty($_POST['DBuser'])) {
			
		}else{
			
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Installation</title>
	<link rel="stylesheet" type="text/css" href="..\library\bootstrap-4.0.0-beta\scss\css\bootstrap.min.css">
    <link rel="stylesheet" href="..\library\font-awesome-4.7.0\css\font-awesome.min.css">
</head>
<body style="background: url(../images/font2.jpg);background-position: center;">
	<div class="container">

<?php

if (!empty($_GET)) {
	switch ($_GET['ins']) {
		case '1':
			//bienvenue
			?>
			<nav aria-label="navcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">Test de compatibilité</li>
					<li class="breadcrumb-item">Configuration de la basse de donné</li>
					<li class="breadcrumb-item">Configuration des comptes utillisateurs</li>
				</ol>
			</nav>  
			<div class="jumbotron">
				  <h1 class="display-4">Les étapes</h1>
				  <p class="lead">Les différente étapes d'installation:</p>
				  <ol>
				  	<li>Test de compatibilité</li>
				  	<li>Configuration de la basses de donné</li>
				  	<li>Configuration des comptes utillisateurs</li>
				  </ol>
				  <hr class="my-4">
				  <p>Pour test cliquer sur le bouton ci-dessous</p>
				  <p class="lead">
				    <a class="btn btn-primary btn-lg" href="?ins=2" role="button">Commencé</a>
				  </p>
				</div>
				<?php
			break;
		case '2':
			//test de compatibilité
				?>
			<nav aria-label="navcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active">Test de compatibilité</li>
					<li class="breadcrumb-item">Configuration de la basse de donné</li>
					<li class="breadcrumb-item">Configuration des comptes utillisateurs</li>
				</ol>
			</nav>
				<div class="jumbotron">
				  <h1 class="display-4">Test de compatibilité</h1>
				  <p class="lead">Maintenant nous allons tester que url Rewrite fonctione bien, le fichier testera et vous feras rediriger, si cette derniernier ne marche pas veillez l'activer ou recherer comment activer l'url-Rewrite sur votre server wamp</p>
				  <hr class="my-4">
				  <p>Pour test cliquer sur le bouton ci-dessous</p>
				  <p class="lead">
				    <a class="btn btn-primary btn-lg" href="url-Rewrite" role="button" target="_blank">Test l'url Rewrite</a>
				  </p>
				</div>
				<?php
			break;
		case '3':
			//Installation SQL et utilisateur
				if (!empty($_SESSION['veriferewite'])) {
					$veriferewite = $_SESSION['veriferewite'];
					$code = sha1('PB2Vyq7qK439tmh2E') ; 
					if ($veriferewite == $code ) {
						?>
			<nav aria-label="navcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">Test de compatibilité</li>
					<li class="breadcrumb-item active">Configuration de la basse de donné</li>
					<li class="breadcrumb-item">Configuration des comptes utillisateurs</li>
				</ol>
			</nav>
						<form method="POST" action="" >
						<div class="jumbotron">
						  <h1 class="display-4">Configuration de la basse de donné</h1>
						  <p class="lead">Maintenant nous allons nous connecter a notre basse de donné. Attention, nous créerons automatiquement la basse de donnée.</p>
						  <hr class="my-4">
						  <p>veuillez remplire les champs suivants.</p>
						  <div class="lead col-4">
						  	<div class="form-group">
						  		<label for="DBadresse">Adresse du server mysql</label>
						    	<input type="text" class="form-control" id="DBadresse" name="DBadresse" placeholder="Par défaut localhost">
						    </div>
						    <div class="form-group">
						    	<label for="DBuser">Nom d'utilisateur mysql</label>
						    	<input type="text" class="form-control" id="DBuser" name="DBuser" placeholder="Par défaut root">
						    </div>
						    <div class="form-group">
						    	<label for="DBmdp">Mot de passe de mysql</label>	
						    	<input type="mdp" class="form-control" id="DBmdp" name="DBmdp" placeholder="Par défaut rien">
						    </div>
						    <div class="form-group">
						    	<label for="DBname">Nom de la basse de donnée</label>	
						    	<input type="text" class="form-control" id="DBname" name="DBname" placeholder="Par défaut dysapps">
						    </div>
						    <div class="form-group">
						    	<label for="DBprefix"></label>
						    	<input type="text" class="form-control" id="DBprefix" name="DBprefix" placeholder="Par défaut DY_">
						    </div>
						    <div class="form-group">
						    	<input type="submit" class="btn btn-primary" name="validDB" value="se connecter">
						    </div>
						  </div>
						</div>
						</form>
						<?php

					}	
				} else {
					header('location:?ins=2');
				}

			break;
	}
} else {
		?>
		<div class="jumbotron">
		  <h1 class="display-4">Bonjour!</h1>
		  <p class="lead">Bienvenue dans l'installation de dysapps si vous voyez les balises PHP du style <code>&lt;?php</code> en début et <code>?&gt;</code> en fin ou que vous voyez Test de compatibilité, veuillez bien suivre le tuto.</p>
		  <hr class="my-4">
		  <p>Pour commencer cliquer sur le bouton ci-dessous</p>
		  <p class="lead">
		    <a class="btn btn-primary btn-lg" href="?ins=1" role="button">Installer !</a>
		  </p>
		</div>
		<?php
		}
		?>

	</div>
</body>
</html>