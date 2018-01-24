<?php
$iduser = $_SESSION['id'];

if (isset($_POST['valid1'])) {
	if (!empty($_POST['typeid'])) {
		$typeid = $_POST['typeid'];
		if ($typeid == '1') {
			echo "1";
			echo "<script type='text/javascript'>document.location.replace('agendat-$iduser=ajout-2');</script>";
			$_SESSION['ajout-typeid'] = '1';
			exit();
		} elseif ($typeid == '2') {
			echo "2";
			echo "<script type='text/javascript'>document.location.replace('agendat-$iduser=ajout-2');</script>";
			$_SESSION['ajout-typeid'] = '2';
			//exit();
		} elseif ($typeid == '3') {
			echo "3";
			$_SESSION['ajout-typeid'] = '3';
			echo "<script type='text/javascript'>document.location.replace('agendat-$iduser=ajout-2');</script>";
			exit();
		} else { echo " ceci n'est pas une option valide";}
	} else {

		$ereur = '1';
	}

} elseif (isset($_POST['valid2'])) {

	if (!empty($_POST['Objet'])) {
		$Objet = htmlspecialchars($_POST['Objet']);
		$_SESSION['ajout-object'] = $Objet;
		echo "<script type='text/javascript'>document.location.replace('agendat-$iduser=ajout-3');</script>";

	} elseif ($_POST['choixmatiere'] != 'defaut') {
		$Objet = htmlspecialchars($_POST['choixmatiere']);
		$_SESSION['ajout-object'] = $Objet;
		echo "<script type='text/javascript'>document.location.replace('agendat-$iduser=ajout-3');</script>";

	} else {



		$ereur = '1';

	}

} elseif (isset($_POST['valid3'])) {
	if (!empty($_POST['datepicker'])) {
		if (preg_match("#([0-9]+)-([0-1][0-9])-([0-3][0-9])#", $_POST['datepicker'])) {
			$_SESSION['ajout-datepicker'] = $_POST['datepicker'];
			echo "<script type='text/javascript'>document.location.replace('agendat-$iduser=ajout-4');</script>";
		} else {
			$ereur = '2';
			echo "ereur sur le format de la date (aaaa-mm-jj)";
		}
	} else {
		$ereur = '1';
	}

} elseif (isset($_POST['valid4'])) {
	if (!empty($_POST['tache'])) {
		
		$typeid = $_SESSION['ajout-typeid'];
		$iduser = $_SESSION['id'];
		$tache = $_POST['tache'];
		$jour = $_SESSION['ajout-datepicker'];
		$matiere = $_SESSION['ajout-object'];
		$pseudo = $_SESSION['pseudo'];
		session_destroy();
		session_start();
		$_SESSION['id'] = $iduser;
		$_SESSION['pseudo'] = $pseudo; 

		$insert=$bdd->prepare("INSERT INTO agendat(matiere, jour, tache, iduser, typeid) VALUES(?, ?, ?, ?, ?) ");
		$insert->execute(array($matiere,$jour,$tache,$iduser,$typeid));
		echo "<script type='text/javascript'>document.location.replace('agendat-$iduser');</script>";
	} else {
		$ereur = '1';
	}

} elseif (isset($_POST['annule'])) {
	if (!empty($_SESSION['ajout-datepicker'])) {
		$iduser = $_SESSION['id'];
		$pseudo = $_SESSION['pseudo'];
		session_destroy();
		session_start();
		$_SESSION['id'] = $iduser;
		$_SESSION['pseudo'] = $pseudo;
		echo "<script type='text/javascript'>document.location.replace('agendat-$iduser');</script>";

	} elseif (!empty($_SESSION['ajout-object'])) {
		$iduser = $_SESSION['id'];
		$pseudo = $_SESSION['pseudo'];
		session_destroy();
		session_start();
		$_SESSION['id'] = $iduser;
		$_SESSION['pseudo'] = $pseudo;
		echo "<script type='text/javascript'>document.location.replace('agendat-$iduser');</script>";

	} elseif (!empty($_SESSION['ajout-typeid'])) {
		$iduser = $_SESSION['id'];
		$pseudo = $_SESSION['pseudo'];
		session_destroy();
		session_start();
		$_SESSION['id'] = $iduser;
		$_SESSION['pseudo'] = $pseudo;
		echo "<script type='text/javascript'>document.location.replace('agendat-$iduser');</script>";

	} else {

		echo "<script type='text/javascript'>document.location.replace('agendat-$iduser');</script>";

	}

}

?>
<form method="POST" action="">
	<?php
	switch ($ajout) {

		case '0':
				if (!empty($_SESSION['ajout-datepicker'])) {
					echo "<script type='text/javascript'>document.location.replace('agendat-$iduser=ajout-4');</script>";
				} elseif (!empty($_SESSION['ajout-object'])) {
					echo "<script type='text/javascript'>document.location.replace('agendat-$iduser=ajout-3');</script>";
				} elseif (!empty($_SESSION['ajout-typeid'])) {
					echo "<script type='text/javascript'>document.location.replace('agendat-$iduser=ajout-2');</script>";
				} else {
					echo "<script type='text/javascript'>document.location.replace('agendat-$iduser=ajout-1');</script>";
				}
			break;
		case '1':
				?>
					<div id="ajout" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="devoir" aria-hidden="true">
					    <div class="modal-dialog modal-lg" role="document">
					      <div class="modal-content">

					        <div class="modal-header">
					          <h5 class="modal-title"></h5>
					          <h5 class="modal-title text-success" id="devoir">Ajouter <i class="fa fa-plus" id="fa-plus"></i></h5>
					          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					            <span aria-hidden="true">&times;</span>
					          </button>
					        </div>
					        
					        <div class="modal-body">      
					   			<div>
							        <div class="progress" style="height: 5px;">
							  				<?php
							  			if (!empty($ereur) and $ereur == '1') {
											echo '<div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>';
										} else {
											echo '<div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>';
										}
											?>
										
									</div>
									<nav aria-label="breadcrumb" role="navigation">
									  <ol class="breadcrumb">
									    <li class="breadcrumb-item active <?php
							  				if (!empty($ereur) and $ereur == '1' ) {
							  					echo 'text-danger'; 
							  				}
							  			?>">Type</li>
									    <li class="breadcrumb-item">Objet</li>
									    <li class="breadcrumb-item">Date</li>
									    <li class="breadcrumb-item ">Note</li>
									  </ol>
									</nav>
								</div>
								<div>
										<h5 <?php
							  				if (!empty($ereur) and $ereur == '1') {
							  					echo 'class="text-danger"'; 
							  				}
							  			?>>Que voulez-vous ajouter ?</h5>
										<div class="custom-controls-stacked">
										  <label class="custom-control custom-radio">
										    <input id="radioStacked1" value="2" name="typeid" type="radio" class="custom-control-input">
										    <span class="custom-control-indicator"></span>
										    <span class="custom-control-description">Devoir</span>
										  </label>
										  <label class="custom-control custom-radio">
										    <input id="radioStacked2" name="typeid" value="1" type="radio" class="custom-control-input">
										    <span class="custom-control-indicator"></span>
										    <span class="custom-control-description">Evaluation</span>
										  </label>
										  <label class="custom-control custom-radio">
										    <input id="radioStacked3" name="typeid" value="3" type="radio" class="custom-control-input">
										    <span class="custom-control-indicator"></span>
										    <span class="custom-control-description">Note</span>
										  </label>
										</div>
										<?php
											if (!empty($ereur) and $ereur == '1') {
												echo '<div class="alert alert-danger" role="alert">Aucun champs na été sélctioner</div>';
											}
										?>
								</div>
							</div>
					        <div class="modal-footer">
					        	<input type="submit" name="valid1" value="Valider" class="btn">
					        	<input type="submit" name="annule" value="annule" class="btn btn-outline-danger">
					        	<button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
					        </div>
					      </div>
					    </div>
					 </div>
				<?php
			break;
		case '2':
				if (!empty($_SESSION['ajout-typeid'])) {
					?>
					<div id="ajout" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="devoir" aria-hidden="true">
					    <div class="modal-dialog modal-lg" role="document">
					     	<div class="modal-content">
								<div class="modal-header">
					          		<h5 class="modal-title"></h5>
					          		<h5 class="modal-title text-success" id="devoir">Ajouter <i class="fa fa-plus" id="fa-plus"></i></h5>
					          		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					            		<span aria-hidden="true">&times;</span>
					          		</button>
					        	</div>
						        <div class="modal-body">      
							    	<div>
										<div class="progress" style="height: 5px;">
										 	<div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
										 	<?php
											if (!empty($ereur) ) {
													echo '<div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>';
											} else {
												echo '<div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>';
											}
											?>
										</div>
										<nav aria-label="breadcrumb" role="navigation">
											<ol class="breadcrumb">
											    <li class="breadcrumb-item ">Type</li>
											    <li class="breadcrumb-item active <?php
							  				if (!empty($ereur) AND $ereur == '1' ) {
							  					echo 'text-danger'; 
							  				}
							  			?>">Objet</li>
											    <li class="breadcrumb-item">Date</li>
											    <li class="breadcrumb-item ">Note</li>
											</ol>
										</nav>
									</div>
									<h5 <?php
							  		if (!empty($ereur)) {
							  		echo 'class="text-danger"'; 
							  		}
							  		?> >De quoi s'agit t'il ?</h5>
									<div class="form-row justify-content-center">
										<select name="choixmatiere" class="custom-select d-block col-5" >
											<option value="defaut" id="defaut">matière</option>
											<?php
											$reponse = $bdd->query('SELECT * FROM matiere ORDER BY matiere');
											// On affiche chaque entrée une à une
											while ($donnees = $reponse->fetch())
											{
											?>
											<option value=<?= $donnees['matiere'] ?>><?= $donnees['matiere'] ?></option>
											<?php
											}
											$reponse->closeCursor();
											?>
										</select>
										<h3 class="col-auto">ou</h3>
										<input type="text" name="Objet" class="form-control col-5" placeholder="Objet">
									</div><br>
									<?php
									if (!empty($ereur) and $ereur == '1') {
										echo '<div class="alert alert-danger" role="alert">Aucun champs na été remplit</div>';
									}
									?>
									
								</div>
								<div class="modal-footer">
									<input type="submit" name="valid2" value="ok" class="btn">
						   	       	<input type="submit" name="annule" value="annule" class="btn btn-outline-danger">
						        	<button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
						        </div>
							</div>
					    </div>
					</div>
				<?php
				} else {
					echo "<script type='text/javascript'>document.location.replace('agendat-$iduser=ajout-1');</script>";
				}
			break;
		case '3':
				if (!empty($_SESSION['ajout-object'])) {
					?>
				<div id="ajout" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="devoir" aria-hidden="true">
				    <div class="modal-dialog modal-lg" role="document">
					    <div class="modal-content">

				    	    <div class="modal-header">
				        		<h5 class="modal-title"></h5>
				        		<h5 class="modal-title text-success" id="devoir">Ajouter <i class="fa fa-plus" id="fa-plus"></i></h5>
				          		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				            		<span aria-hidden="true">&times;</span>
				          		</button>
				        	</div>
				        	<div class="modal-body"> 
					  			<div>
									<div class="progress" style="height: 5px;">
										<div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
										<?php
										if (!empty($ereur) ) {
											echo '<div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>';
										} else {
											echo '<div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>';
										}?>
										</div>
										<nav aria-label="breadcrumb" role="navigation">
											<ol class="breadcrumb">
												<li class="breadcrumb-item ">Type</li>
											  	<li class="breadcrumb-item ">Objet</li>
											    <li class="breadcrumb-item active <?php
							  					if (!empty($ereur)) {
							  					echo 'text-danger'; 
							  					}
							  					?>">Date</li>
											    <li class="breadcrumb-item ">Note</li>
										  	</ol>
										</nav>
								</div>
								<h5 <?php
							  	if (!empty($ereur)) {
							  	echo 'class="text-danger"'; 
							  	}
							  	?> >Quant ? / Date max ?</h5>
								<footer class="blockquote-footer">Attention il ne seront supprimer que par vous.</footer>
								<div>
									<div class="input-group">
										<input id="datepicker1" class="input-group-addon" name="datepicker">
										<label class="input-group-addon" for="datepicker1"><i class="fa fa-calendar"></i></label>
									</div>
								</div><br>
								<?php
								if (!empty($ereur) and $ereur == '1') {
									echo '<div class="alert alert-danger" role="alert">Le champs na pas été remplis</div>';
								} elseif (!empty($ereur) and $ereur == '2') {
									echo '<div class="alert alert-danger" role="alert">Ereur sur le format de la date (aaaa-mm-jj)</div>';
								}
								?>
							</div>
						    <div class="modal-footer">
						   		<input type="submit" name="valid3" value="ok" class="btn">
				        		<input type="submit" name="annule" value="annule" class="btn btn-outline-danger">
				        		<button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
				        	</div>
				    	</div>
				    </div>
				</div>
				

					<?php
				} else {
					echo "<script type='text/javascript'>document.location.replace('agendat-$iduser=ajout-2');</script>";
				}
			break;
		case '4':
					if (!empty($_SESSION['ajout-datepicker'])) {
						?>
						<div id="ajout" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="devoir" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
						    	<div class="modal-content">
						        	<div class="modal-header">
							          <h5 class="modal-title"></h5>
							          <h5 class="modal-title text-success" id="devoir">Ajouter <i class="fa fa-plus" id="fa-plus"></i></h5>
							          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							            <span aria-hidden="true">&times;</span>
							          </button>
						        	</div>
						        	<div class="modal-body">      
										<div>
									  		<div class="progress" style="height: 5px;">
												<div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
												<?php
												if (!empty($ereur) ) {
													echo '<div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>';
												} else {
													echo '<div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>';
												}?>
											</div>
											<nav aria-label="breadcrumb" role="navigation">
												<ol class="breadcrumb">
												    <li class="breadcrumb-item ">Type</li>
											    	<li class="breadcrumb-item ">Objet</li>
												    <li class="breadcrumb-item ">Date</li>
												    <li class="breadcrumb-item active <?php
									  				if (!empty($ereur) and $ereur == '1' ) {
								  						echo 'text-danger'; 
								  					}
										  			?>">Note</li>
												</ol>
											</nav>
										</div>
										<h5>Détails ?</h5>
										<div>
											<textarea name="tache" id="summernote" class="form-control" placeholder="entrer note" ></textarea> <br>
											<script>
												jQuery_3_2_1( function( document ) {

										        jQuery_3_2_1('#summernote').summernote({
											        placeholder: 'entrer du texte',
											        tabsize: 2,
											        height: 100
											      });
										              
										      });
												$(document).ready(function() {

												});
											</script>

											<?php
											if (!empty($ereur) and $ereur == '1') {
												echo '<div class="alert alert-danger" role="alert">le champs na pas été remplis</div>';
											}
											?>
										</div>
									</div>
									<div class="modal-footer">
										<input type="submit" name="valid4" value="ok" class="btn">
							   			<input type="submit" name="annule" value="annule" class="btn btn-outline-danger">
							      		<button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
							  		</div>
						    	</div>
							</div>
						</div>
					  <?php

					} else {echo "<script type='text/javascript'>document.location.replace('agendat-$iduser=ajout-3');</script>";}
			break;
	}
	?>
</form>