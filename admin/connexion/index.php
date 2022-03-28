<?php include('../include-admin/header_login_register.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="../css/styles.css" rel="stylesheet">
    <meta charset="utf-8">
  </head>
  <body class="login-bg">
  	<?php include('../include-admin/title_login_register.php'); ?>

	<div class="page-content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
			            	<?php include('../include-admin/flash.php'); ?>
			                <h6> <i class="glyphicon glyphicon-lock"></i> Identifiez-vous</h6>
	                        <form action="" method="POST">
		                        <input class="form-control" name="username" type="text" placeholder="Votre mom d'utilisateur" value="<?php if(isset($_POST['username'])){echo $_POST['username'];} ?>" required>

				                <input class="form-control" name="mdp1" type="password" placeholder="Password">

				                <button class="btn btn-primary btn-block" type="submit" name="connexion"><b><i class="glyphicon glyphicon-lock"></i> S'identifier</b></button>
				                <div class="action">
				                </div>   
	                        </form>

	                        <?php
				              // connexion...
				              if (isset($_POST['connexion'])) {
				              	require '../php/Votant.php';
			                    $votant=new votant('',$_POST['username'],$_POST['mdp1'],'');
			                    $votant->identifier();
				              }
				            ?>
			                
			                <div class="already" style="margin-top: -10px; font-weight: bold; ">
					            <a href="../compte/create.php" style="text-decoration: none;"><b> <i class="glyphicon glyphicon-plus"></i> Créer un compte</b></a> | 

					            <a href="../../" style="text-decoration: none;"><b> <i class="glyphicon glyphicon-home"></i> Acceuil</b></a>  
					        </div>        
			            </div>
			            
			        </div>
			    </div>
			</div>
		</div>
	</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/custom.js"></script>
  </body>
</html>