<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Installation automatisée : 2nde étape</title>

<style type="text/css">

body {

font-family:Tahoma, Arial, Serif;

font-size:14px;

}

.note {

font-size:1.1em;

font-style:italic;

}

.ok {

color:green;

font-weight:bold;

}

.echec {

color:red;

font-weight:bold;

}

</style>

</head>

<body>

<p>

<?php

if(isset($_POST['etape']) AND $_POST['etape'] == 1) { // si nous venons du formulaire alors


// on crée des constantes dont on se servira plus tard

define('RETOUR', '<br /><br /><input type="button" value="Retour" onclick="history.back()">');

define('OK', '<span class="ok">OK</span><br />');

define('ECHEC', '<span class="echec">ECHEC</span>');


$fichier = '..\..\sql.php';

if(file_exists($fichier) AND filesize($fichier ) > 0) { // si le fichier existe et qu'il n'est pas vide alors
file_put_contents($fichier, '');
echo "le fichier et existant et viens d'être suprimer";
header('refresh:5;URL=index.php');

exit();

}   


// on crée nos variables, et au passage on retire les éventuels espaces 

$hote = trim($_POST['hote']);

$login = trim($_POST['login']);

$mdp = trim($_POST['mdp']);

$base = trim($_POST['base']);


// on vérifie la connectivité avec le serveur avant d'aller plus loin
$bdd= new PDO('mysql:host='.$hote.';dbname='.$base.'', $login, $mdp);
if(!$bdd) {

exit('Mauvais paramètres de connexion.'. RETOUR);

}
   


// le texte que l'on va mettre dans le config.php

$texte = '<?php

$hote   = "'. $hote .'";

$login  = "'. $login .'";

$mdp    = "'. $mdp .'";

$base   = "'. $base .'";


$adresse = new PDO("mysql:host=".$hote.";dbname=".$base."", $login, $mdp);

?>';


// on vérifie s'il est possible d'ouvrir le fichier

if(!$ouvrir = fopen($fichier, 'w')) {

exit('Impossible d\'ouvrir le fichier : <strong>'. $fichier .'</strong>.'. RETOUR);

}


// s'il est possible d'écrire dans le fichier alors on ne se gêne pas

if(fwrite($ouvrir, $texte) == FALSE) {

exit('Impossible d\'écrire dans le fichier : <strong>'. $fichier .'</strong>.'. RETOUR);

}


// tout s'est bien passé

echo 'Fichier de configuration : '. OK;

fclose($ouvrir); // on ferme le fichier

echo  'Répertoire: '.$fichier;

echo '<br /><span class="note">Note : si le site est en ligne, veuillez supprimer le répertoire <strong>/install</strong> du ftp.</span>';
echo '<br/>Redirection..';
header('refresh:5;URL=/index.php');
exit();
} // si on passe sur ce fichier sans être passé par la première étape alors on redirige

else
{
	exit('Vous devez d\'abord être passé par <a href="index.php">le formulaire</a>.');    
}
?>

</p>

</body>

</html>