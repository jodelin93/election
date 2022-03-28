<?php

	class class_bdd
	{
		public static $pdo;
		//connexion a la base de donnee
		public static function connexion_bdd()
		{
			try
			{
					if (self::$pdo===null) {
						$pdo=new PDO('mysql:host=localhost;dbname=election','root','jodelin');
						// $pdo=new PDO('mysql:host=localhost;dbname=recidp','root','jjcommunication');
						$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
						self::$pdo=$pdo;
					}
					return self::$pdo;
			}
			catch(Exception $PDO)
			{
				echo "erreur de connexion à la base de donnée";
			}
		}

	}

?>