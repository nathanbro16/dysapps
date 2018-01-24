<?php
session_start();
?>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="library/bootstrap-4.0.0-beta/scss/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="library\font-awesome-4.7.0\css\font-awesome.min.css">

        <title>collège</title>
    <meta charset="utf-8">
</head>
<body style="background: url(/images/font2.jpg); background-position: center;">
	<div class="container">
		<form method="POST" action="connect.php" class="form-signin">
            <div class="row justify-content-md-center">
            	<div class="col-6">

        	   <h2 class="form-signin-heading"><strong>Connectez-vous</strong></h2>
            
            <div class="row">
                 <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-user-o"></i></span>
                        <input id="" class="form-control" placeholder="Pseudo" name="pseudoconnect" type="text">
                </div>
                <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-key"></i></span>
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