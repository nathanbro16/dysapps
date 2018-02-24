<?php
include 'sql.php';


	if(isset($_POST['createcompte']))

	{		
		$pseudo = htmlspecialchars($_POST['pseudo']) ;
		$mdp = sha1($_POST['mdp']);
		$mdp2 = sha1($_POST['mdp2']);

		if (!empty($_POST['pseudo']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
		{ 

			$pseudolength = strlen($pseudo);
			if ($pseudolength <= 255) 
			{
				$reqpseudo = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ?");
				$reqpseudo->execute(array($pseudo));
				$pseudoexist = $reqpseudo ->rowCount();

				if($pseudoexist == 0)
				{
					if ($mdp == $mdp2) 
					{
						$insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, motdepasse) VALUES(?, ?) ");
						$insertmbr -> execute(array($pseudo, $mdp));
						$erreur = "Votre compte a bien été crée !";
						header('Location: index.php');
					}
					else
					{
						$errinscrip = "Vos mots de passe ne correspondent pas !";
					}
				}
				else
				{
					$errinscrip = "Pseudo déja utilisée !";
				}
			}
			else
			{
				$errinscrip = "Votre pseudo ne doit pas dépasser 255 caractères !";
			}
		}
		else
		{
			$errinscrip = "Tous les champs doivent être complétés !";
		}
	}

?>
<html>
<head>
	<title>collège</title>
	<meta charset="utf-8">
</head>
<body>
		<h2>Inscription</h2>
		<form method="POST" action="">

					<label for="pseudo">Pseudo :</label>


					<input type="texte" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>">	

					<label for="mdp">Mot de passe :</label>
	
					<input type="password" placeholder="Votre Mot de passe" id="mdp" name="mdp">

					<label for="mdp2">Confirmation du mot de passe :</label>

					<input type="password" placeholder="confirmez votre mdp" id="mdp2" name="mdp2">	

					<input type="submit" name="createcompte" value="Je m'inscris">

	</form>
	<?php
		if (isset($erreur)) 
		{
			echo '<font color="red">'.$errinscrip.'</font>';
		}
	?>
	</div>

</body>
</html>