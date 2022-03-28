<?php
/**
 * 
 */
class Query
{

	//Count
	public static function count_query($table)
	{
		$req=class_bdd::connexion_bdd()->query("SELECT * FROM $table");
		$count=$req->rowCount();
		return $count;
	}

	// Count Prepare

	public static function count_prepare ($table,$key,$identifiant)
	{
		$req=class_bdd::connexion_bdd()->prepare("SELECT * FROM $table WHERE $identifiant=?");
		$req->execute(array($key));
		$data=$req->rowCount();
		return $data;
	}

	// affiche
	public static function affiche($table,$key,$identifiant)
	{
		$req=class_bdd::connexion_bdd()->prepare("SELECT * FROM $table WHERE id=?");
		$req->execute(array($key));
		$data=$req->fetch(PDO::FETCH_OBJ);
		return $data;
	
	}

	// votant
	public static function votant()
	{
		$req=class_bdd::connexion_bdd()->query("SELECT * FROM etudiant INNER JOIN vote ON etudiant.id=vote.id_etudiant");
			$data=$req->fetchAll(PDO::FETCH_OBJ);
			return $data;
	}

	// compte
	public static function compte()
	{
		$req=class_bdd::connexion_bdd()->query("SELECT * FROM etudiant INNER JOIN votant ON etudiant.id=votant.id_etudiant");
			$data=$req->fetchAll(PDO::FETCH_OBJ);
			return $data;
	}



	// lister
	public static function liste ($table)
	{
			$req=class_bdd::connexion_bdd()->query("SELECT * FROM $table ORDER BY id DESC");
			$data=$req->fetchAll(PDO::FETCH_OBJ);
			return $data;
	}

	// liste prepare
	public static function liste_prepare ($table,$key,$identifiant)
	{
		$req=class_bdd::connexion_bdd()->prepare("SELECT * FROM $table WHERE $identifiant=? ORDER BY id DESC");
		$req->execute(array($key));
		$data=$req->fetchAll(PDO::FETCH_OBJ);
		return $data;
	}


	// methode suppression
	public static function supprimer($table,$id)
	{
		$requette=class_bdd::connexion_bdd()->prepare("DELETE FROM $table WHERE id=?");
		$requette->execute(array($id));
	}

	// lancer election
	public static function lancer()
	{
		$requette=class_bdd::connexion_bdd()->prepare("UPDATE date_elction SET etat=? WHERE id=?");
        $requette->execute(array('1','1'));
          Fonctions::set_flash('Election lancée avec succès','success');
          header("Location:./");
	}

	// stopper  election
	public static function stopper()
	{
		$requette=class_bdd::connexion_bdd()->prepare("UPDATE date_elction SET etat=? WHERE id=?");
      $requette->execute(array('0','1'));
      Fonctions::set_flash('Election stoppé avec succès','success');
      header("Location:./");
	}

	// nombre de vote par candidat
	public static function vote_candidat()
	{
		$requette=class_bdd::connexion_bdd()->prepare("SELECT * FROM etudiant INNER JOIN vote ON etudiant.id=vote.id_etudiant WHERE id_candidat=?");
      	$requette->execute(array($_GET['id']));
      	$data=$requette->fetchAll(PDO::FETCH_OBJ);
		return $data;
	}

	// nombre de vote par candidat
	public static function count_vote_candidat($id)
	{
		$requette=class_bdd::connexion_bdd()->prepare("SELECT * FROM etudiant INNER JOIN vote ON etudiant.id=vote.id_etudiant WHERE id_candidat=?");
      	$requette->execute(array($id));
      	$data=$requette->rowCount();
		return $data;
	}







}