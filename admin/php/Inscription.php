<?php
/**
 * 
 */
class Inscription
{
	private $nom;
	private $prenom;
	private $cin;

	
	function __construct($nom,$prenom,$cin)
	{
		$nom=ucfirst(htmlspecialchars($nom));
		$prenom=ucfirst(htmlspecialchars($prenom));
		$cin=htmlspecialchars($cin);
		// initialisation,,,
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->cin=$cin;
		$this->bdd=class_bdd::connexion_bdd();
	}

	// ajouter etudiant
	public function ajouter()
	{
		if (!empty($this->nom) AND !empty($this->prenom) AND !empty($this->cin)) {
				$requette=$this->bdd->prepare("SELECT * FROM etudiant WHERE cin=?");
				$requette->execute(array($this->cin));
				$etudiant=$requette->fetch();
				$identifier=$requette->rowCount();
				if ($identifier==0) {
					$requette=$this->bdd->prepare("INSERT INTO etudiant (nom,prenom,cin) VALUES (?,?,?)");
					$requette->execute(array($this->nom,$this->prenom,$this->cin));

					Fonctions::set_flash('Enregistrement éffectué avec succès','success');
					header("Location:create.php");
				}
				else
				{
					Fonctions::set_flash('Cet etudiant est déjà dans la liste','danger');
					header("Location:create.php");
				}
		}
		else
		{
			Fonctions::set_flash('Vous devez remplir tous les champs','danger');
			header("Location:create.php");
		}
		
	}

	public function modifier($id)
	{
		// verification si on clique sur la le nom
			if (isset($this->nom)) {
				// modificaton du nom
				$requette=$this->bdd->prepare("UPDATE etudiant SET nom=? WHERE id=?");
				$requette->execute(array($this->nom,$id));
				Fonctions::set_flash('Modificaton éffectuée avec succès','success');
				header("Location:./");
			}

			// verification si on clique sur la le prenom
			if (isset($this->prenom)) {
				// modificaton du prenom
				$requette=$this->bdd->prepare("UPDATE etudiant SET prenom=? WHERE id=?");
				$requette->execute(array($this->prenom,$id));
				Fonctions::set_flash('Modificaton éffectuée avec succès','success');
				header("Location:./");
			}

			// verification si on clique sur la le cin
			if (isset($this->cin)) {
				// modificaton du cin
				$requette=$this->bdd->prepare("UPDATE etudiant SET cin=? WHERE id=?");
				$requette->execute(array($this->cin,$id));
				Fonctions::set_flash('Modificaton éffectuée avec succès','success');
				header("Location:./");
			}
	}
}