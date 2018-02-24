<?php
if (isset($_SESSION['id']))
{
	$requser = $bdd->prepare("SELECT * FROM ".DB_prefix."membres WHERE id = ?");
	$requser->execute(array($_SESSION['id']));
	$user = $requser->fetch();

	if (isset($_POST['newpseudo']) AND !empty($_POST['newpseudo'])AND $_POST['newpseudo'] != $user['pseudo'])
	{
		$newpseudo = htmlspecialchars($_POST['newpseudo']);
		$insertpseudo = $bdd->prepare("UPDATE ".DB_prefix."menbres SET pseudo = ? WHERE id = ?");
		$insertpseudo->execute(array($newpseudo, $_SESSION['id']));
		header('Location: profil.php?id='.$_SESSION['id']);
	}
	if (isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty ($_POST['newmdp2']))
	{
		$mdp1 = sha1($_POST['newmdp1']);
		$mdp2 = sha1($_POST['newmdp2']);
		if ($mdp1 == $mdp2) 
		{
			$insertmdp = $bdd->prepare("UPDATE ".DB_prefix."membres SET motdepasse = ? WHERE id = ?");
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
	<div align="center">
		<h2>Mot de passe et nom d'utilisateur</h2>
		<form method="POST" action="" class="col-2">
			<input type="text" class="form-control" name="newpseudo" placeholder="Pseudo" value="<?php echo $user['pseudo']; ?>"><br>
			<input type="Password" class="form-control" name="newmdp1" placeholder="Mot de passe"><br>
			<input type="Password" class="form-control" name="newmdp2" placeholder="Confirmation mdp"><br>
			<input type="submit" class="btn btn-primary" value="Mètre a jour mon profil" name=""><br>
		</form>
		<?php 
		if (isset($msg))
		{
			echo $msg ;
		}
		?>
	</div>
<?php
}
else
{
	header("Location: \connection.php") ;
}
?>