<?php
		//auto-localisation http/https ou autre
			if (!empty($_SERVER['HTTP_HOST']) AND !empty($_SERVER['REQUEST_URI'] AND !empty($_SERVER['REQUEST_SCHEME']))) {
                $link = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST']."".$_SERVER['REQUEST_URI'];
			} else {
                echo "Ereure lors de la localisation (les variables SERVER['REQUEST_URI'] SERVER['HTTP_HOST'] n'existe pas )";
            }
		session_start();
		//début première partie routeur
			$url ='';
			if (isset($_GET['url'])) {
				$url = $_GET['url'];
			}

			if ($url == '') {
				
			}
			//instalation
			elseif (preg_match('#install/url-Rewrite#', $url)) {
			
				$_SESSION['veriferewite'] = sha1('PB2Vyq7qK439tmh2E');
				echo "<script type='text/javascript'>document.location.replace('../?ins=3');</script>";
			} elseif (preg_match('#url-Rewrite#', $url)) {
			
				$_SESSION['veriferewite'] = sha1('PB2Vyq7qK439tmh2E');
				echo "<script type='text/javascript'>document.location.replace('../?ins=3');</script>";
			}
		//début seconde partire routeur
			require'sql.php';

			if (preg_match('#user-([0-9A-Za-z-_]+)=Paramètre_profil=([A-Za-z-_]+)([0-9]+)#', $url, $params)) {
				$get = htmlspecialchars($params[1]);
				if (ctype_digit($get)) {
		  			if (!empty($_SESSION)) {
		  				if ($get == $_SESSION['id']) {			
		 					if ($params[2] == 'ajout_matiere-'and !empty($params[3])) {
		 						$ajout['matiere'] = 'true';
		 						$idprofil = $get;
								require 'user/edit/index.php';
		 					}elseif ($params[2] == 'supprimer_matiere-'and !empty($params[3])) {
								$idprofil = $_SESSION['id'];
				 				$supprimer['matiere'] = $params[3] ;
								require 'user/edit/index.php';
							} else {			
								include 'erreur/404.php';
							}


			  			} else {
			  				include 'erreur/acces.html';
			  			}
			  		} else {
			  			print_r($_SESSION['id']);
			  			include 'erreur/acces.html';	
			  		}
		  		} else { 			
		  			$getname = str_replace("_", " ", $get);
			  		if (!empty($_SESSION)) {
			  			if ($getname == $_SESSION['pseudo']) {
			  				if ($params[2] == 'ajout_matiere-'and !empty($params[3])) {			
				 				$idprofil = $_SESSION['id'];
				 				$ajout['matiere'] = 'true';
								require 'user/edit/index.php';
							}elseif ($params[2] == 'supprimer_matiere-'and !empty($params[3])) {
								$idprofil = $_SESSION['id'];
				 				$supprimer['matiere'] = $params[3] ;
								require 'user/edit/index.php';
							}
							else {			
								include 'erreur/404.php';
							}
			  			} else {
			  				include 'erreur/acces.php';
			  			}
			  		} else {
			  			include 'erreur/acces.php';	
			  		}
				}
		  	} elseif (preg_match('#user-([0-9A-Za-z-_]+)=Paramètre_profil#', $url, $params)) {
				$get = htmlspecialchars($params[1]);
				if (ctype_digit($get)) {
		  			if (!empty($_SESSION)) {
		  				if ($get == $_SESSION['id']) {			
		 					$idprofil = $get;
		 					$ajout['matiere'] = 'false';
							require 'user/edit/index.php';

			  			} else {
			  				include 'erreur/acces.html';
			  			}
			  		} else {
			  			print_r($_SESSION['id']);
			  			include 'erreur/acces.html';	
			  		}
		  		} else { 			
		  			$getname = str_replace("_", " ", $get);
			  		if (!empty($_SESSION)) {
			  			if ($getname == $_SESSION['pseudo']) {			
			 				$idprofil = $_SESSION['id'];
			 				$ajout['matiere'] = 'false';
							require 'user/edit/index.php';

			  			} else {
			  				include 'erreur/acces.php';
			  			}
			  		} else {
			  			include 'erreur/acces.php';	
			  		}
				}
		  	}
			// profil
			elseif (preg_match('#user-([0-9A-Za-z-_]+)#', $url, $params)) {
				$get = htmlspecialchars($params[1]);
				if (ctype_digit($get)) {
		  			if (!empty($_SESSION)) {
		  				if ($get == $_SESSION['id']) {			
		 					$idprofil = $get;
							require 'user/index.php';

			  			} else {
			  				include 'erreur/acces.html';
			  			}
			  		} else {
			  			print_r($_SESSION['id']);
			  			include 'erreur/acces.html';	
			  		}
		  		} else { 			
		  			$getname = str_replace("_", " ", $get);
			  		if (!empty($_SESSION)) {
			  			if ($getname == $_SESSION['pseudo']) {			
			 				$idprofil = $_SESSION['id'];
							require 'user/index.php';

			  			} else {

			  				include 'erreur/acces.php';
			  			}
			  		} else {
			  			include 'erreur/acces.php';	
			  		}
				}
		  	} // déconnect
			elseif (preg_match('#deconnection#', $url)) {
				require 'deconnect.php';
			}elseif (preg_match('#connection#', $url)) {
				require 'connection.php';
			}
			// agenda
			elseif (preg_match('#user/agenda-([0-9]+)=supprimer-([0-9]+)#', $url, $params)) {
				if (!empty($_SESSION['id'])) {
					if ($params[1] == $_SESSION['id']) {
						$supprimer = $params[2];
						include 'user/agendat/index.php';
					} else {
						include 'erreur/acces.php';
					}
				} 

			}elseif (preg_match('#user/agenda-([0-9]+)=ajout-([0-9]+)#', $url, $params)) {
				if (!empty($_SESSION['id'])) {
					if ($params[1] == $_SESSION['id']) {
						$ajout = $params[2];
						include 'user/agendat/index.php';
					} else {
						include 'erreur/acces.php';
					}
				} else {
					include 'erreur/acces.php';
				}
			} elseif (preg_match('#user/agenda-([0-9]+)#', $url, $params)) {
				if (!empty($_SESSION['id'])) {
					if ($params[1] == $_SESSION['id']) {
						include 'user/agendat/index.php';
					} else {
						include 'erreur/acces.php';
					}
				} else {
					include 'erreur/acces.php';
				}
			} // fin
			elseif (preg_match('#icon#', $url)) {
				include 'picture/logo1.png';
			} 
			//page 404 erreur
			else {			
					include 'erreur/404.php';
			}



