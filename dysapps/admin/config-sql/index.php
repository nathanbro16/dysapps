<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Installation automatisée : 1ère étape</title>

<style type="text/css">

body {

font-family:Tahoma, Arial, Serif; /* polices du texte */

font-size:14px; /* taille du texte */

}

h1 {

font-size:1.4em; /* taille du titre */

}

label

{

font-size:1.2em; /* taille du texte pour les "label" */

display:block; /* on affiche les "label" en tant que block et non pas inline */ 

width:150px; /* on leur met une taille pour aligner nos zones de texte */

float:left; /* flottant à gauche */

}

</style>

</head>

<body>


<h1>Informations sur la base de données MySQL :</h1>

<p>

<form action="re-config-formulaire.php" method="post">

<p>

<input type="hidden" name="etape" value="1" />


<label for="hote">Hôte :</label>

<input type="text" name="hote" maxlength="40" /><br />


<label for="login">Utilisateur :</label>

<input type="text" name="login" maxlength="40" /><br />


<label for="mdp">Mot de passe :</label>

<input type="password" name="mdp" maxlength="40" /><br />


<label for="base">Nom de la base :</label>

<input type="text" name="base" maxlength="40" /><br /><br />


<label for="submit"> </label>

<input type="submit" name="submit" value="Envoyer" />

</p>

</form>

</p>


</body>

</html>