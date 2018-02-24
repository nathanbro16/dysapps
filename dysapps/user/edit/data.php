
<h1>Donnés agenda</h1>
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titre</th>
      <th scope="col">Quant/Max</th>
      <th scope="col">type</th>
      <th scope="col">contenue</th>
    </tr>
  </thead>
  <tbody>
      <?php
      $iduser = $_SESSION['id'];
      setlocale(LC_TIME, 'fr_FR.UTF8', 'fr_FR.UTF-8', 'fr.UTF8', 'fr.UTF-8', 'fr','utf-8','UTF8');
       $reponse1 = $bdd->query("SELECT * FROM ".DB_prefix."agendat WHERE iduser = $iduser ORDER BY jour");
              // On affiche chaque entrée une à une
              while ($donnees1 = $reponse1->fetch())
              {
                  $dateFormat = ucfirst(strftime('%A %d %B %G',strtotime($donnees1['jour'])));
                  // Definition des variables de style bootstrap et des variable de tache
                  switch ($donnees1['typeid']) {
                    case '1':
                        $typetache='Evaluation';
                      break;
                    case '2':
                        $typetache='Devoir';
                      break;
                    case '3':
                        $typetache='Note';
                      break;
                  }
                                        $tache = htmlspecialchars($donnees1['tache']);
                  ?>    
    <tr>
      <th scope="row"><?=$donnees1['0']?></th>
      <td><?=$donnees1['matiere']?></td>
      <td><?=$dateFormat?></td>
      <td><?=$typetache?></td>
      <td><?=$tache?></td>
    </tr><?php

            }
            $reponse1->closeCursor(); // Termine le traitement de la requête
            ?>
  </tbody>
</table>
<?php
if (isset($_POST['ajout-matieres'])) {
  if (!empty($_POST['matiere'])) {
    $insert = $bdd->prepare("INSERT INTO ".DB_prefix."matiere(matiere, iduser) VALUES(?, ?) ");
    $insert -> execute(array($_POST['matiere'], $_SESSION['id']));
  }else{
    $erreurmat = "Veuillez mettre une matière.";
  }
} 
if (!empty($supprimer['matiere'])) {
 $iduser = $_SESSION['id'];
 $suprid = (int) $supprimer['matiere'];
 $del1 = $bdd->prepare("DELETE FROM ".DB_prefix."matiere WHERE id = $suprid");
 $del1->execute();
}

?>
<h1>Matière</h1>
<table class="table  table-sm">
  <thead class="table-info">
                  <tr>
                    <th>#</th>
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
                            <td><?= $donnees1[0] ?> <a class="btn btn-danger btn-sm" href="user-<?=$urlpseudo?>=Paramètre_profil=supprimer_matiere-<?= $donnees1['id'] ?>" >suppr</a></td>
                            <td><?= $donnees1['matiere'] ?></td> 
                          </tr><?php
                      }
                      $reponse1->closeCursor(); // Termine le traitement de la requête
                      ?>
                      <tr>
                        <td></td>
                        <td><a class="btn btn-success fas fa-plus" href="user-<?=$urlpseudo?>=Paramètre_profil=ajout_matiere-1" role="button"></a></td>
                      </tr>
                 
              </tbody>
          </table>