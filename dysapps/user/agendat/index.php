<?php

?> 

<html>
<head>
  <meta charset="utf-8">
  <title>agendat 2.0</title>
  <!--css-->
  <link rel="stylesheet" href="../library/bootstrap-4.0.0-beta/scss/css/bootstrap.min.css">
  <link href="../library/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet">
  <link href="../library/summernote-master/dist/summernote-bs4.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="agendat/css/style3.css">
  <link rel="stylesheet" href="..\library\font-awesome-4.7.0\css\font-awesome.min.css">
  <!--js-->
  <script src="../library/js/jquery-3.2.1.slim.min.js"></script>
  <script type="text/javascript">var jQuery_3_2_1 = $.noConflict();</script>
  <script type="text/javascript" src="../library/js/popper.js-1.12.8/dist/dist/umd/popper.min.js"></script>
  <script src="../library/bootstrap-4.0.0-beta/js/js/bootstrap.min.js"></script>

  <script src="../library/summernote-master/dist/summernote-bs4.js"></script>
  <script src="../library/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
  <script src="../library/jquery-ui-1.12.1/jquery-ui.js"></script>
  <script type="text/javascript">
    jQuery.noConflict();

    jQuery( function() {
      jQuery( "#datepicker1" ).datepicker({
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
    });
  </script>
      
</head>
<body class="body">
  <div id="progressbar"></div>

  <nav class="navbar navbar-expand-lg navbar-dark ">
    <a class="navbar-brand" href="agendat">Agendat</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link btn-outline-primary fa fa-home fa-1x" href="profil-<?= $_SESSION['id'] ?>" style="font-size: 160%" ></a>
        </li>
        
        <a href="agendat-<?=$_SESSION['id']?>=ajout-0" class="nav-link btn-outline-success fa fa-plus" style="font-size: 160%"></a>

   <script type="text/javascript">
    function date_heure(id)
    {
      date = new Date;
      annee = date.getFullYear();
      moi = date.getMonth();
      mois = new Array('Janvier','F&eacute;vrier','Mars','Avril','Mai','Juin','Juillet','Ao&ucirc;t','Septembre','Octobre','Novembre','D&eacute;cembre');
      j = date.getDate();
      jour = date.getDay();
      jours = new Array('Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi');
      resultat = ''+jours[jour]+' '+j+' '+mois[moi]+' '+annee;
      document.getElementById(id).innerHTML = resultat;
      setTimeout('date_heure("'+id+'");','1000');
      return true;
    }
  </script>
  <script type="text/javascript">
    function heure(id)
    {
      date = new Date;

      h = date.getHours();
      if(h<10)
      {
        h = "0"+h;
      }
      m = date.getMinutes();
      if(m<10)
      {
        m = "0"+m;
      }
      s = date.getSeconds();
      if(s<10)
      {
        s = "0"+s;
      }
      resultat = ''+h+':'+m+':'+s;
      document.getElementById(id).innerHTML = resultat;
      setTimeout('heure("'+id+'");','1000');
      return true;
    }
  </script>
  
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
                            setlocale(LC_TIME, 'fr_FR.UTF8', 'fr_FR.UTF-8', 'fr.UTF8', 'fr.UTF-8', 'fr','utf-8','UTF8');
              // requete de suppretions
              if (isset($supprimer) > 0)
              {                
                $suprid = (int) $supprimer;
                $suppr = $bdd->query("SELECT `iduser` FROM `agendat` WHERE id = $suprid ");
                $supprep = $suppr->fetch();
                $suppr->closeCursor();
                if ($supprep['iduser'] == $_SESSION['id']) {
                  $del1 = $bdd->prepare("DELETE FROM agendat WHERE iduser = $iduser AND id = $suprid");
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
             
              $reponse1 = $bdd->query("SELECT * FROM agendat WHERE iduser = $iduser ORDER BY jour");
              // On affiche chaque entrée une à une
              while ($donnees1 = $reponse1->fetch())
              {
                  $dateFormat = utf8_encode(ucfirst(strftime('%A %d %B %G',strtotime($donnees1['jour']))));
                  
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
                                echo "aucun date";
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
        						<h5 class="modal-title" id="exampleModalLabel">Etes-vous sur de supprimer?</h5>
        						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          						<span aria-hidden="true">&times;</span>
        						</button>
      						</div>
      						<div class="modal-footer">

				        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
				        		<a class="btn btn-outline-danger float-right" href="agendat-<?=$iduser?>=supprimer-<?= $donnees1['id'] ?>">Supprimer</a>

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

      jQuery( "#datepicker2" ).datepicker({
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
        <div id='datepicker2' name="date" value="affiche calendrier">
        </div>
        <br>
  </div>


</body>
</html>