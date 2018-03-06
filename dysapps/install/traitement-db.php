<?php
$fichier = '../sql.php';
if (isset($_POST['validDB'])) {
	if (!empty($_POST['default'])) {
		if (!empty($_POST['DBmdp'])) {
						//constante
							define( 'DB_NAME', 'dysapps' );
							define( 'DB_USER', 'root' );
							define( 'DB_PASSWORD', $_POST['DBmdp'] );
							define( 'DB_HOST', '127.0.0.1' );
							define( 'DB_prefix', 'DY_');
						//verif connection
							try
							{
							$PDOcreate = new PDO('mysql:host='.DB_HOST, DB_USER, DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

							}
							catch (Exception $e)
							{
								define('non', '<span class="badge badge-danger"> Erreur !</span><br />');
								?><div class="alert alert-danger col-sm"><?php

									echo 'Connection basse de donner : ' . non ;
				    				die('Erreur : ' . utf8_encode($e->getMessage()));
				    			
				    			?></div>
				    			<?php

							}
							$requete = "CREATE DATABASE IF NOT EXISTS `".DB_NAME."` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
							$PDOcreate->prepare($requete)->execute();
						//create and definitions in tables
							$PDOcreatetable = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
							//Create tables
								$requete = "CREATE TABLE IF NOT EXISTS ".DB_prefix."agendat (
									  `id` int(11) NOT NULL,
									  `matiere` mediumtext NOT NULL,
									  `jour` date NOT NULL,
									  `tache` text NOT NULL,
									  `iduser` int(11) NOT NULL,
									  `typeid` int(11) NOT NULL
									) ENGINE=InnoDB DEFAULT CHARSET=utf8;";			
								$PDOcreatetable->prepare($requete)->execute();
								
								$requete = "CREATE TABLE IF NOT EXISTS ".DB_prefix."matiere (
								  `id` int(11) NOT NULL,
								  `matiere` text NOT NULL,
								  `iduser` int(11) NOT NULL
								) ENGINE=InnoDB DEFAULT CHARSET=utf8;";			
								$PDOcreatetable->prepare($requete)->execute();
								
								$requete = "CREATE TABLE IF NOT EXISTS ".DB_prefix."membres (
								  `id` int(11) NOT NULL,
								  `pseudo` varchar(255) NOT NULL,
								  `motdepasse` text NOT NULL
								) ENGINE=InnoDB DEFAULT CHARSET=utf8;";			
								$PDOcreatetable->prepare($requete)->execute();
							//KEY pour les tables
								$requete = "ALTER TABLE ".DB_prefix."agendat
								  ADD PRIMARY KEY (`id`),
								  ADD KEY `iduser` (`iduser`);";			
								$PDOcreatetable->prepare($requete)->execute();
						
								$requete = "ALTER TABLE ".DB_prefix."matiere
								  ADD PRIMARY KEY (`id`),
								  ADD KEY `iduser` (`iduser`);";			
								$PDOcreatetable->prepare($requete)->execute();

								$requete = "ALTER TABLE ".DB_prefix."membres
			  						ADD PRIMARY KEY (`id`);";			
								$PDOcreatetable->prepare($requete)->execute();
							//AUTO_INCREMENT pour les tables
								$requete = "ALTER TABLE ".DB_prefix."agendat
			  						MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";			
								$PDOcreatetable->prepare($requete)->execute();

								$requete = "ALTER TABLE ".DB_prefix."matiere
			  						MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";			
								$PDOcreatetable->prepare($requete)->execute();

								$requete = "ALTER TABLE ".DB_prefix."membres
			  						MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";			
								$PDOcreatetable->prepare($requete)->execute();
							//INDEX pour les tables
								$requete = "ALTER TABLE ".DB_prefix."agendat ADD FOREIGN KEY (`iduser`) REFERENCES ".DB_prefix."membres(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; ";
								$PDOcreatetable->prepare($requete)->execute();

								$requete = "ALTER TABLE ".DB_prefix."matiere ADD FOREIGN KEY (`iduser`) REFERENCES ".DB_prefix."membres(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; ";			
								$PDOcreatetable->prepare($requete)->execute();
						// le texte que l'on va mettre dans le config.php
							
							$texte = '<?php

							define( "DB_NAME", "'.DB_NAME.'" );
							define( "DB_USER", "'.DB_USER.'" );
							define( "DB_PASSWORD", "'.DB_PASSWORD.'" );
							define( "DB_HOST", "'.DB_HOST.'" );
							define( "DB_prefix", "'.DB_prefix.'");


							$bdd = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME."", DB_USER, DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
							?>';

							// on vérifie s'il est possible d'ouvrir le fichier

							if(fopen($fichier, 'W+') == FALSE) {

							exit('Impossible d\'ouvrir le fichier : <strong>'. $fichier .'</strong>.'. RETOUR);

							}


							// s'il est possible d'écrire dans le fichier alors on ne se gêne pas

							if(fwrite($ouvrir, $texte) == FALSE) {

							exit('Impossible d\'écrire dans le fichier : <strong>'. $fichier .'</strong>.'. RETOUR);

							}
							header("Location: ?ins=4");
		}else{
						//constante
							define( 'DB_NAME', 'dysapps' );
							define( 'DB_USER', 'root' );
							define( 'DB_PASSWORD', '' );
							define( 'DB_HOST', '127.0.0.1' );
							define( 'DB_prefix', 'DY_');
						//verif connection
							try
							{
							$PDOcreate = new PDO('mysql:host='.DB_HOST, DB_USER, DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

							}
							catch (Exception $e)
							{
								define('non', '<span class="badge badge-danger"> Erreur !</span><br />');
								?><div class="alert alert-danger col-sm"><?php

									echo 'Connection basse de donner : ' . non ;
				    				die('Erreur : ' . utf8_encode($e->getMessage()));
				    			
				    			?></div>
				    			<?php

							}
							$requete = "CREATE DATABASE IF NOT EXISTS `".DB_NAME."` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
							$PDOcreate->prepare($requete)->execute();
						//create and definitions in tables
							$PDOcreatetable = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
							//Create tables
								$requete = "CREATE TABLE IF NOT EXISTS ".DB_prefix."agendat (
									  `id` int(11) NOT NULL,
									  `matiere` mediumtext NOT NULL,
									  `jour` date NOT NULL,
									  `tache` text NOT NULL,
									  `iduser` int(11) NOT NULL,
									  `typeid` int(11) NOT NULL
									) ENGINE=InnoDB DEFAULT CHARSET=utf8;";			
								$PDOcreatetable->prepare($requete)->execute();
								
								$requete = "CREATE TABLE IF NOT EXISTS ".DB_prefix."matiere (
								  `id` int(11) NOT NULL,
								  `matiere` text NOT NULL,
								  `iduser` int(11) NOT NULL
								) ENGINE=InnoDB DEFAULT CHARSET=utf8;";			
								$PDOcreatetable->prepare($requete)->execute();
								
								$requete = "CREATE TABLE IF NOT EXISTS ".DB_prefix."membres (
								  `id` int(11) NOT NULL,
								  `pseudo` varchar(255) NOT NULL,
								  `motdepasse` text NOT NULL
								) ENGINE=InnoDB DEFAULT CHARSET=utf8;";			
								$PDOcreatetable->prepare($requete)->execute();
							//KEY pour les tables
								$requete = "ALTER TABLE ".DB_prefix."agendat
								  ADD PRIMARY KEY (`id`),
								  ADD KEY `iduser` (`iduser`);";			
								$PDOcreatetable->prepare($requete)->execute();
						
								$requete = "ALTER TABLE ".DB_prefix."matiere
								  ADD PRIMARY KEY (`id`),
								  ADD KEY `iduser` (`iduser`);";			
								$PDOcreatetable->prepare($requete)->execute();

								$requete = "ALTER TABLE ".DB_prefix."membres
			  						ADD PRIMARY KEY (`id`);";			
								$PDOcreatetable->prepare($requete)->execute();
							//AUTO_INCREMENT pour les tables
								$requete = "ALTER TABLE ".DB_prefix."agendat
			  						MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";			
								$PDOcreatetable->prepare($requete)->execute();

								$requete = "ALTER TABLE ".DB_prefix."matiere
			  						MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";			
								$PDOcreatetable->prepare($requete)->execute();

								$requete = "ALTER TABLE ".DB_prefix."membres
			  						MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";			
								$PDOcreatetable->prepare($requete)->execute();
							//INDEX pour les tables
								$requete = "ALTER TABLE ".DB_prefix."agendat ADD FOREIGN KEY (`iduser`) REFERENCES ".DB_prefix."membres(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; ";
								$PDOcreatetable->prepare($requete)->execute();

								$requete = "ALTER TABLE ".DB_prefix."matiere ADD FOREIGN KEY (`iduser`) REFERENCES ".DB_prefix."membres(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; ";			
								$PDOcreatetable->prepare($requete)->execute();
						// le texte que l'on va mettre dans le config.php
							
							$texte = '<?php

							define( "DB_NAME", "'.DB_NAME.'" );
							define( "DB_USER", "'.DB_USER.'" );
							define( "DB_PASSWORD", "'.DB_PASSWORD.'" );
							define( "DB_HOST", "'.DB_HOST.'" );
							define( "DB_prefix", "'.DB_prefix.'");


							$bdd = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME."", DB_USER, DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

							?>';

							// on vérifie s'il est possible d'ouvrir le fichier

							if(!$ouvrir = fopen($fichier, 'W+')) {

							exit('Impossible d\'ouvrir le fichier : <strong>'. $fichier .'</strong>.'. RETOUR);

							}


							// s'il est possible d'écrire dans le fichier alors on ne se gêne pas

							if(fwrite($ouvrir, $texte) == FALSE) {

							exit('Impossible d\'écrire dans le fichier : <strong>'. $fichier .'</strong>.'. RETOUR);

							}
							header("Location: ?ins=4");

		}
	} elseif (!empty($_POST['DBadresse'])) { 

		if (!empty($_POST['DBuser'])) {

			if (!empty($_POST['DBprefix'])) {
				if (preg_match('#([A-Za-z-0-9]+)_#', $_POST['DBprefix'])) {
					$prefix = $_POST['DBprefix'];

					if (!empty($_POST['DBmdp'])) {

						if (!empty($_POST['DBname'])) {
							//constante
								define( 'DB_NAME', $_POST['DBname'] );
								define( 'DB_USER', $_POST['DBuser'] );
								define( 'DB_PASSWORD', $_POST['DBmdp'] );
								define( 'DB_HOST', $_POST['DBadresse'] );
								define( 'DB_prefix', $prefix);
							//verif connection
								try
								{
								$PDOcreate = new PDO('mysql:host='.DB_HOST, DB_USER, DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

								}
								catch (Exception $e)
								{
									define('non', '<span class="badge badge-danger"> Erreur !</span><br />');
									?><div class="alert alert-danger col-sm"><?php

										echo 'Connection basse de donner : ' . non ;
					    				die('Erreur : ' . utf8_encode($e->getMessage()));
					    			
					    			?></div>
					    			<?php

								}
								$requete = "CREATE DATABASE IF NOT EXISTS `".DB_NAME."` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
								$PDOcreate->prepare($requete)->execute();
							//create and definitions in tables
								$PDOcreatetable = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
								//Create tables
									$requete = "CREATE TABLE IF NOT EXISTS ".DB_prefix."agendat (
										  `id` int(11) NOT NULL,
										  `matiere` mediumtext NOT NULL,
										  `jour` date NOT NULL,
										  `tache` text NOT NULL,
										  `iduser` int(11) NOT NULL,
										  `typeid` int(11) NOT NULL
										) ENGINE=InnoDB DEFAULT CHARSET=utf8;";			
									$PDOcreatetable->prepare($requete)->execute();
									
									$requete = "CREATE TABLE IF NOT EXISTS ".DB_prefix."matiere (
									  `id` int(11) NOT NULL,
									  `matiere` text NOT NULL,
									  `iduser` int(11) NOT NULL
									) ENGINE=InnoDB DEFAULT CHARSET=utf8;";			
									$PDOcreatetable->prepare($requete)->execute();
									
									$requete = "CREATE TABLE IF NOT EXISTS ".DB_prefix."membres (
									  `id` int(11) NOT NULL,
									  `pseudo` varchar(255) NOT NULL,
									  `motdepasse` text NOT NULL
									) ENGINE=InnoDB DEFAULT CHARSET=utf8;";			
									$PDOcreatetable->prepare($requete)->execute();
								//KEY pour les tables
									$requete = "ALTER TABLE ".DB_prefix."agendat
									  ADD PRIMARY KEY (`id`),
									  ADD KEY `iduser` (`iduser`);";			
									$PDOcreatetable->prepare($requete)->execute();
							
									$requete = "ALTER TABLE ".DB_prefix."matiere
									  ADD PRIMARY KEY (`id`),
									  ADD KEY `iduser` (`iduser`);";			
									$PDOcreatetable->prepare($requete)->execute();

									$requete = "ALTER TABLE ".DB_prefix."membres
				  						ADD PRIMARY KEY (`id`);";			
									$PDOcreatetable->prepare($requete)->execute();
								//AUTO_INCREMENT pour les tables
									$requete = "ALTER TABLE ".DB_prefix."agendat
				  						MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";			
									$PDOcreatetable->prepare($requete)->execute();

									$requete = "ALTER TABLE ".DB_prefix."matiere
				  						MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";			
									$PDOcreatetable->prepare($requete)->execute();

									$requete = "ALTER TABLE ".DB_prefix."membres
				  						MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";			
									$PDOcreatetable->prepare($requete)->execute();
								//INDEX pour les tables
									$requete = "ALTER TABLE ".DB_prefix."agendat ADD FOREIGN KEY (`iduser`) REFERENCES ".DB_prefix."membres(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; ";
									$PDOcreatetable->prepare($requete)->execute();

									$requete = "ALTER TABLE ".DB_prefix."matiere ADD FOREIGN KEY (`iduser`) REFERENCES ".DB_prefix."membres(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; ";			
									$PDOcreatetable->prepare($requete)->execute();
							// le texte que l'on va mettre dans le config.php
								
								$texte = '<?php

								define( "DB_NAME", "'.DB_NAME.'" );
								define( "DB_USER", "'.DB_USER.'" );
								define( "DB_PASSWORD", "'.DB_PASSWORD.'" );
								define( "DB_HOST", "'.DB_HOST.'" );
								define( "DB_prefix", "'.DB_prefix.'");


								$bdd = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME."", DB_USER, DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

								?>';

								// on vérifie s'il est possible d'ouvrir le fichier

								if(!$ouvrir = fopen($fichier, 'w+')) {

								exit('Impossible d\'ouvrir le fichier : <strong>'. $fichier .'</strong>.'. RETOUR);

								}


								// s'il est possible d'écrire dans le fichier alors on ne se gêne pas

								if(fwrite($ouvrir, $texte) == FALSE) {

								exit('Impossible d\'écrire dans le fichier : <strong>'. $fichier .'</strong>.'. RETOUR);

								}
								header("Location: ?ins=4");

						}else{
							$ErreurDB = "Veuillez mettre le nom de la basse de donné.";				
						}

					}else{
						
						if (!empty($_POST['DBname'])) {
							
							//constante
								define( 'DB_NAME', $_POST['DBname'] );
								define( 'DB_USER', $_POST['DBuser'] );
								define( 'DB_PASSWORD', '' );
								define( 'DB_HOST', $_POST['DBadresse'] );
								define( 'DB_prefix', $prefix);
							//verif connection
								try
								{
								$PDOcreate = new PDO('mysql:host='.DB_HOST, DB_USER, DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

								}
								catch (Exception $e)
								{
									define('non', '<span class="badge badge-danger"> Erreur !</span><br />');
									?><div class="alert alert-danger col-sm"><?php

										echo 'Connection basse de donner : ' . non ;
					    				die('Erreur : ' . utf8_encode($e->getMessage()));
					    			
					    			?></div>
					    			<?php

								}
								$requete = "CREATE DATABASE IF NOT EXISTS `".DB_NAME."` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
								$PDOcreate->prepare($requete)->execute();
							//create and definitions in tables
								$PDOcreatetable = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
								//Create tables
									$requete = "CREATE TABLE IF NOT EXISTS ".DB_prefix."agendat (
										  `id` int(11) NOT NULL,
										  `matiere` mediumtext NOT NULL,
										  `jour` date NOT NULL,
										  `tache` text NOT NULL,
										  `iduser` int(11) NOT NULL,
										  `typeid` int(11) NOT NULL
										) ENGINE=InnoDB DEFAULT CHARSET=utf8;";			
									$PDOcreatetable->prepare($requete)->execute();
									
									$requete = "CREATE TABLE IF NOT EXISTS ".DB_prefix."matiere (
									  `id` int(11) NOT NULL,
									  `matiere` text NOT NULL,
									  `iduser` int(11) NOT NULL
									) ENGINE=InnoDB DEFAULT CHARSET=utf8;";			
									$PDOcreatetable->prepare($requete)->execute();
									
									$requete = "CREATE TABLE IF NOT EXISTS ".DB_prefix."membres (
									  `id` int(11) NOT NULL,
									  `pseudo` varchar(255) NOT NULL,
									  `motdepasse` text NOT NULL
									) ENGINE=InnoDB DEFAULT CHARSET=utf8;";			
									$PDOcreatetable->prepare($requete)->execute();
								//KEY pour les tables
									$requete = "ALTER TABLE ".DB_prefix."agendat
									  ADD PRIMARY KEY (`id`),
									  ADD KEY `iduser` (`iduser`);";			
									$PDOcreatetable->prepare($requete)->execute();
							
									$requete = "ALTER TABLE ".DB_prefix."matiere
									  ADD PRIMARY KEY (`id`),
									  ADD KEY `iduser` (`iduser`);";			
									$PDOcreatetable->prepare($requete)->execute();

									$requete = "ALTER TABLE ".DB_prefix."membres
				  						ADD PRIMARY KEY (`id`);";			
									$PDOcreatetable->prepare($requete)->execute();
								//AUTO_INCREMENT pour les tables
									$requete = "ALTER TABLE ".DB_prefix."agendat
				  						MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";			
									$PDOcreatetable->prepare($requete)->execute();

									$requete = "ALTER TABLE ".DB_prefix."matiere
				  						MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";			
									$PDOcreatetable->prepare($requete)->execute();

									$requete = "ALTER TABLE ".DB_prefix."membres
				  						MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";			
									$PDOcreatetable->prepare($requete)->execute();
								//INDEX pour les tables
									$requete = "ALTER TABLE ".DB_prefix."agendat ADD FOREIGN KEY (`iduser`) REFERENCES ".DB_prefix."membres(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; ";
									$PDOcreatetable->prepare($requete)->execute();

									$requete = "ALTER TABLE ".DB_prefix."matiere ADD FOREIGN KEY (`iduser`) REFERENCES ".DB_prefix."membres(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; ";			
									$PDOcreatetable->prepare($requete)->execute();
							// le texte que l'on va mettre dans le config.php
								
								$texte = '<?php

								define( "DB_NAME", "'.DB_NAME.'" );
								define( "DB_USER", "'.DB_USER.'" );
								define( "DB_PASSWORD", "'.DB_PASSWORD.'" );
								define( "DB_HOST", "'.DB_HOST.'" );
								define( "DB_prefix", "'.DB_prefix.'");


								$bdd = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME."", DB_USER, DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

								?>';

								// on vérifie s'il est possible d'ouvrir le fichier

								if(!$ouvrir = fopen($fichier, 'w+')) {

								exit('Impossible d\'ouvrir le fichier : <strong>'. $fichier .'</strong>.'. RETOUR);

								}


								// s'il est possible d'écrire dans le fichier alors on ne se gêne pas

								if(fwrite($ouvrir, $texte) == FALSE) {

								exit('Impossible d\'écrire dans le fichier : <strong>'. $fichier .'</strong>.'. RETOUR);

								}
								header("Location: ?ins=4");

						}else{

							
							$ErreurDB = "Veuillez mettre le nom de la basse de donné.";
						}
					}
				} elseif (preg_match('#([A-Za-z-0-9]+)#', $_POST['DBprefix'])) {
					$prefix = $_POST['DBprefix']."_";
					if (!empty($_POST['DBmdp'])) {

						if (!empty($_POST['DBname'])) {
							//constante
								define( 'DB_NAME', $_POST['DBname'] );
								define( 'DB_USER', $_POST['DBuser'] );
								define( 'DB_PASSWORD', $_POST['DBmdp'] );
								define( 'DB_HOST', $_POST['DBadresse'] );
								define( 'DB_prefix', $prefix);
							//verif connection
								try
								{
								$PDOcreate = new PDO('mysql:host='.DB_HOST, DB_USER, DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

								}
								catch (Exception $e)
								{
									define('non', '<span class="badge badge-danger"> Erreur !</span><br />');
									?><div class="alert alert-danger col-sm"><?php

										echo 'Connection basse de donner : ' . non ;
					    				die('Erreur : ' . utf8_encode($e->getMessage()));
					    			
					    			?></div>
					    			<?php

								}
								$requete = "CREATE DATABASE IF NOT EXISTS `".DB_NAME."` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
								$PDOcreate->prepare($requete)->execute();
							//create and definitions in tables
								$PDOcreatetable = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
								//Create tables
									$requete = "CREATE TABLE IF NOT EXISTS ".DB_prefix."agendat (
										  `id` int(11) NOT NULL,
										  `matiere` mediumtext NOT NULL,
										  `jour` date NOT NULL,
										  `tache` text NOT NULL,
										  `iduser` int(11) NOT NULL,
										  `typeid` int(11) NOT NULL
										) ENGINE=InnoDB DEFAULT CHARSET=utf8;";			
									$PDOcreatetable->prepare($requete)->execute();
									
									$requete = "CREATE TABLE IF NOT EXISTS ".DB_prefix."matiere (
									  `id` int(11) NOT NULL,
									  `matiere` text NOT NULL,
									  `iduser` int(11) NOT NULL
									) ENGINE=InnoDB DEFAULT CHARSET=utf8;";			
									$PDOcreatetable->prepare($requete)->execute();
									
									$requete = "CREATE TABLE IF NOT EXISTS ".DB_prefix."membres (
									  `id` int(11) NOT NULL,
									  `pseudo` varchar(255) NOT NULL,
									  `motdepasse` text NOT NULL
									) ENGINE=InnoDB DEFAULT CHARSET=utf8;";			
									$PDOcreatetable->prepare($requete)->execute();
								//KEY pour les tables
									$requete = "ALTER TABLE ".DB_prefix."agendat
									  ADD PRIMARY KEY (`id`),
									  ADD KEY `iduser` (`iduser`);";			
									$PDOcreatetable->prepare($requete)->execute();
							
									$requete = "ALTER TABLE ".DB_prefix."matiere
									  ADD PRIMARY KEY (`id`),
									  ADD KEY `iduser` (`iduser`);";			
									$PDOcreatetable->prepare($requete)->execute();

									$requete = "ALTER TABLE ".DB_prefix."membres
				  						ADD PRIMARY KEY (`id`);";			
									$PDOcreatetable->prepare($requete)->execute();
								//AUTO_INCREMENT pour les tables
									$requete = "ALTER TABLE ".DB_prefix."agendat
				  						MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";			
									$PDOcreatetable->prepare($requete)->execute();

									$requete = "ALTER TABLE ".DB_prefix."matiere
				  						MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";			
									$PDOcreatetable->prepare($requete)->execute();

									$requete = "ALTER TABLE ".DB_prefix."membres
				  						MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";			
									$PDOcreatetable->prepare($requete)->execute();
								//INDEX pour les tables
									$requete = "ALTER TABLE ".DB_prefix."agendat ADD FOREIGN KEY (`iduser`) REFERENCES ".DB_prefix."membres(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; ";
									$PDOcreatetable->prepare($requete)->execute();

									$requete = "ALTER TABLE ".DB_prefix."matiere ADD FOREIGN KEY (`iduser`) REFERENCES ".DB_prefix."membres(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; ";			
									$PDOcreatetable->prepare($requete)->execute();
							// le texte que l'on va mettre dans le config.php
								
								$texte = '<?php

								define( "DB_NAME", "'.DB_NAME.'" );
								define( "DB_USER", "'.DB_USER.'" );
								define( "DB_PASSWORD", "'.DB_PASSWORD.'" );
								define( "DB_HOST", "'.DB_HOST.'" );
								define( "DB_prefix", "'.DB_prefix.'");


								$bdd = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME."", DB_USER, DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

								?>';

								// on vérifie s'il est possible d'ouvrir le fichier

								if(!$ouvrir = fopen($fichier, 'w+')) {

								exit('Impossible d\'ouvrir le fichier : <strong>'. $fichier .'</strong>.'. RETOUR);

								}


								// s'il est possible d'écrire dans le fichier alors on ne se gêne pas

								if(fwrite($ouvrir, $texte) == FALSE) {

								exit('Impossible d\'écrire dans le fichier : <strong>'. $fichier .'</strong>.'. RETOUR);

								}
								header("Location: ?ins=4");

						}else{
							$ErreurDB = "Veuillez mettre le nom de la basse de donné.";				
						}

					}else{
						
						if (!empty($_POST['DBname'])) {
							
							//constante
								define( 'DB_NAME', $_POST['DBname'] );
								define( 'DB_USER', $_POST['DBuser'] );
								define( 'DB_PASSWORD', '' );
								define( 'DB_HOST', $_POST['DBadresse'] );
								define( 'DB_prefix', $prefix);
							//verif connection
								try
								{
								$PDOcreate = new PDO('mysql:host='.DB_HOST, DB_USER, DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

								}
								catch (Exception $e)
								{
									define('non', '<span class="badge badge-danger"> Erreur !</span><br />');
									?><div class="alert alert-danger col-sm"><?php

										echo 'Connection basse de donner : ' . non ;
					    				die('Erreur : ' . utf8_encode($e->getMessage()));
					    			
					    			?></div>
					    			<?php

								}
								$requete = "CREATE DATABASE IF NOT EXISTS `".DB_NAME."` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
								$PDOcreate->prepare($requete)->execute();
							//create and definitions in tables
								$PDOcreatetable = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
								//Create tables
									$requete = "CREATE TABLE IF NOT EXISTS ".DB_prefix."agendat (
										  `id` int(11) NOT NULL,
										  `matiere` mediumtext NOT NULL,
										  `jour` date NOT NULL,
										  `tache` text NOT NULL,
										  `iduser` int(11) NOT NULL,
										  `typeid` int(11) NOT NULL
										) ENGINE=InnoDB DEFAULT CHARSET=utf8;";			
									$PDOcreatetable->prepare($requete)->execute();
									
									$requete = "CREATE TABLE IF NOT EXISTS ".DB_prefix."matiere (
									  `id` int(11) NOT NULL,
									  `matiere` text NOT NULL,
									  `iduser` int(11) NOT NULL
									) ENGINE=InnoDB DEFAULT CHARSET=utf8;";			
									$PDOcreatetable->prepare($requete)->execute();
									
									$requete = "CREATE TABLE IF NOT EXISTS ".DB_prefix."membres (
									  `id` int(11) NOT NULL,
									  `pseudo` varchar(255) NOT NULL,
									  `motdepasse` text NOT NULL
									) ENGINE=InnoDB DEFAULT CHARSET=utf8;";			
									$PDOcreatetable->prepare($requete)->execute();
								//KEY pour les tables
									$requete = "ALTER TABLE ".DB_prefix."agendat
									  ADD PRIMARY KEY (`id`),
									  ADD KEY `iduser` (`iduser`);";			
									$PDOcreatetable->prepare($requete)->execute();
							
									$requete = "ALTER TABLE ".DB_prefix."matiere
									  ADD PRIMARY KEY (`id`),
									  ADD KEY `iduser` (`iduser`);";			
									$PDOcreatetable->prepare($requete)->execute();

									$requete = "ALTER TABLE ".DB_prefix."membres
				  						ADD PRIMARY KEY (`id`);";			
									$PDOcreatetable->prepare($requete)->execute();
								//AUTO_INCREMENT pour les tables
									$requete = "ALTER TABLE ".DB_prefix."agendat
				  						MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";			
									$PDOcreatetable->prepare($requete)->execute();

									$requete = "ALTER TABLE ".DB_prefix."matiere
				  						MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";			
									$PDOcreatetable->prepare($requete)->execute();

									$requete = "ALTER TABLE ".DB_prefix."membres
				  						MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";			
									$PDOcreatetable->prepare($requete)->execute();
								//INDEX pour les tables
									$requete = "ALTER TABLE ".DB_prefix."agendat ADD FOREIGN KEY (`iduser`) REFERENCES ".DB_prefix."membres(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; ";
									$PDOcreatetable->prepare($requete)->execute();

									$requete = "ALTER TABLE ".DB_prefix."matiere ADD FOREIGN KEY (`iduser`) REFERENCES ".DB_prefix."membres(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; ";			
									$PDOcreatetable->prepare($requete)->execute();
							// le texte que l'on va mettre dans le config.php
								
								$texte = '<?php

								define( "DB_NAME", "'.DB_NAME.'" );
								define( "DB_USER", "'.DB_USER.'" );
								define( "DB_PASSWORD", "'.DB_PASSWORD.'" );
								define( "DB_HOST", "'.DB_HOST.'" );
								define( "DB_prefix", "'.DB_prefix.'");


								$bdd = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME."", DB_USER, DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

								?>';


								// on vérifie s'il est possible d'ouvrir le fichier

								if(!$ouvrir = fopen($fichier, 'w+')) {

								exit('Impossible d\'ouvrir le fichier : <strong>'. $fichier .'</strong>.'. RETOUR);

								}


								// s'il est possible d'écrire dans le fichier alors on ne se gêne pas

								if(fwrite($ouvrir, $texte) == FALSE) {

								exit('Impossible d\'écrire dans le fichier : <strong>'. $fichier .'</strong>.'. RETOUR);

								}
								header("Location: ?ins=4");

						}else{

							$ErreurDB = "Veuillez mettre le nom de la basse de donné.";
						}
					}
				}else{
					$ErreurDB = "Les caractères pour le Préfix sont refusé.";
				}
			
			}else{
				
				$ErreurDB = "Veuillez mettre un Préfix.";
			}

		}else{
			$ErreurDB = "Veuillez mettre le nom d'utilisateur de la basse de donné.";
		}

	}else{
		$ErreurDB = "Veuillez mettre l'adresse de la basse de donné.";
	}
}