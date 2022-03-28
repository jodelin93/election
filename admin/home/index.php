<!DOCTYPE html>
<html>
  <head>
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="../css/styles.css" rel="stylesheet">
  </head>
  <body>
  	<?php include('../include-admin/header.php'); ?>
    <div class="page-content">
    	<div class="row">
      <?php include('../include-admin/flash.php'); ?>
    	<?php include('../include-admin/menu.php'); ?>

		  <div class="col-md-12">
		  	<div class="container-fuid">
          <div class="content-box-large">
            <div class="panel-heading">
              <h4 style="font-weight: bold;"> <i class="glyphicon glyphicon-home"></i> Acceuil</h4><hr/>
              </div>

               <?php
                    // gestion de lancement de l'election
                    $requette8=class_bdd::connexion_bdd()->query("SELECT * FROM date_elction");
                    $lancement1=$requette8->fetch();
                    $lancement=$lancement1['etat'];
                ?>

               <form action="" method="POST">
                 <button type="submit" name="<?php if($lancement1['etat']==0){echo "lancement";}else{echo "sttoper";}  ?>" class="btn btn-primary"><?php if($lancement1['etat']==0){echo "lancé";}else{echo "sttopé";}  ?></button>
              </form>

               <?php
                    // lancement election

                  if (isset($_POST['lancement'])) {
                     Query::lancer();
                  }
                  elseif(isset($_POST['sttoper']))
                  {
                     Query::stopper();
                  }
                  ?>
          </div>
		  </div>
		</div>
    </div>

   <?php include('../include-admin/footer.php'); ?>

      <link href="../vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <script src="../vendors/datatables/js/jquery.dataTables.min.js"></script>

    <script src="../vendors/datatables/dataTables.bootstrap.js"></script>

    <script src="../js/custom.js"></script>
    <script src="../js/tables.js"></script>
  </body>
  </body>
</html>