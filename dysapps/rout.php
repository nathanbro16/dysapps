<?php
session_start();
		require'sql.php';


		$url ='';
		if (isset($_GET['url'])) {
			$url = $_GET['url'];
		}

		if ($url == '') {
			//echo "page d'acceuille";
		}
		elseif (preg_match('#install/url-Rewrite#', $url)) {
		
			$_SESSION['veriferewite'] = sha1('PB2Vyq7qK439tmh2E');
			//print_r($_SESSION);
			//require 'install/url-Rewrite-anti.php';
			header('location: ./?ins=3');
		}

		elseif (preg_match('#user/profil-([0-9]+)#', $url, $params)) {
			echo "<script type='text/javascript'>document.location.replace('../user-$params[1]');</script>";
		}
		elseif (preg_match('#user-([0-9]+)#', $url, $params)) {
			$idprofil = $params[1];
			require 'user/profil.php';
		}
		elseif (preg_match('#déconnection#', $url)) {
			require 'deconnect.php';
		}
		// pages agendat
		elseif (preg_match('#user/agendat-([0-9]+)=supprimer-([0-9]+)#', $url, $params)) {
			if ($params[1] == $_SESSION['id']) {
				$supprimer = $params[2];
				include 'user/agendat/index.php';
			} else {
				include 'erreur/acces.html';
			}
		}elseif (preg_match('#user/agendat-([0-9]+)=ajout-([0-9]+)#', $url, $params)) {
			if ($params[1] == $_SESSION['id']) {
				$ajout = $params[2];
				include 'user/agendat/index.php';
			} else {
				include 'erreur/acces.html';
			}
		} elseif (preg_match('#user/agendat-([0-9]+)#', $url, $params)) {
			if ($params[1] == $_SESSION['id']) {
				include 'user/agendat/index.php';
			} else {
				include 'erreur/acces.html';
			}
		} // fin
		// pages cours
		elseif (preg_match('#user/cour-([0-9]+)=ajout#', $url, $params)) {
			if ($params[1] == $_SESSION['id']) {
				$iduser = $_SESSION['id'];
				include 'user/cour/redac.php';
			} else {
				include 'erreur/acces.html';
			}
		}elseif (preg_match('#user/cour-([0-9]+)#', $url, $params)) {
			if ($params[1] == $_SESSION['id']) {
				include 'user/cour/index.php';
			} else {
				include 'erreur/acces.html';
			}
		}
		//page 404 erreur
		else {
			include 'erreur/404.html';;
		}


/*
$url = '';
if(isset($_GET['url'])) {
    $url = explode('/', $_GET['url']);
}

if($url == ''){
    echo"page d'acceuil";
} 
elseif($url[0] == '/user/profil' AND !empty($url[1])) {
	include '/user/profil.php';
}elseif ($url == 'connection') {
	include 'connection.php';
}
else {
	include 'erreur/404.html';
}*/



