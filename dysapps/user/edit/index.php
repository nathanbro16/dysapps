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

	<link rel="stylesheet" href="<?= $link ?>/library/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= $link ?>/library/fontawesome-free-5.0.6/web-fonts-with-css/css/fontawesome-all.css">

	<script src="<?= $link ?>/library/js/jquery-3.3.1.min.js"></script>

  	
  	<script src="<?= $link ?>/library/js/bootstrap.min.js"></script>
</head>
<body style="background: url(<?= $link ?>/picture/font2.jpg);background-position: center;">
	
<script>
$(document).ready(function() {
});
    function supprmatiere($id){
 
    if(confirm('Confirmez vous la suppression ?')){
        $.ajax({
            //var datab = $('table td.id_actu').html();
            //console.log(datab);
 
            url : 'user/edit/traitement-matiere.php',
            type : 'GET',
            data : 'Matsup=' + $id,
            success : function(data){
            	if(data == 'ok'){
                     $("#resultatspr").html('<div class="alert alert-success"><i class="fas fa-exclamation-triangle"></i>Votre matière a bien été supprimer. (actualiser pour la voir)</div>');
                }
                else{
                     $("#resultatspr").html('<div class="alert alert-danger col-7"><i class="fas fa-exclamation-triangle"></i>Veuillez mettre une matiere.</div>');
                }
            },
 
            error : function(resultat, statut, erreur){
            },
 
            complete : function(resultat, statut){
 
            }
 
        });
    } else {
        //ne change rien (comment l'indiquer ?)
    }
}
</script>
<script>
$(document).ready(function(){
    $("#ajout-matieres").click(function(e){
        e.preventDefault();
        $.post(
            'user/edit/traitement-matiere.php', // Un script PHP que l'on va créer juste après
            {
                matiereajj : $("#matiere").val() 
            },
            function(data){
                if(data == 'Success'){
                     $("#resultatajout").html('<div class="alert alert-success"><i class="fas fa-exclamation-triangle"></i>Votre matière a bien été ajouter. (actualiser pour la voir)</div>');
                }
                else{
                     $("#resultatajout").html('<div class="alert alert-danger col-7"><i class="fas fa-exclamation-triangle"></i>Veuillez mettre une matiere.</div>');
                }
            },
            'text'
         );
    });
    
});
</script>
<form method="POST" action="">

	<div class="container-fluid" >
		<nav class="navbar navbar-expand-lg navbar-dark ">
		  <a class="navbar-brand">Paramètre</a>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	      <ul class="navbar-nav mr-auto">
	        <li class="nav-item active">
	          <a class="nav-link btn-outline-primary fa fa-home fa-2x" href="user-<?= $urlpseudo ?>" ></a>
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