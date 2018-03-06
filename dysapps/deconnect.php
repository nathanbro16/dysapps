<?php
session_start(); 
session_destroy();

if (!empty($_SERVER['HTTP_HOST']) AND !empty($_SERVER['REQUEST_URI'] AND !empty($_SERVER['REQUEST_SCHEME']))) {
	$link = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST']."".$_SERVER['REQUEST_URI'];
	if (preg_match('#(.+)/deconnections#', $link, $params)) {
		$link = $params[1];
	}
} else {
    echo "Ereure lors de la localisation (l'une ou les variables SERVER['REQUEST_URI'] SERVER['HTTP_HOST'] SERVER['REQUEST_SCHEME']  n'existe pas )";
}
header('Location: '.$link);
?>