<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="alex" content="">


        <title>Aganda de news</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css" />

    </head>

    <body>
        <?php 
        $pageLongue=(explode("/", $_SERVER['PHP_SELF']));
        $page = end($pageLongue);
        if($page=='index.php'){ 
            $pageIndex='active';
            $pageAdmin='';
        }elseif ($page=='admin.php'){
            $pageAdmin='active';
            $pageIndex='';
        } ?>


        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="#">Aganda</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">                  
                    <a class="nav-item nav-link=<?php echo $pageIndex; ?>" href="index.php">Liste</a>
                    <a class="nav-item nav-link=<?php echo $pageAdmin; ?>" href="admin.php">Ajouter</a>
                </div>
            </div>
        </nav>