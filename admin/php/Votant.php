<?php

/**
 * 
 */
class votant
{
	private $cin;
	private $username;
	private $mdp1;
	private $mdp2;
	
	function __construct($cin,$username,$mdp1,$mdp2)
	{
		$cin=ucfirst(htmlspecialchars($cin));
		$username=htmlspecialchars($username);
		// $mdp=sha1($mdp);
		$mdp1=sha1($mdp1);
		$mdp2=sha1($mdp2);

		// initialisation...
		$this->cin=$cin;
		$this->username=$username;
		$this->mdp1=$mdp1;
		$this->mdp2=$mdp2;
		$this->bdd=class_bdd::connexion_bdd();
	}

	// ajouter un votant
	public function ajouter()
	{
		if (!empty($this->cin) AND !empty($this->username) AND !empty($this->mdp1) AND !empty($this->mdp2)) {
			// verification mot de passe
			if ($this->mdp1==$this->mdp2) {
				$requette=$this->bdd->prepare("SELECT * FROM etudiant WHERE cin=?");
				$requette->execute(array($this->cin));
				// identifier l'etudiant
				$identifier=$requette->rowCount();
				if ($identifier==1) {
					// selection des infos sur le votant
					$votant=$requette->fetch();
					$requette1=$this->bdd->prepare("SELECT * FROM votant WHERE id_etudiant=?");
					$requette1->execute(array($votant['id']));
					// verification si on a deja un compte
					$inscription_votant=$requette1->rowCount();
					if ($inscription_votant==0) {
						$requette=$this->bdd->prepare("INSERT INTO votant (id_etudiant,cin,username,mdp,droit) VALUES(?,?,?,?,?)");
						$requette->execute(array($votant['id'],$this->cin,$this->username,$this->mdp1,'0'));
						Fonctions::set_flash('votre compte a été creé avec succes','success');
						header("location:create.php");
					}
					else
					{
						Fonctions::set_flash('Ce compte existe déjà','warning');
						header("location:create.php");
					}
				}
				else
				{
					Fonctions::set_flash('Vous ne faites pas partir de liste autorisée','warning');
					header("location:create.php");
				}
			}
			else
			{
				Fonctions::set_flash('Les mots de passe ne sont pas identiques','danger');
				header("location:create.php");
			}	
		}
		else
		{
			Fonctions::set_flash('Vous devez remplir tous les champs','danger');
			header("location:create.php");
		}
	}

	// identifier...
	public function identifier()
	{
			// conexion...
			$requette=$this->bdd->prepare("SELECT * FROM votant WHERE username=? AND mdp=?");
			$requette->execute(array($this->username,$this->mdp1));
			$etudiant=$requette->fetch();
			$identifier=$requette->rowCount();
			if ($identifier==1) {
				// recuperation de l'etudiant
				$requette1=$this->bdd->prepare("SELECT * FROM etudiant WHERE id=?");
				$requette1->execute(array($etudiant['id_etudiant']));
				$profil_etudiant=$requette1->fetch();

				$profil_etudiant=$requette1->fetch();
				// recuperation des sessions 
				$_SESSION['id']=$etudiant['id_etudiant'];
				 $_SESSION['nom']=$profil_etudiant['nom'];
				 $_SESSION['prenom']=$profil_etudiant['prenom'];
				$_SESSION['username']=$etudiant['username'];
				$_SESSION['droit']=$etudiant['droit'];

				Fonctions::set_flash("Vous êtes connecté (e)",'success');
				header("location:../../vote.php");
			}
			else
			{
				Fonctions::set_flash("Nom d'utilisateur ou mot de passe incorrect",'danger');
				header("location:./");
			}
	}
}