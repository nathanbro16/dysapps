<?php
session_start();
include 'sql.php';

if (isset($_POST['formconnextion'])) 
	{
		$pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
		$mdpconnectSecure = htmlspecialchars($_POST['mdpconnect']);
		$mdpconnect = sha1($mdpconnectSecure);
		if (!empty($pseudoconnect) AND ! empty($mdpconnect)) 
		{
			$requser = $bdd->prepare("SELECT * FROM membres WHERE pseudo= ? AND motdepasse=? ");
			$requser->execute(array($pseudoconnect, $mdpconnect));
			$userexist = $requser->rowCount();
			if ($userexist == 1) 
			{
				$userinfo = $requser->fetch();
				$_SESSION['id'] = $userinfo['id'];
				$_SESSION['pseudo'] = $userinfo['pseudo'];
				header("Location: user/profil-".$_SESSION['id']);
			}
			else
			{
				$erreur="Maivais pseudo ou mot de passe !";
				$_SESSION['erreur'] = $erreur;
				echo $_SESSION['erreur'];
				header('Location: connection');
			}
		}
		else
		{
			$erreur = "Tous les champs doivent être complétés !";
			$_SESSION['erreur'] = $erreur;
			header('Location: connection');
		}
	} else { 

		header('refresh:1;URL=connection'); 
	
	}
?>