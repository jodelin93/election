<?php
  ob_start();
  session_start();
  // fontion messge flash
  require '../php/Fonctions.php';
  // les requettes
  require '../php/Query.php';
  if (!isset($_SESSION['id'])) {
    Fonctions::set_flash("Vous devez êtes déconnecté (e) pour voir cette page",'warning');
    header("Location:../connexion/");
  }

  require '../php/bdd/bdd.php';

  // $user=Fonctions::utilisateur();
?>

<div class="header" style="background-color: #f03a00; height: 100px; margin-bottom: 50px;">
     <div class="container">
        <div class="row">
           <div class="col-md-12">
              <!-- Logo -->
              <div class="logo" >
                 <a href="../home">
                   <h2 style=" font-weight: bold; margin-bottom: -7px; font-family: elephant; font-size: 30px; color: white;" ><img src="../images/icons8_Globe_26px.png" style="width: 30px;margin-top: -10px;">ELEC-TRO</h2>
                 </a>
                 <p style="color: white;
                 margin-top: 8px; margin-left: 33px;">Une autre façon de Voter

                <a href="../php/deconnexion.php" style="color: white;">
                   <h5 class="btn btn-primary" style="float: right;"> <i class="glyphicon glyphicon-user"></i> Déconnexion</h5>
                </a>
             	</p>
              </div>
           </div>
        </div>
     </div>
</div>
