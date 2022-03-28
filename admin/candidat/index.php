<!DOCTYPE html>
<html>
  <head>
    <title>Votant</title>
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
					<h4 style="font-weight: bold;"> <i class="glyphicon glyphicon-user"></i> Candidats</h4>
				</div>
  				<div class="panel-body">
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead>
							<tr>
								<th style="color: red; text-align: center;">Candidat</th>
                <th style="color: red; text-align: center;">Quantité de vote</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach(Query::liste('candidat') as $candidat):?>
							<tr class="odd gradeX">
								<td style="font-weight: bold;"><a href="candidat.php?id=<?= $candidat->id ?>">
                  <div class="col-md-6"><center>
                     <img src="photo/<?= $candidat->photo?>" class="img-circle" style="width: 100px;"></center>
                  </div>
                  <div class="col-md-6">
                    <center>
                    <h4><?= $candidat->prenom ?>  <?= $candidat->nom ?></h4></center>
                  </div>
                 


                 </a></td>
								<td style="font-weight: bold;"><a href=""><h4><?= Query::count_vote_candidat($candidat->id); ?></h4></a></td>
							</tr>
              <?php endforeach; ?>

						</tbody>
					</table>
  				</div>
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