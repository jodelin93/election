<!DOCTYPE html>
<html>
  <head>
    <title>Liste des Participant</title>
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
            <h4 style="font-weight: bold;"> <i class="glyphicon glyphicon-list"></i> Liste des participant (<?= Query::count_query('etudiant') ?>) </h4>
            <hr/>
					<a href="create.php">
            <button class="btn btn-primary btn-block"> <i class="glyphicon glyphicon-plus"></i> <b>Ajouter un (e) participant (e)</b></button>     
           </a><hr/>
				</div>
  				<div class="panel-body">
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead>
							<tr>
								<th style="color: red;">Prenom</th>
								<th style="color: red;">Nom</th>
								<th style="color: red;">Identifiant</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach(Query::liste('etudiant') as $participant):?>
							<tr class="odd gradeX">
								<td style="font-weight: bold;"><?= $participant->prenom ?></td>
								<td style="font-weight: bold;"><?= $participant->nom ?></td>
								<td style="font-weight: bold;"><?= $participant->cin ?></td>
								<td class="center"> 
                  <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                      Action <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="edit.php?id=<?= $participant->id ?>"> <i class="glyphicon glyphicon-edit"></i> Modifier</a></li>
                      <li><a href="#<?= $participant->id ?>"  role="button" data-toggle="modal"> <i class="glyphicon glyphicon-trash"></i>  Supprimer</a></li>
                    </ul>
                    <?php include('destroy.php'); ?>
                  </div> 
                </td>
							<?php endforeach; ?>

							</tr>

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
</html>