<?php


if (isset($_POST['valid'])) {
	if (!empty($_POST['titre']) AND !empty($_POST['matiere']) and !empty($_POST['contenue'])and !empty($_POST['id_user'])){
		$titre = htmlspecialchars($_POST['titre']);
		$matiere = htmlspecialchars($_POST['matiere']);
		$contenue = $_POST['contenue'];
		$id_user = $_SESSION['id'];

		$ins=$bdd->prepare("INSERT INTO cahier(matiere, tittre, contenu, date_time_publication, id_user) VALUES(?, ?, ?, NOW(), ?) ");
		$ins->execute(array($matiere, $titre, $contenue, $id_user));
			echo "ok";
	}else{
		echo "ono";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>rédaction</title>
	<!--css-->
	<link rel="stylesheet" href="../library/bootstrap-4.0.0-beta/scss/css/bootstrap.min.css">
  	<link href="../library/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet">
  	<link href="../library/summernote-master/dist/summernote-bs4.css" rel="stylesheet">
  	<link rel="stylesheet" type="text/css" href="agendat/css/style3.css">
  	<link rel="stylesheet" href="..\library\font-awesome-4.7.0\css\font-awesome.min.css">
  	<!--js-->
  	<script src="../library/js/jquery-3.2.1.slim.min.js""></script>
  	<script type="text/javascript">var jQuery_3_2_1 = $.noConflict();</script>
  	<script type="text/javascript" src="../library/js/popper.js-1.12.8/dist/dist/umd/popper.min.js"></script>
  	<script src="../library/bootstrap-4.0.0-beta/js/js/bootstrap.min.js"></script>
  	  <script src="../library/summernote-master/dist/summernote-bs4.js"></script>

</head>
<body style="background: url(../../../images/font2.jpg);">
	<nav class="navbar navbar-expand-lg navbar-dark ">
    <a class="navbar-brand" href="cour-<?= $_SESSION['id'] ?>">cour</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link btn-outline-primary fa fa-home fa-1x" href="profil-<?= $_SESSION['id'] ?>" style="font-size: 160%" ></a>
        </li>
        
  
      </ul>

    </div>
  </nav>
	<div class="container">
		<form method="POST" >
			<input type="texte" placeholder="titre" name="titre" class="form-group">
			<input type="texte" placeholder="matiere" name="matiere" class="form-group">
			<textarea placeholder="contenue" name="contenue" id="summernote"></textarea>

				<script>
					jQuery_3_2_1( function( document ) {

			        jQuery_3_2_1('#summernote').summernote({
				        placeholder: 'Entrer du texte',
				        tabsize: 2,
				        height: 100
				      });
			              
			      });
				</script>

			<input type="submit" placeholder="enregistrer" name="valid" class="btn btn-primary">
		</form>
		
	</div>
</body>
</html>