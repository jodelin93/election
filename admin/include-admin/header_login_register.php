<?php
  ob_start();
  session_start();
  // fontion messge flash
  require '../php/Fonctions.php';
  // les requettes
  require '../php/Query.php';
  // if (!isset($_SESSION['id_utilisateur'])) {
  //   Fonctions::set_flash('Vous etes déconnecté  (e)','success');
  //   header("Location:../../");
  // }

  require '../php/bdd/bdd.php';

  // $user=Fonctions::utilisateur();
?>