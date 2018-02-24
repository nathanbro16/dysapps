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
  <title>agenda</title>
  <link rel="icon" type="image/x-icon" href="logo1.png" />

  <!--css-->
  <link rel="stylesheet" href="../library/css/bootstrap.min.css">
  <link href="../library/jquery-ui-1.12.1/jquery-ui.css" rel="stylesheet">
  <link href="../library/summernote-master/dist/summernote-bs4.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="agendat/css/style3.css">
  <link rel="stylesheet" href="..\library\fontawesome-free-5.0.6\web-fonts-with-css\css\fontawesome-all.css">
  <!--/css-->
  <!--js-->
  <script src="../library/js/jquery-3.2.1.slim.min.js"></script>
  <script type="text/javascript">var jQuery_3_2_1 = $.noConflict();</script>
  <script type="text/javascript" src="../library/js/popper.js-1.12.8/dist/dist/umd/popper.min.js"></script>
  <script src="../library/js/bootstrap.min.js"></script>
  <script src="../library/js/date-heure.js"></script>
  <script src="../library/summernote-master/dist/summernote-bs4.js"></script>
  <script src="../library/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
  <script src="../library/jquery-ui-1.12.1/jquery-ui.js"></script>
  <script src="agendat/datepicker.js"></script>   
  <!-- /js -->  
</head>
<body class="body">
  <div id="progressbar"></div>

  <nav class="navbar navbar-expand-lg navbar-dark ">
    <a class="navbar-brand" href="agenda-<?= $_SESSION['id'] ?>">Agenda</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link btn-outline-primary fa fa-home" href="../user-<?= $urlpseudo ?>" ></a>
        </li>
        
        <a href="agenda-<?=$_SESSION['id']?>=ajout-0" class="nav-link btn-outline-success fa fa-calendar-plus" style="color: green;"></a>
      </ul>

    </div>
  </nav>

<?php
if (isset($ajout)) {
  if ($ajout <= '4') {
?>
  <script>
    jQuery_3_2_1( function( document ) {
      jQuery_3_2_1( '#ajout' ).modal('show');       
    });
  </script>
  <?php include 'new.php';  
  }
}
?> 
  
<div class="container">
      <form method="POST">
        <br>
        <div class="row ">
          <div class="col"></div>
          <div class="col"></div>
          <div class="col">
            Bonjour nous somme le <span class="badge badge-info" id="date"></span>
            <h3>Il est <span class="badge badge-info" id="heure"></span></h3>
            <script type="text/javascript">window.onload = heure('heure'); window.onload = date_heure('date');</script>
          </div>
        </div>

            <?php
              $iduser = $_SESSION['id'];
                           
              // requete de suppretions
              if (isset($supprimer) > 0)
              {                
                $suprid = (int) $supprimer;
                $suppr = $bdd->query("SELECT `iduser` FROM `".DB_prefix."agendat` WHERE id = $suprid ");
                $supprep = $suppr->fetch();
                $suppr->closeCursor();
                if ($supprep['iduser'] == $_SESSION['id']) {
                  $del1 = $bdd->prepare("DELETE FROM ".DB_prefix."agendat WHERE iduser = $iduser AND id = $suprid");
                  $del1->execute();
                } else {
                ?><div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Attention!</strong> Vous n'est pas autoriser à supprimer les données des autres utilisateurs.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <hr>
                  Si le problème persiste veuillez contacter l'administrateur ou le développeur.
                </div><?php
                }
              }
        ?><div class="row"><?php
              // On récupère tout le contenu de la table
              setlocale(LC_TIME, 'fr_FR.UTF8', 'fr_FR.UTF-8', 'fr.UTF8', 'fr.UTF-8', 'fr','utf-8','UTF8');
              $reponse1 = $bdd->query("SELECT * FROM ".DB_prefix."agendat WHERE iduser = $iduser ORDER BY jour");
              // On affiche chaque entrée une à une
              while ($donnees1 = $reponse1->fetch())
              {
                  $dateFormat = ucfirst(strftime('%A %d %B %G',strtotime($donnees1['jour'])));
                  
                  // Definition des variables de style bootstrap et des variable de tache
                  switch ($donnees1['typeid']) {
                    case '1':
                        $typecolor='danger';
                        $typecolorbtnsup='light';
                        $typetache='Evaluation';
                        $date = $dateFormat;
                      break;
                    case '2':
                        $typecolor='primary';
                        $typecolorbtnsup='danger';
                        $typetache='Devoir';
                        $date = $dateFormat;
                      break;
                    case '3':
                        $typecolor='warning';
                        $typecolorbtnsup='danger';
                        $typetache='Note';
                        $date = "";
                      break;
                  }

                  ?>
                <div id="devoir<?= $donnees1['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="devoir" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                       	<div class="modal-content">
							<div class="modal-header">
                            	
                            	<h5 class="modal-title"><?php 
                              if (!empty($date)) {
                                echo $date;
                              } else {
                                echo "aucune date";
                              }
                              ?></h5>
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
        						<h5 class="modal-title" id="exampleModalLabel">êtes-vous sur de supprimer ?</h5>
        						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          						<span aria-hidden="true">&times;</span>
        						</button>
      						</div>
      						<div class="modal-footer">

				        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
				        		<a class="btn btn-outline-danger float-right" href="agenda-<?=$iduser?>=supprimer-<?= $donnees1['id'] ?>">Supprimer</a>

				      		</div>
				    	</div>
				  	</div>
				</div>


                <div class="col-sm-4" id="article">
                   	<div class="card text-white bg-<?= $typecolor ?> " style="max-width: 20rem;" id="bamin1">
                   		<div data-toggle="modal" data-target="#devoir<?= $donnees1['id'] ?>" id="bamin" >
                			<div class="card-header"><?php echo $donnees1['matiere']; ?>
                 			</div>
                  			<div class="card-body">
                    			<h4 class="card-title">
                          <?php 
                          if (!empty($date)) {
                            echo $date;
                          }
                          ?>
                            
                          </h4>
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

      </form>
        <br>
        <script>
    jQuery( function() {


              
    });
  </script>
        <div id='datepicker2' name="date" value="affiche calendrier">
        </div>
        <br>
  </div>


</body>
</html>