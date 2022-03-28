<?php
  require 'admin/php/Fonctions.php';
  // les requettes
  require 'admin/php/Query.php';
  session_start();
  if(!isset($_SESSION['id'])) {
    Fonctions::set_flash("Vous devez êtes déconnecté (e) pour voir cette page",'warning');
    header("Location:admin/connexion/");
}
  // chargement de la classe
  require'autoloader.php';
  // intialisation de la base de donnée
  require 'admin/php/bdd/bdd.php';
  $bdd=class_bdd::connexion_bdd();
?>
<header>
      <div class="container">
        <!-- hidden top area toggle link -->
        <div id="header-hidden-link">
          <a href="#" class="toggle-link" title="Click me you'll get a surprise" data-target=".hidden-top"><i></i>Open</a>
        </div>
        <!-- end toggle link -->
        <div class="row nomargin">
          <div class="span12">
            <div class="headnav">
              <ul>
                <?php
                  if (isset($_SESSION['id']) AND $_SESSION['droit']=='1') {
                ?>
                <li><a href="./admin/home" data-toggle="modal"><i class="icon-user"></i>Administration</a></li>
              <?php } ?>
                <?php
                  if (isset($_SESSION['id'])) { 
                ?>
                  <li><a href="admin/php/deconnexion.php"><i class="icon-signout"></i> Déconnexion</a></li>
                <?php } ?>
              </ul>
            </div>

            <!-- end reset modal -->
          </div>
        </div>
        <div class="row">
          <div class="span4">
            <div class="logo">
              <h2 style=" font-weight: bold; color: #f03b01; margin-bottom: -7px; font-family: elephant; font-size: 30px;" ><i class="icon-globe"></i>ELEC-TRO</h2>
              <center><h1>Une autre façon de Voter</h1></center>
            </div>
          </div>
        </div>
      </div>
    </header>
    <style type="text/css">
      .ul li
      {
        float: left;
        margin-right: 40px;
        list-style-type: none;
      }
    </style>