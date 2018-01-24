<?php

require 'lib/autoload.php';


$db = DBFactory::getMysqlConnexionWithPDO();

$manager = new NewsManagerPDO($db);

//modifier
if (isset($_GET['modifier']))

{

    $news = $manager->getUnique((int) $_GET['modifier']);

}
//suppression
if (isset($_GET['supprimer']))

{

    $manager->delete((int) $_GET['supprimer']);

    $message = 'La news a bien été supprimée !';

}


if (isset($_POST['auteur']))

{

    $news = new News(

        [

            'auteur' => $_POST['auteur'],

            'titre' => $_POST['titre'],

            'contenu' => $_POST['contenu']

        ]

    );



    if (isset($_POST['id']))

    {

        $news->setId($_POST['id']);

    }



    if ($news->isValid())

    {

        $manager->save($news);



        $message = $news->isnew() ? 'La news a bien été ajoutée !' : 'La news a bien été modifiée !';

    }

    else

    {

        $erreurs = $news->erreurs();

    }

}

require 'inc/header.inc.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>ajouter un article</title>
	<script src="../../library/ckeditor/ckeditor.js"></script>
</head>
<body>
<form action="admin.php" method="post">
    <div class="container">
        <div class="row">
            <div class="form-group col-12">
                <?php
                if (isset($message)){
                    echo "<div class='alert alert-success' role='alert'>";
                    echo $message;
                    echo   "</div>";
                }?>
            </div>


            <div class="form-group col-12">
                <label> Matière </label>
                <?php 
                if (isset($erreurs) && in_array(News::AUTEUR_INVALIDE, $erreurs)) {
                    echo "<div class='alert alert-success' role='alert'> Matière vide </div>";
                }?>
                <input type="text" name="auteur" class="form-control" placeholder="Matière">
            </div>

            <div class="form-group col-12">
                <label> Titre </label>
                <?php 
                if (isset($erreurs) && in_array(News::TITRE_INVALIDE, $erreurs)) {
                    echo "<div class='alert alert-success' role='alert'> Titre vide </div>";
                }?>
                <input type="text" name="titre" class="form-control" placeholder="Titre">
            </div>

            <div class="form-group col-12">
                <label> Devoir </label>
                <?php 
                if (isset($erreurs) && in_array(News::CONTENU_INVALIDE, $erreurs)) {
                    echo "<div class='alert alert-success' role='alert'> Contenu vide </div>";
                }?>
                <textarea name="contenu" class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Ecrire votre Texte ..."></textarea>
            	<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'exampleFormControlTextarea1' );
           		</script>
            </div>

            <div class="form-group col-12">
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
    </div>
</form>
</body>
</html>













