<?php

require 'inc/header.inc.php';

require 'lib/autoload.php';


$db = DBFactory::getMysqlConnexionWithPDO();

$manager = new NewsManagerPDO($db);


if (isset($_GET['id'])){

  $news = $manager->getUnique((int) $_GET['id']);

    ?>
    <div class='container'>
    <div class='row'>
    <div class="col-lg-12 col-md-12">

        <h1>
            <?= $news->titre()?>
        </h1>
        <h3>
            Matière :
            <?= $news->auteur()?>
                <?php echo  "<br>" . $news->dateModif()->format('d/m/Y')?>
        </h3>
        <p id="paragraph">
            <?php echo  "Editer le " . $news->dateAjout()->format('d/m/Y')?>
        </p>
        <p>
            <?=  $news->contenu()?>
        </p>

    </div>
    <?php





}
else{
   echo "<div class='container'>";
    echo "<div class='row'>";

  foreach ($manager->getList() as $news)

  {

    if (strlen($news->contenu()) <= 200)

    {

      $contenu = $news->contenu();

    }

    else

    {

      $debut = substr($news->contenu(), 0, 100);

      $debut .= "...";

      $contenu = $debut;

    }
    ?>

        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item" id="article">
            <div class="card h-100">
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="?id=<?=$news->id()?>">
                            <h7>
                                <?=$news->titre()?>
                            </h7>
                        </a>
                    </h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <h7>
                                <?=$news->auteur()?>
                            </h7>
                        </li>
                        <li class="list-group-item">
                            <h7>
                                <?=$news->dateAjout()->format('d/m/Y à H\hi')?>
                            </h7>
                        </li>
                </div>
            </div>
        </div>


        <?php
  }
   echo  "</div>";
   echo  "</div>";

}
