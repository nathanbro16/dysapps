<?php
session_start();

if (!empty($_SESSION['pseudo']) and !empty($_SESSION['urlpseudo']) and !empty($_SESSION['id'])) {
	$chaine = trim($_SESSION['pseudo']);
	$chaine = str_replace(" ", "_", $chaine);
	header("Location: user-".$chaine);
}
?>
<html>
<head>
		<link rel="icon" type="image/x-icon" href="icon"/>
		<link rel="stylesheet" type="text/css" href="library\css\bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="library\fontawesome-free-5.0.6\web-fonts-with-css\css\fontawesome-all.css">

        <title>Dysapps</title>
    <meta charset="utf-8">
</head>
<body>
	<div class="container">
		<form method="POST" action="connect.php" class="form-signin">
            <div class="row justify-content-md-center">
            	<div class="col-6">

        	   <h2 class="form-signin-heading"><strong>Connectez-vous</strong></h2>
            
            <div class="row">
                 <div class="input-group">
                    <div class="input-group-prepend">
                     <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                        <input id="" class="form-control" placeholder="Pseudo" name="pseudoconnect" type="text">
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                     <span class="input-group-text"><i class="fa fa-key"></i></span>
                    </div>
        	           <input id="inputPassword" class="form-control" name="mdpconnect" placeholder="Mot de passe" type="password">
                </div>
            </div>
            <br>
            <div class="row">
                <?php
                if (!empty($_SESSION['erreur'])) 
                {
                ?> <div class="alert alert-danger form-control text-danger"> <i class="fa fa-times" aria-hidden="true"></i>
                    <?= $_SESSION['erreur']?>
                </div><?php
                }
                ?>
        	   <input type="submit" value="Se connecter" name="formconnextion" class="btn btn-primary">
    	   </div>
    	   </div>
        </div>
	   </form>
    </div>
</body>
</html>
<?php
if (!empty($_SESSION['erreur'])) {
	$_SESSION['erreur'] = '';
	session_destroy();
}
?>