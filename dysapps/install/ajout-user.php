<?php
include '../sql.php';


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
				$reqpseudo = $bdd->prepare("SELECT * FROM ".DB_prefix."membres WHERE pseudo = ?");
				$reqpseudo->execute(array($pseudo));
				$pseudoexist = $reqpseudo ->rowCount();

				if($pseudoexist == 0)
				{
					if ($mdp == $mdp2) 
					{
						$insertmbr = $bdd->prepare("INSERT INTO ".DB_prefix."membres(pseudo, motdepasse) VALUES(?, ?) ");
						$insertmbr -> execute(array($pseudo, $mdp));
						$reqconect = $bdd->query("SELECT * FROM ".DB_prefix."membres WHERE pseudo = '$pseudo'");
						$donne = $reqconect->fetch();
						
						$_SESSION['id'] = $donne['id'];
						$_SESSION['pseudo'] = $donne['pseudo'];
						
						header('Location: ?ins=5');
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

