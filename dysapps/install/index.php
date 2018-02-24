<?php session_start();
			if (!empty($_SERVER['HTTP_HOST']) AND !empty($_SERVER['REQUEST_URI'] AND !empty($_SERVER['REQUEST_SCHEME']))) {
                $link = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST']."".$_SERVER['REQUEST_URI'];
			} else {
                echo "Ereure lors de la localisation (les variables SERVER['REQUEST_URI'] SERVER['HTTP_HOST'] n'existe pas )";
            }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Installation</title>
	<link rel="stylesheet" type="text/css" href="<?=$link?>library/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=$link?>library/fontawesome-free-5.0.6/web-fonts-with-css/css/fontawesome-all.css">
      <script src="<?=$link?>library/js/jquery-3.2.1.slim.min.js"></script>
  <script type="text/javascript">var jQuery_3_2_1 = $.noConflict();</script>
  <script type="text/javascript" src="<?=$link?>library/js/popper.js-1.12.8/dist/dist/umd/popper.min.js"></script>
  <script src="<?=$link?>library/js/bootstrap.min.js"></script>
     <script type="text/javascript">
     	   jQuery_3_2_1(function(){   
     
		    jQuery_3_2_1('#default').change(function()
		    {
		        var id = jQuery_3_2_1(this).attr('id').substr(-1, 1);
		        var input = jQuery_3_2_1('[type="text"]');
		        var inputState = input.attr('disabled') == "disabled";
		             
		        if(inputState){
		            input.attr('disabled', false);
		        } else {
		            input.attr('disabled', true);
		        }
		    });
		});
     </script>


</head>
<body style="background: url(<?=$link?>picture/font2.jpg);background-position: center;">
<form method="POST" action="" class="form-inline" >
	<div class="container">
		<div ></div>

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
					<li class="breadcrumb-item">Les matières</li>
				</ol>
			</nav>  
			<div class="jumbotron">
				  <h1 class="display-4">Les étapes</h1>
				  <p class="lead">Les différente étapes d'installation:</p>
				  <ol>
				  	<li>Test de compatibilité</li>
				  	<li>Configuration de la basses de donné</li>
				  	<li>Configuration des comptes utillisateurs</li>
				  	<li>Les matières</li>
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
						<li class="breadcrumb-item">Les matières</li>
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
		include 'traitement-db.php';
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
								<li class="breadcrumb-item">Les matières</li>
							</ol>
						</nav>
						
							<div class="jumbotron">
							  <h1 class="display-4">Configuration de la basse de donné</h1>
							  <p class="lead">Maintenant nous allons nous connecter a notre basse de donné. Attention, nous créerons automatiquement la basse de donnée.</p>
							  <hr class="my-4">
							  <p>veuillez remplire les champs suivants.</p>
							  	<?php if (!empty($ErreurDB)) {
							  		echo '<div class="alert alert-danger col-7"><i class="fas fa-exclamation-triangle"></i>'.$ErreurDB.'</div>';
							  	}?>
							  <div class="lead col-4">
						  	      <div class="custom-control custom-checkbox mr-sm-2">
							        <input type="checkbox" class="custom-control-input" id="default" name="default">
							        <label class="custom-control-label" for="default">Par défaut</label>
							      </div>

							  	<div class="form-group">
							  		<label for="DBadresse">Address du server Mysql</label>
							    	<input type="text" class="form-control" id="DBadresse" name="DBadresse" placeholder="Par défaut localhost">
							    </div>
							    <div class="form-group">
							    	<label for="DBuser">Nom d'utilisateur mysql</label>
							    	<input type="text" class="form-control" id="DBuser" name="DBuser" placeholder="Par défaut root">
							    </div>
							    <div class="form-group">
							    	<label for="DBmdp">Mot de passe de mysql</label>	
							    	<input type="password" class="form-control" id="DBmdp" name="DBmdp" placeholder="Par défaut rien">
							    </div>
							    <div class="form-group">
							    	<label for="DBname">Nom de la basse de donnée</label>	
							    	<input type="text" class="form-control" id="DBname" name="DBname" placeholder="Par défaut dysapps">
							    </div>
							    <div class="form-group">
							    	<label for="DBprefix">Préfix avant la table </label>
							    	<input type="text" class="form-control" id="DBprefix" name="DBprefix" placeholder="Par défaut DY_">
							    </div>
							    <div class="form-group">
							    	<input type="submit" class="btn btn-primary" name="validDB" value="se connecter">
							    </div>
							  </div>
							</div>
						
						<?php

					}	
				} else {
					header('location:?ins=2');
				}
			break;
		case '4':
		include 'ajout-user.php';
			?>
				<nav aria-label="navcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">Test de compatibilité</li>
						<li class="breadcrumb-item">Configuration de la basse de donné</li>
						<li class="breadcrumb-item active">Configuration des comptes utillisateurs</li>
						<li class="breadcrumb-item">Les matières</li>
					</ol>
				</nav>
				<div class="jumbotron">
				  <h1 class="display-4">Configuration des comptes utillisateurs</h1>
				  <p class="lead">Saisiser vos informations utilisateur admin</p>
				  <hr class="my-4">
				  <p>Pour test cliquer sur le bouton ci-dessous</p>
							  	<?php if (!empty($errinscrip)) {
							  		echo '<div class="alert alert-danger col-7"><i class="fas fa-exclamation-triangle"></i> '.$errinscrip.'</div>';
							  	}?>
				  <div class="lead col-4">
				  	<div class="form-group">
				  		<label for="pseudo">Mot de passe :</label>
					    <input type="text" placeholder="Votre pseudo" class="form-control" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>">	
					</div>
					<div class="form-group">   
						<label for="mdp">Mot de passe :</label>
						<input type="password" class="form-control" placeholder="Votre Mot de passe" id="mdp" name="mdp">
					</div>
					<div class="form-group">
						<label for="mdp2">Confirmation du mot de passe :</label>
						<input type="password" class="form-control" placeholder="confirmez votre mdp" id="mdp2" name="mdp2">	
					</div>
						<input type="submit" class="btn btn-primary" name="createcompte" value="Je m'inscris">
				  </div>
				</div>
				<?php
			//compte utilisateur admin et utilisateur 
			break;
		case '5':
		include 'ajout-matiere.php';
			if (!empty($_GET['mat'])) {
				?>
				  <script>
				    jQuery_3_2_1( function( document ) {
				      jQuery_3_2_1( '#ajout' ).modal('show');       
				    });
				  </script>
				  <div class="modal fade" id="ajout" tabindex="-1" role="dialog" aria-labelledby="devoir" aria-hidden="true">
				  	<div class="modal-dialog" role="document">
				  		<div class="modal-content">
				  			<div class="modal-header">
				  				<h5 class="modal-title" id="ajoutlabel">Ajout d'une matière</h5>
						          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						            <span aria-hidden="true">&times;</span>
						          </button>
				  			</div>
				  			<div class="modal-body">
				  				<?php if (!empty($erreurmat)) {
							  		echo '<div class="alert alert-danger col-7"><i class="fas fa-exclamation-triangle"></i> '.$erreurmat.'</div>';
							  	}?>
				  				<input type="text" name="matiere" placeholder="matière" class="form-control">
				  			</div>
				  			<div class="modal-footer">
				  				<button type="button" class="btn btn-secondary" data-dismiss='modal'>Annuler</button>
				  				<button type="submit" class="btn btn-primary" name="ajout-matieres">Valider</button>
				  			</div>
				  		</div>
				  	</div>
				 </div>
				<?php  
				}
				?> 

				<nav aria-label="navcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">Test de compatibilité</li>
						<li class="breadcrumb-item">Configuration de la basse de donné</li>
						<li class="breadcrumb-item">Configuration des comptes utillisateurs</li>
						<li class="breadcrumb-item active">Les matières</li>
					</ol>
				</nav>
				<div class="jumbotron">
				  <h1 class="display-4">Les matières</h1>
				  <p class="lead">Pour terminer nous allons vous demander Vos matière elle seront utilisé lors de l'ajout dans l'agenda. Vous pourrez les modifier a tout moment dans vos paramètre utilisateur</p>
				  <hr class="my-4">
				  <p>Veuillez ajoutez vos matière</p>
				  <p class="lead">
					<table class="table  table-sm">
					    <thead class="table-info">
					        <tr>
					        	<th>supr</th>
					            <th>Matiere</th>
					        </tr>
					    </thead>
					        <tbody>
					            

					<?php       
								$iduser = $_SESSION['id'];
					            $reponse1 = $bdd->query("SELECT * FROM ".DB_prefix."matiere WHERE iduser = $iduser");
					            // On affiche chaque entrée une à une
					            while ($donnees1 = $reponse1->fetch())
					            {
					              ?><tr>
					              		<td><a class="btn btn-danger" href="?ins=5&mat=1&suprmat=<?= $donnees1['id'] ?>" >suppr</a></td>
					                	<td><?= $donnees1['matiere'] ?></td> 
					                </tr><?php
					            }
					            $reponse1->closeCursor(); // Termine le traitement de la requête
					            ?>
					       
					    </tbody>
					</table>

				    <a class="btn btn-primary btn-lg fas fa-plus" href="?ins=5&mat=1" role="button"></a>
				    <a class="btn btn-secondary btn-lg" href="?ins=6" role="button">Continuer</a>
				  </p>
				</div>
				<?php

			break;
		case '6':
			?>
			<div class="jumbotron">
				<h1 class="display-4">Bravo vous avez terminer l'instalation de Dysapps</h1>
				<p class="lead">Cliquer tout de suite sur le lien qui vous emeneras pour vous connectez a votre interface.</p>
				<hr class="my-4">
				<p class="lead">
					<a class="btn btn-primary btn-lg" href="../index.php" role="button">Se connecter</a>
				</p>
			</div>
			<?php
			break;
		default:
			header('Location: ?ins=1');
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



<?php

?>
	</div>
</form>
</body>
</html>
