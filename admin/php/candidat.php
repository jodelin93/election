<?php
/**
 * 
 */
class candidat
{
	private $nom;
	private $prenom;
	private $photo;
	private $programme;


	
	function __construct($nom,$prenom,$photo,$programme)
	{
		$nom=htmlspecialchars($nom);
		$prenom=htmlspecialchars($prenom);
		$photo=htmlspecialchars($photo);
		$programme=htmlspecialchars($programme);

		// initialisation,,,
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->photo=$photo;
		$this->programme=$programme;
		$this->bdd=class_bdd::connexion_bdd();
	}

	// ajouter etudiant
	public function ajouter()
	{
			$requette=$this->bdd->prepare("INSERT INTO candidat (nom,prenom,photo,programme) VALUES (?,?,?,?)");
			$requette->execute(array($this->nom,$this->prenom,$this->photo,$this->programme));
			header("Location:vote.php");
	}
}