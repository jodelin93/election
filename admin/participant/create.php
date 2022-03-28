<?php ini_set('display_errors','1'); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Ajouter-participant</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="../css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
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
              <h4 style="font-weight: bold;"> <i class="glyphicon glyphicon-plus"></i> Ajouter un (e) participant (e)</h4><hr/>
              <a href="./">
                 <button class="btn btn-info"> <i class="glyphicon glyphicon-list"></i> <b>Liste des participants</b></button>
               </a><hr/>
                 
              </div>
            <div class="panel-body">
              <form class="form-horizontal" role="form" action="" method="POST">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Nom</label>
                <div class="col-sm-10">
                  <input type="text" name="nom" value="<?php if(isset($_POST['nom'])){echo $_POST['nom'];} ?>" class="form-control" id="inputEmail3" placeholder="Anizaire" required>
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Prénom</label>
                <div class="col-sm-10">
                  <input type="text" name="prenom" value="<?php if(isset($_POST['prenom'])){echo $_POST['prenom'];} ?>" class="form-control" id="inputEmail3" placeholder="Jacky" required>
                </div>
              </div>

           <!--     <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Identifiant</label>
                <div class="col-sm-10">
                  <input type="text" name="identifiant" value="<?php if(isset($_POST['identifiant'])){echo $_POST['identifiant'];} ?>" class="form-control" id="inputEmail3" placeholder="4879-98-89-9" required>
                </div>
              </div> -->

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" name="inscription" class="btn btn-primary btn-block"> <i class="glyphicon glyphicon-plus"></i> Ajouter</button>
                </div>
              </div>
            </form>
            </div>
          </div>
		  </div>
		</div>
    </div>

     <?php
      // inscription des etudiants
      if (isset($_POST['inscription'])) {

        $identifiant =rand(100,999)."-".rand(100,999);
        require '../php/Inscription.php';
        extract($_POST);
        $inscription=new Inscription($nom,$prenom,$identifiant);
        $inscription->ajouter();
      }
    ?>

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