<?php
if ($_SESSION['urlpseudo'] == 'true') {
	$urlpseudo = $_SESSION['pseudo'];
  $urlpseudo = str_replace(" ", "_", $urlpseudo);
} elseif ($_SESSION['urlpseudo'] == 'false') {
	$urlpseudo = $_SESSION['id'];
} else {
	echo "erreur sur variable session 'urlpseudo'.";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Paramètre utilisateur</title>

	<link rel="stylesheet" href="../library/css/bootstrap.min.css">
	<link rel="stylesheet" href="library\fontawesome-free-5.0.6\web-fonts-with-css\css\fontawesome-all.css">

	<script src="../library/js/jquery-3.2.1.slim.min.js"></script>
  	<script type="text/javascript">var jQuery_3_2_1 = $.noConflict();</script>
  	<script type="text/javascript" src="../library/js/popper.js-1.12.8/dist/dist/umd/popper.min.js"></script>
  	<script src="../library/js/bootstrap.min.js"></script>
</head>
<body style="background: url(../../../picture/font2.jpg);background-position: center;">
<form method="POST" action="">
	<?php
	if (!empty($ajout['matiere']) and $ajout['matiere'] == 'true') {
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
	<div class="container-fluid" >
		<nav class="navbar navbar-expand-lg navbar-dark ">
		  <a class="navbar-brand">Paramètre</a>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	      <ul class="navbar-nav mr-auto">
	        <li class="nav-item active">
	          <a class="nav-link btn-outline-primary fa fa-home fa-2x" href="../user-<?= $urlpseudo ?>" ></a>
	        </li>
	      </ul>

	    </div>
		</nav>
		<div class="row">
		  <div class="col-2" style="margin: 0 auto; margin-top: 30px;">
		    <div class="list-group" id="list-tab" role="tablist">
		      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Menu</a>
		      <a class="list-group-item list-group-item-action" id="list-mdpnamepr-list" data-toggle="list" href="#list-mdpnamepr" role="tab" aria-controls="mdpnamepr"><i class="fas fa-user"> </i><i class="fas fa-edit"></i> Mot de passe et nom d'utilisateur</a>
		      <a class="list-group-item list-group-item-action" id="list-ajout-user-list" data-toggle="list" href="#list-ajout-user" role="tab" aria-controls="ajout-user"><i class="fas fa-database"></i> Mes donnés</a>
		      <a class="list-group-item list-group-item-action" id="ajout-user" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings"><i class="fas fa-user-plus"></i> Ajouter utilisateur</a>
		    </div>
		  </div>
		  <div class="col">
		    <div class="tab-content" id="nav-tabContent">
		      <div class="tab-pane fade show active" style="background-color: black;" id="list-home" role="tabpanel" aria-labelledby="list-home-list">BVN</div>
		      <div class="tab-pane fade" id="list-mdpnamepr" role="tabpanel" aria-labelledby="list-mdpnamepr-list"><?php include 'editionprofil.php'; ?></div>
		      <div class="tab-pane fade" id="list-ajout-user" role="tabpanel" aria-labelledby="list-ajout-user-list"><?php include 'data.php';?></div>
		      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="ajout-user"><?php include 'inscription.php'; ?></div>
		    </div>
		  </div>
		</div>
	</div>
</form>
</body>
</html>