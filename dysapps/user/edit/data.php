
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
        <div id="resultatajout">
          
        </div>

        <?php if (!empty($erreurmat)) {
          echo '<div class="alert alert-danger col-7"><i class="fas fa-exclamation-triangle"></i> '.$erreurmat.'</div>';
        }?>
        <input type="text" id="matiere" placeholder="matière" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss='modal'>Annuler</button>
        <button type="button" class="btn btn-primary" id="ajout-matieres">Valider</button>
      </div>
    </div>
  </div>
</div>
<h1>Matière</h1>
<div id="resultatspr">
  
</div>
<table class="table  table-sm" id="matiere">
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
                            <td><?= $donnees1[0] ?> <button type="button" id="<?= $donnees1['id'] ?>" class="btn btn-danger btn-sm" id="supr-matieres" onclick="supprmatiere(<?= $donnees1['id'] ?>);" >suppr</button></td>
                            <td><?= $donnees1['matiere'] ?></td> 
                          </tr><?php
                      }
                      $reponse1->closeCursor(); // Termine le traitement de la requête
                      ?>
                      <tr>
                        <td></td>
                        <td><a class="btn btn-success fas fa-plus" data-toggle="modal" data-target="#ajout" href="" role="button"></a></td>
                      </tr>
                 
              </tbody>
          </table>