<?php
  
    // intialisation de la base de donnée
    require 'admin/php/bdd/bdd.php';
    require 'admin/php/Query.php';
    $bdd=class_bdd::connexion_bdd();
?>
<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<head>
  <meta charset="utf-8">
  <title>Election-unaf-Votes</title>
  <?php include("include/head.php"); ?>
</head>

<body>

  <div id="wrapper">
    <!-- toggle top area -->
    <?php include('include/contact.php'); ?>
    
    <!-- end header -->
     <?php include('include/title.php'); ?>
    <?php include('admin/include-admin/flash.php'); ?>
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="clearfix">
            </div>
              <?php
                // selection de tous les elves
                  $nbre_etudiant= Query::count_query('etudiant');

                // gestion de lancement de l'election
                  $requette8=$bdd->query("SELECT * FROM date_elction");
                  $lancement1=$requette8->fetch();
                  $lancement=$lancement1['etat'];

                // selection nombre de jours
                $requette6=$bdd->query("SELECT DATEDIFF(date_fin,date_comm) FROM date_elction WHERE id= 1");
                $nbre_jours=$requette6->fetch();
                // nbre de jours 
                $jour_total=intval($nbre_jours['DATEDIFF(date_fin,date_comm)']);

                // recherche jour passe 
                $requette7=$bdd->query("SELECT DATEDIFF(NOW(),date_comm) FROM date_elction WHERE id= 1");
                $jours_passe=$jour_Passe=$requette7->fetch();
                // jours passe
                $jours_passe=intval($jour_Passe['DATEDIFF(NOW(),date_comm)']);
                // nbre de jours restant
                $jours=$jour_total-$jours_passe;
              ?>
              <div id="info">
              <p style="margin-top: -40px; font-weight: bold; color: #f03b01; font-size: 15px;">Nombre de personne (<?=  $nbre_etudiant;?>)</p>
              <?php
              // pour dire que l'election est terminé
              if ($jours<=0): ?>
              <p style="margin-top: 15px; font-weight: bold; color: black; font-size: 15px;">L'éléction est terminée</p>
            <?php endif; ?>

            <?php if ($jours>0): ?>
              <p style="margin-top: 15px; font-weight: bold; color: black; font-size: 15px;">Nombre de jours restant (<?php echo $jours;?>)</p>
              <?php endif; ?>
            </div>
           <hr></hr>

             <div class="span12">
              <?php
                 // gestion elu
                // plus grand nombre de candidat
                  $requette18=$bdd->query("SELECT MAX(vote) FROM candidat");
                  $count=$requette18->rowCount();
                  $max=$requette18->fetch();
                  // recuperation des donne du candidat elu
                  $elu=$max['MAX(vote)'];
                  $requette19=$bdd->prepare("SELECT * FROM candidat WHERE vote=?");
                  $requette19->execute(array($elu));
                  $info=$requette19->fetch();
                   $count=$requette19->rowCount();
                 if ($jours<=0 AND  $count==1) {
                  
              ?>
                <div class="wrapper">
                  <div class="testimonial">
                    <p class="text" style="color: #f03a00;">
                      <i class="icon-quote-left icon-48"></i> L'élection est terminée 
                    </p>
                    <div class="author">
                      
                      <img src="admin/candidat/photo/<?php echo $info['photo']; ?>" class="img-circle bordered" width="60" alt="" />
                      <p class="name" style="color: red; font-weight: bold;">
                        <?php echo $info['prenom']."    ".$info['nom']; ?>
                      </p>
                      <span class="info">Elu (e) Président (e)</span> |  
                      <span style="color: red;"><?php if($elu>1){echo $elu."  votes";}else{echo $elu."  vote";} ?> |  <?= number_format($elu*100/$nbre_etudiant,2) ?> % </span>

                    </div>
                  </div>
                </div>
              </div>
            <?php }elseif($jours==0 AND  $count>1){ 
              ?>
              <div class="wrapper">
                  <div class="testimonial">
                    <p class="text" style="color: black;">
                      <i class="icon-quote-left icon-48"></i> L'élection est terminée 
                    </p>
                    <h3 style="color: #f03a00; font-weight: bold;">Deuxième Tours</h3>
                  </div>
                </div>
              <?php  } ?>

          </div>
        </div>
        <center>
        <div class="row">
          <div class="span12">
            <h4 style="font-weight: bold;">Les candidats</h4>
          </div>
          <?php

            // selection des candidats
            $requette=$bdd->query("SELECT * FROM candidat ORDER BY id ASC");
            while ($candidat=$requette->fetch()) {
              // verifier nombre de vois
              $requette1=$bdd->prepare("SELECT * FROM vote WHERE id_candidat=?");
              $requette1->execute(array($candidat['id']));
              $nbre_vote=$requette1->rowCount();
          ?>
          <div class="span3" style="border: 1px solid black; padding: 15px;" id ="vote">
                <img src="admin/candidat/photo/<?php echo $candidat['photo']; ?>" alt="" class="img-polaroid" />
                 <center> <h5 style=" text-align: center; font-weight: bold;" ><?php echo $candidat['prenom']."  ".$candidat['nom'];; ?></h5></center>
              <h6 class="alert alert-info" style="font-size: 24px; color: #f03b01;"> <center> <b style="color: black;"><?php echo $nbre_vote; ?> </b> <?php if($nbre_vote>1){echo "Votes";}else{echo "Vote";} ?> | <span style="color: blue;"><?= number_format($nbre_vote*100/$nbre_etudiant,2) ?> %</span> </center> </h6>
            <div class="roles">
              <hr/>
            </div>
          </div>
          <hr></hr>
        <?php } ?>
        </div>
        </div>
          </div>
        </div>
      </div>
    </section>
    </div>
    <?php
      if (isset($_POST['vote'])) {
        // verifie si cette personne a deja vote
        $requette=$bdd->prepare("SELECT * FROM vote WHERE id_etudiant=?");
        $requette->execute(array($_SESSION['id']));
        $verif=$requette->rowCount();
        if ($verif==0) {
          // inserer le vote
          $requette=$bdd->prepare("INSERT INTO vote(id_candidat,id_etudiant,date_vote) VALUES(?,?,NOW())");
          $requette->execute(array($_POST['id'],$_SESSION['id']));

           $requette10=$bdd->prepare("SELECT * FROM candidat WHERE id=?");
           $requette10->execute(array($_POST['id']));
           $vote=$requette10->fetch();
           $vote=$vote['vote'];
           // modifier
           $requette=$bdd->prepare("UPDATE candidat SET vote=? WHERE id=?");
            $requette->execute(array($vote+1,$_POST['id']));
            echo $vote;
            Fonctions::set_flash('Vote éffectuée evec succès','success');
           header("location:vote.php");

        }
        else
        {
          Fonctions::set_flash('Vous avez dejà voté','danger');
        }
      }
    ?>
  </div>
  <a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-32 active"></i></a>

    <script type="text/javascript">
        setInterval('load_message()',500);
        function load_message()
        {
            $('#id').load('#id');
        }
  </script>
  <!-- javascript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  
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
<style type="text/css">
  #info p
  {
    display: inline-block;
    margin-right: 50px;
  }

  #info
  {
    margin-top: -40px;
  }

</style>
