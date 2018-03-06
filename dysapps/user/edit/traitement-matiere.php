<?php
session_start();
include '../../sql.php';
if (isset($_POST['matiereajj'])) {
  if (!empty($_POST['matiereajj'])) {
    $insert = $bdd->prepare("INSERT INTO ".DB_prefix."matiere(matiere, iduser) VALUES(?, ?) ");
    $insert -> execute(array($_POST['matiereajj'], $_SESSION['id']));
    echo "Success";
  }else{
    echo "error";
  }
}elseif (!empty($_GET['Matsup'])) {
 $iduser = $_SESSION['id'];
 $suprid = (int) $_GET['Matsup'];
 $del1 = $bdd->prepare("DELETE FROM ".DB_prefix."matiere WHERE id = ? AND iduser = ?");
 $del1->execute(array($suprid, $iduser));
 echo "ok";
}
