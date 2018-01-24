<?php 
session_start();
require '../sql.php';
?>
<html>
<head>
    <title>agendat 2.0</title>
        <meta charset="utf-8">
    	<link rel="stylesheet" type="text/css" href="style3.css">

		<link href="../library/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="..\..\library\bootstrap-4.0.0-beta\scss\css\bootstrap.min.css">
        <script src="../library/js/jquery-3.2.1.slim.min.js""></script>
        
        <script type="text/javascript" src="../library/js/popper.js-1.12.8/dist/dist/umd/popper.min.js"></script>
        <script src="../library/bootstrap-4.0.0-beta/js/js/bootstrap.min.js"></script>
  	    <script src="../library/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
	     
	      <script src="../library/jquery-ui-1.12.1/jquery-ui.js"></script>    	
	      <script>
  		    $( function() {

   		      $( "#datepicker1" ).datepicker({
              altField: "#datepicker",
              closeText: 'Fermer',
              prevText: 'Précédent',
              nextText: 'Suivant',
              currentText: 'Aujourd\'hui',
              monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
              monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
              dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
              dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
              dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
              dateFormat: 'yy-mm-dd',
              firstDay: 1
              });

              $( "#datepicker2" ).datepicker({
              altField: "#datepicker",
              closeText: 'Fermer',
              prevText: 'Précédent',
              nextText: 'Suivant',
              currentText: 'Aujourd\'hui',
              monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
              monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
              dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
              dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
              dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
              weekHeader: 'Sem',
              dateFormat: 'yy-mm-dd',
              showWeek: true,
              firstDay: 1
              });
              
  	       	});
  	   </script>

</head>

<body style="background: url(../../images/font2.jpg);">
  
  <nav class="navbar navbar-expand-lg navbar-dark " style="background-color:#0099ff;">
    <a class="navbar-brand" href="agendat">Agendat</a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="profil-<?=$_SESSION['id']?>">Accueille<span class="sr-only">(current)</span></a>
        </li>
        
        
        <button type="button" class="btn  btn-outline-success" data-toggle="modal" data-target="#ajout">
                    ajouter + 
        </button>

      </ul>
    
    </div>
  </nav>

    <div id="ajout" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="devoir" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

           <div class="modal-header">
             <h5 class="modal-title"></h5>
             <h5 class="modal-title" id="devoir"></h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">      
           <?php require 'ajout.php'; ?> 
           </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Fermer</button>
            </div>
       </div>
    </div>
   </div>


<div class="container">
      <form method="POST">
        <br>
        <div class="row">
            <?php
              $iduser = $_SESSION['id'];
                            setlocale(LC_TIME, 'fr_FR.UTF8', 'fr_FR.UTF-8', 'fr.UTF8', 'fr.UTF-8', 'fr','utf-8','UTF8');
              // requete de suppretions
              if ($supprimer > 0)
              {
                $supr = (int) $supprimer;
                echo $supprimer;
                //$req1 = $bdd->prepare("DELETE FROM agendat WHERE iduser = $iduser AND id = $supr");
                //$req1->execute();
              }

              // On récupère tout le contenu de la table
             
              $reponse1 = $bdd->query("SELECT * FROM agendat WHERE iduser = $iduser ORDER BY jour");
              // On affiche chaque entrée une à une
              while ($donnees1 = $reponse1->fetch())
              {
                  $dateFormat = utf8_encode(ucfirst(strftime('%A %d  %B',strtotime($donnees1['jour']))));
                  
                  // Definition des variables de style bootstrap et des variable de tache
                  if ($donnees1['typeid'] == '1') {
                  	$typecolor='danger';
                  	$typecolorbtnsup='light';
                  	$typetache='Evaluation';
                  	$date = $dateFormat;
                  }elseif ($donnees1['typeid'] == '2') { 
                  	$typecolor='primary';
                  	$typecolorbtnsup='danger';
                  	$typetache='Devoir';
                  	$date = $dateFormat;
                  }elseif ($donnees1['typeid'] == '3') {
                  	$typecolor='warning';
                  	$typecolorbtnsup='danger';
                  	$typetache='Note';
                  	$date = "";
                  }

                  ?>
                <div id="devoir<?= $donnees1['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="devoir" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                       	<div class="modal-content">
							<div class="modal-header">
                            	
                            	<h5 class="modal-title"><?php echo $date; ?></h5>
                              	<h5 class="modal-title" id="devoir"><?php echo $donnees1['matiere']; ?></h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                	<span aria-hidden="true">&times;</span>
                                </button>
                            
                            </div>
                            <div class="modal-body">      
                        
                          		<?php echo nl2br($donnees1['tache']); ?><br>

                        	</div>
                        	<div class="modal-footer">
                        		<button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Fermer</button>
                      		</div>
                      	
                      	</div>
                    </div>
                </div>
                <div class="modal fade" id="suppr<?= $donnees1['id']?>" tabindex="-1" role="dialog" aria-labelledby="suppr<?= $donnees1['id']?>" aria-hidden="true">
					<div class="modal-dialog" role="document">
    					<div class="modal-content">
     						<div class="modal-header">
        						<h5 class="modal-title" id="exampleModalLabel">Etes-vous sur de supprimer?</h5>
        						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          						<span aria-hidden="true">&times;</span>
        						</button>
      						</div>
      						<div class="modal-footer">

				        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
				        		<a class="btn btn-outline-danger float-right" href="agendat en sql beta.php?supprimer=<?= $donnees1['id'] ?>">Supprimer</a>

				      		</div>
				    	</div>
				  	</div>
				</div>


                <div class="col-lg-4 col-md-4" id="article">
                   	<div class="card text-white bg-<?= $typecolor ?> " style="max-width: 20rem;">
                   		<div data-toggle="modal" data-target="#devoir<?= $donnees1['id'] ?>">
                			<div class="card-header"><?php echo $donnees1['matiere']; ?>
                 			</div>
                  			<div class="card-body">
                    			<h4 class="card-title"><?= $date ?></h4>
                    			<p class="card-text"><?= $typetache ?></p>
                  			</div>
                      			<h4></h4>
                      			<h3></h3>
                    	</div>  			
						
						<div class="bd-example">

                  			<a class="btn btn-outline-<?= $typecolorbtnsup ?> float-right" href="#" data-toggle="modal" data-target="#suppr<?= $donnees1['id']?>" >Supprimer</a>

                		</div>
                	</div>
                </div>
                <br>

            <?php
            }
            $reponse1->closeCursor(); // Termine le traitement de la requête
            ?>
        </div> 


      <?php
       /* if (isset($_GET['supprimer2']) AND !empty($_GET['supprimer2'])) // requete de suppretions
        {
          $supprimer = (int) $_GET['supprimer2'];
          require '..\sql.php';
          $req2 = $bdd->prepare('DELETE FROM note WHERE id = ?');
          $req2->execute(array($supprimer));
          header('location: agendat');
        }
        $reponse = $bdd->query('SELECT * FROM note ORDER BY id DESC');
        // On affiche chaque entrée une à une
        while ($donnees = $reponse->fetch())
        {
        ?>
          <br> 
          <strong>note</strong> : <br /> 
          <?php
          echo nl2br($donnees['note']);
          ?><br>
          <a href="agendat en sql beta.php?supprimer2=<?= $donnees['id'] ?>">Supprimer</a>
          <br>
          <?php
        
        }
        $reponse->closeCursor(); // Termine le traitement de la requête
		*/
      ?>
      </form>
        <br>
        <div id='datepicker2' name="date" value="affiche calendrier">
        </div>
        <br>
  </div>
  
</body>
</html>
