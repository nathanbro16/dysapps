<?php
include 'sql.php';


	if(isset($_POST['forminscription']))

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
						$erreur = "Vos mots de passe ne correspondent pas !";
					}
				}
				else
				{
					$erreur = "Pseudo déja utilisée !";
				}
			}
			else
			{
				$erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
			}
		}
		else
		{
			$erreur = "Tous les champs doivent être complétés !";
		}
	}

?>
<html>
<head>
	<title>collège</title>
	<meta charset="utf-8">
</head>
<body>
	<div align="center">
		<h2>Inscription</h2>
		<br /><br/><br />
		<form method="POST" action="">
			<table>
			<tr>
				<td align="right">
					<label for="pseudo">Pseudo :</label>
					</td>
					<td>
					<input type="texte" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>">	
				</td>
			</tr>
			<tr>
				<td align="right">
					<label for="mdp">Mot de passe :</label>
					</td>
					<td>
					<input type="password" placeholder="Votre Mot de passe" id="mdp" name="mdp">
				</td>
			</tr>
			<tr>
				<td align="right">
					<label for="mdp2">Confirmation du mot de passe :</label>
					</td>
					<td>
					<input type="password" placeholder="confirmez votre mdp" id="mdp2" name="mdp2">	
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
				<br>
					<input type="submit" name="forminscription" value="Je m'inscris">
				</td>
			</tr>
			</table>
	</form>
	<?php
		if (isset($erreur)) 
		{
			echo '<font color="red">'.$erreur.'</font>';
		}
	?>
	</div>

</body>
</html>