
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title>404 Erreur</title>
    <link rel="stylesheet" type="text/css" href="<?= $link ?>/library/bootstrap-4.0.0-beta/scss/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $link ?>/library/fontawesome-free-5.0.6/web-fonts-with-css/css/fontawesome-all.css">
    <style type="text/css">
      body{
        background: url(<?= $link ?>/picture/font2.jpg); 
        background-position: center;
      }
      .jumbotron {
        margin: 0 auto;
        margin-top: 15%;
     }

    </style>

</head>
<body>
<div class="container-fluid">
    <div class="jumbotron jumbotron-fluid">
  		<div class="container">
          <div class="row">
            <div class="col-1"></div>
            <div class="col-3">
              <div class="fa fa-exclamation-triangle" style="font-size: 200px"></div>
            </div>
            <div class="col">
              <h1 class="display-3">Oups! 404 Erreur!</h1>
              <hr class="my-4">
              <p class="lead">Désoler cette page n'existe pas ou plus.</p>
              <a class="btn btn-primary btn-lg btn-sm" href="<?= $link ?>">Retour page de connection</a>
          </div>
        </div>
  		</div>
	</div>
</div>

</body>
</html>