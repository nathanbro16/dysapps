<?php


if (isset($idprofil) AND $idprofil > 0)
{
	$getid = intval($idprofil);
	$resquser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
	$resquser->execute(array($getid));
	$userinfo = $resquser->fetch();
	header('refresh:180;URL= déconnections');
?>

<html>
<head>
  <link rel="icon" type="image/x-icon" href="../logo1.png" />
  <title>Dysapps</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="..\library\bootstrap-4.0.0-beta\scss\css\bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="user\style22.css">
    <link rel="stylesheet" href="..\library\font-awesome-4.7.0\css\font-awesome.min.css">
      <script type="text/javascript">
    function heure(id)
    {
      date = new Date;

      h = date.getHours();
      if(h<10)
      {
        h = "0"+h;
      }
      m = date.getMinutes();
      if(m<10)
      {
        m = "0"+m;
      }
      s = date.getSeconds();
      if(s<10)
      {
        s = "0"+s;
      }
      resultat = ''+h+':'+m+':'+s;
      document.getElementById(id).innerHTML = resultat;
      setTimeout('heure("'+id+'");','1000');
      return true;
    }
  </script>
</head>
<body>
    <div id="h">
      <div class="logo">
        <h3><img src="../logo.png" style="max-width:15%"> <span class="badge badge-info" id="heure"></span></h3>
        <script type="text/javascript">window.onload = heure('heure');</script>
      </div><!--/logo-->
      <div class="container">
        <div class="row ">
          <div class="col-md-8">
            <h1>Bonjour <b><?php echo $userinfo ['pseudo']; ?></b>.<br>Bienvenue.</h1>
          </div> 
        </div><!--/row-->
        <br>
      </div><!--/container-->
        <?php
        if($userinfo['id'] == $_SESSION['id']) 
        {
	    ?>         
           <div class="container align-self-center">
        <div class="row text-center">
            
          <div class="col-sm"><a href="user/agendat-<?= $userinfo['id'] ?>" class="text-dark">
            <i class="fa fa-calendar fa-6"></i>
              <h3>Agenda</h3></a>
          </div><!--/col-md-4-->

          <div class="col-sm "><a href="#" class="disabled"disabled>
            <i class="fa fa-book" ></i>
              <h3>Cahier</h3></a>
          </div><!--/col-md-4-->
            
        </div><!--/row-->
        <br>
        <div class="row text-center">
            
          <div class="col-sm"><a href="user/editionprofil.php" class="text-info">
            <i class="fa fa-cog fa-6"></i>
              <h3>Editer Profil</h3></a>
          </div><!--/col-md-4-->

          <div class="col-sm"><a href="déconnections" class="text-danger">
            <i class="fa fa-sign-out"></i>
              <h3>Déconnecter</h3></a>
          </div><!--/col-md-4-->
            
        </div><!--/row-->
        </div>
        </div>


    
    <?php
  }
  else{
    echo "vous n'est pas connecter!";
    header('Location:/test.php');
	}
	?>

</body>
</html>
<?php
}
else
{
	header('refresh:2;URL=\deconnextions.php');
}
?>