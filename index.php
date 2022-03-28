<?php
  require 'admin/php/bdd/bdd.php';
  require 'admin/php/Query.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Election-unaf-acceuil</title>
  <?php include("include/head.php"); ?>
</head>

<body>
<header>
      <div class="container">
        <!-- hidden top area toggle link -->
        <div id="header-hidden-link">
        </div>
        <!-- end toggle link -->
        <div class="row nomargin">
          <div class="span12">
            <div class="headnav">
             
            </div>

            <!-- end reset modal -->
          </div>
        </div>
        <div class="row">
          <div class="span4">
            <div class="logo">
              <h2 style=" font-weight: bold; color: #f03b01; margin-bottom: -7px; font-family: elephant; font-size: 30px;" ><i class="icon-globe"></i>ELEC-TRO</h2>
              <center><h1> Une autre façon de Voter</h1></center>
            </div>
          </div>
        </div>
      </div>
    </header>
  <div id="wrapper">
   <?php include('include/contact.php'); ?>
    
    <!-- end header -->
    <?php include('include/title.php'); ?>
    <section id="content">
      <div class="container">
        <div class="row">

          <div class="span8">
            <h2><b>BIENVENUE</b></h2>
            <p style="line-height: 30px; text-align: justify; ">
              Cher internaute,</br>
              Nous vous remercions de visiter le site Officiel d'elec-tro qui a pour objectif d’organiser les élections en ligne. Que ce soit votre premier contact avec nous ou que vous soyez un visiteur fréquent, je vous adresse un chaleureux accueil et j’espère que vous serez motiver à participer dans cette élection, vous aurez besoin de votre  identifiant pour créer un compte, et connecter avec votre nom d'utilisateur et votre mot de passe pour  avoir accès de voter le candidat de votre choix.
            </p>
            
          </br>
            <p>
              <button class="btn btn-primary"><a href="admin/compte/create.php" style="color: white;"><i class="icon-plus"></i>Créer un compte</a></button>

              <button class="btn btn-primary"><a href="admin/connexion/" style="color: white;"><i class="icon-user"></i>  IDENTIFIEZ-VOUS</a></button>

               <button class="btn btn-primary"><a href="vote_publique.php" style="color: white;"><i class="icon-user"></i>  Vote Public </a></button>
          </div>

          
          <div class="span4">
            <!-- start flexslider -->
            <h5>Les candidats</h5>
            <div class="flexslider">
              <ul class="slides">
                <?php 
                  $requette=class_bdd::connexion_bdd()->query("SELECT * FROM candidat WHERE nom!='Aucun'");
                  while ($candidat=$requette->fetch()) {
                ?>
                ?>
                <li>
                  <img src="admin/candidat/photo/<?= $candidat['photo'] ?>" alt=""/>
                  <center>
                    <h6 style="font-weight: bold;"><?= $candidat['prenom']."  ".$candidat['nom'] ?></h6></center>
                </li> 
              <?php } ?>
              </ul>
            </div>
            <!-- end flexslider -->
          </div>
        </div>
      </div>
    </section>
    <?php include("include/footer.php"); ?>
  </div>
  <a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-32 active"></i></a>

<script src="js/jquery.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/jcarousel/jquery.jcarousel.min.js"></script>
  <script src="js/jquery.fancybox.pack.js"></script>
  <script src="js/jquery.fancybox-media.js"></script>
  <script src="js/google-code-prettify/prettify.js"></script>
  <script src="js/portfolio/jquery.quicksand.js"></script>
  <script src="js/portfolio/setting.js"></script>
  <script src="js/jquery.flexslider.js"></script>
  <script src="js/jquery.nivo.slider.js"></script>
  <script src="js/modernizr.custom.js"></script>
  <script src="js/jquery.ba-cond.min.js"></script>
  <script src="js/jquery.slitslider.js"></script>
  <script src="js/animate.js"></script>

  <!-- Template Custom JavaScript File -->
  <script src="js/custom.js"></script>

</body>

</html>
