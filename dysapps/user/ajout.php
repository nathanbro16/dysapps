<?php

	if (isset($_POST['validerde'])) {
		if ($_POST['radio-stacked'] <= '2'){
			echo "ok3";
		}elseif ($_POST['radio-stacked'] == '3') {
			echo "ok";
		}	

		/*
				if (!empty($_POST['datepicker']) AND !empty($_POST['radio-stacked']) AND !empty($_POST['texte'])) {
					if ($_POST['choixmatiere'] == "defaut") {
						$erreur = "vous ne pouvez pas sélectioner de matière";
					} else {
						$matiere=htmlspecialchars($_POST['choixmatiere']);
				 		$jour=htmlspecialchars($_POST['datepicker']);
						$tache=htmlspecialchars($_POST['texte']);
						$iduser=$_SESSION['id'];
						$typeid=$_POST['radio-stacked'];
				 		$insert3=$bdd->prepare("INSERT INTO agendat(matiere, jour, tache, iduser, typeid) VALUES(?, ?, ?, ?, ?) ");
				 		$insert3->execute(array($matiere,$jour,$tache,$iduser,$typeid));
				 		//header('Location: agendat en sql beta.php');
				 	}
				} else {
					$erreur = "Tous les champs doivent être complétés !";
				}*/
		  
	}
	if (isset($_POST['valider2'])) {
		/*if (!empty($_POST['note'])) {
		  $note=$_POST['note'];
		  $iduser=$_SESSION['id'];
		  $insert2=$bdd->prepare("INSERT INTO note(note, iduser) VALUES(?, ?) ");
		  $insert2->execute(array($note, $iduser));
		  header('Location: agendat en sql beta.php');
		} else {
			$erreurnote = "Tous les champs doivent être complétés !";

		}*/
		if (!empty($_POST['datepicker']) AND !empty($_POST['note']) AND !empty($_POST['object'])) {

				$matiere=htmlspecialchars($_POST['object']);
		 		$jour=htmlspecialchars($_POST['datepicker']);
				$tache=$_POST['note'];
				$iduser=$_SESSION['id'];
				$typeid=$_POST['radio-stacked'];
		 		$insert3=$bdd->prepare("INSERT INTO agendat(matiere, jour, tache, iduser, typeid) VALUES(?, ?, ?, ?, ?) ");
		 		$insert3->execute(array($matiere,$jour,$tache,$iduser,$typeid));
		 		//header('Location: agendat en sql beta.php');
		} else {
			$erreur = "Tous les champs doivent être complétés !";
		}
	}
?>
<html>
<head>
	<title>agendat 2.0</title>
   		<meta charset="utf-8">

    	<link rel="stylesheet" href="../library/bootstrap-4.0.0-beta/scss/css/bootstrap.min.css">
  		<link href="../library/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet">
	    <link rel="stylesheet" href="../library/font-awesome-4.7.0/css/font-awesome.min.css">

	
		<script src="../library/ckeditor/ckeditor.js"></script>
		
</head>
<body>

<br>
<form method="POST" action="">
	<table>
    <div class="col">
<select name="choixmatiere" class="custom-select d-block" >

	<option value="defaut" id="defaut">matière</option>
<?php
$reponse = $bdd->query('SELECT * FROM matiere ORDER BY matiere');

	// On affiche chaque entrée une à une
	while ($donnees = $reponse->fetch())
	{
	?>
    <option value=<?php echo $donnees['matiere']; ?>><?php echo $donnees['matiere']; ?></option>
	<?php
	}
	$reponse->closeCursor();
	?>

</select>

<br>
<div class="custom-controls-stacked">
  <label class="custom-control custom-radio">
    <input id="radioStacked3" value="2" name="radio-stacked" type="radio" class="custom-control-input">
    <span class="custom-control-indicator"></span>
    <span class="custom-control-description">Devoir</span>
  </label>
  <label class="custom-control custom-radio">
    <input id="radioStacked4" name="radio-stacked" value="1" type="radio" class="custom-control-input">
    <span class="custom-control-indicator"></span>
    <span class="custom-control-description">Evaluation</span>
  </label>
  <label class="custom-control custom-radio">
    <input id="radioStacked4" name="radio-stacked" value="3" type="radio" class="custom-control-input">
    <span class="custom-control-indicator"></span>
    <span class="custom-control-description">Note</span>
  </label>
</div>
<div class="input-group">
	<input id="datepicker1" class="input-group-addon" name="datepicker">
	<span class="input-group-addon"><i class="fa fa-calendar"></i></span>

</div>

<br><textarea name="texte" placeholder=" tache a éffèctuer" class="form-control"></textarea>

<br>
<?php if (isset($erreur)) 
		{
			?> <div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i><?php
			echo '<font color="red">'.$erreur.'</font>';
			?> </div> <?php
		} 
?>
<br><input type="submit" name="validerde" id='validerde' value="valider" class="btn btn-primary"><br>



</div>
<div class="col">

	<br><textarea name="note" id="editor1" class="form-control" placeholder="entrer note" ></textarea>
		<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
        </script>
 	<br>
 	<input type="text" name="object">

<?php if (isset($erreurnote)) 
		{
			?> <div class="alert alert-danger"> <?php
			echo '<font color="red">'.$erreurnote.'</font>';
			?> </div> <?php
		} 
?>
<br><input type="submit" name="valider2" id="valider2" value="valider" class="btn btn-success"><br>

</div>

</table>


</form>
</body>
</html>
