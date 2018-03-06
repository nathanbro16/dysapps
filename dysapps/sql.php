<?php

								define( "DB_NAME", "dysapps" );
								define( "DB_USER", "root" );
								define( "DB_PASSWORD", "" );
								define( "DB_HOST", "127.0.0.1" );
								define( "DB_prefix", "dy_");


								$bdd = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME."", DB_USER, DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

								?>