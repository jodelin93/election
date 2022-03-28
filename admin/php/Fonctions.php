<?php

class Fonctions
{

	
	public static function set_flash($message,$type='info')
	{
		$_SESSION['notification']['message']=$message;
		$_SESSION['notification']['type']=$type;
	}

	// public static function utilisateur()
	// {
	// 	$requette=class_bdd::connexion_bdd()->prepare("SELECT * FROM etudinat INNER  WHERE id_user=?");
	// 	$requette->execute(array($_SESSION['id_utilisateur']));
	// 	$user=$requette->fetch(PDO::FETCH_OBJ);
	// 	return $user;
	// }


}