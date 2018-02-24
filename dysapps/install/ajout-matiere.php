<?php
include '../sql.php';
if (isset($_POST['ajout-matieres'])) {
	if (!empty($_POST['matiere'])) {
		$insert = $bdd->prepare("INSERT INTO ".DB_prefix."matiere(matiere, iduser) VALUES(?, ?) ");
		$insert -> execute(array($_POST['matiere'], $_SESSION['id']));
	}else{
		$erreurmat = "Veuillez mettre une matière.";
	}
} 
if (!empty($_GET['suprmat'])) {
	echo "ok";
	$iduser = $_SESSION['id'];
	$suprid = (int) $_GET['suprmat'];
    $del1 = $bdd->prepare("DELETE FROM ".DB_prefix."matiere WHERE id = $suprid");
    $del1->execute();
}