<?php
session_start();
require'../sql.php';

if (isset($_SESSION['id']))
{
	$requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
	$requser->execute(array($_SESSION['id']));
	$user = $requser->fetch();

	if (isset($_POST['newpseudo']) AND !empty($_POST['newpseudo'])AND $_POST['newpseudo'] != $user['pseudo'])
	{
		$newpseudo = htmlspecialchars($_POST['newpseudo']);
		$insertpseudo = $bdd->prepare("UPDATE menbres SET pseudo = ? WHERE id = ?");
		$insertpseudo->execute(array($newpseudo, $_SESSION['id']));
		header('Location: profil.php?id='.$_SESSION['id']);
	}
	if (isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty ($_POST['newmdp2']))
	{
		$mdp1 = sha1($_POST['newmdp1']);
		$mdp2 = sha1($_POST['newmdp2']);
		if ($mdp1 == $mdp2) 
		{
			$insertmdp = $bdd->prepare("UPDATE membres SET motdepasse = ? WHERE id = ?");
			$insertmdp->execute(array($mdp1, $_SESSION['id']));
			header('Location: profil.php?id='.$_SESSION['id']);
		}
		else
		{
			$msg = "Vos deux mot de passe ne correspond pas !";
		}
	}
	if (isset($_POST['newpseudo']) AND $_POST['newpseudo'] == $user ['pseudo'])
	{
		header('Location: profil.php?id='.$_SESSION['id']);
	}

?>
<html>
<head>
	<title>collège</title>
	<meta charset="utf-8">
</head>
<body>
	<div align="center">
		<h2>Editer mon profil</h2>
		<form method="POST" action="">
			<input type="text" name="newpseudo" placeholder="Pseudo" value="<?php echo $user['pseudo']; ?>"><br><br>
			<input type="Password" name="newmdp1" placeholder="Mot de passe"><br><br>
			<input type="Password" name="newmdp2" placeholder="Confirmation mdp"><br><br>
			<input type="submit" value="Maitre a jour mon profil" name="">
		</form>
		<?php 
		if (isset($msg))
		{
			echo $msg ;
		}
		?>
</body>
</html>
<?php
}
else
{
	header("Location: \connection.php") ;
}
?>