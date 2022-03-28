<?php include('../include-admin/header_login_register.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Créer un compte</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="../css/styles.css" rel="stylesheet">
    <meta charset="utf-8">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
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
			                <h6> <i class="glyphicon glyphicon-user"></i> Créer un compte</h6>
	                        <form action="" method="POST">
		                        <input class="form-control" value="<?php if(isset($_POST['identifiant'])){echo $_POST['identifiant'];} ?>" name="identifiant" type="text" placeholder="Votre Identifiant" required>

		                        <input class="form-control" value="<?php if(isset($_POST['username'])){echo $_POST['username'];} ?>" name="username" type="text" placeholder="Votre nom d'utilisateur" required>


				                <input class="form-control" name="mdp1" type="password" placeholder="Entrer mot de passe" required>

				                <input class="form-control" type="password" name="mdp2" placeholder="Répeter votre mot de passe" required>

				                <button type="submit" name="creer" class="btn btn-primary btn-block"><b><i class="glyphicon glyphicon-plus"></i>  Créer Compte</b></button></br>
 
	                        </form>
			                
			                <div class="already" style="margin-top: -8px; font-weight: bold; ">
					            <a href="../connexion/"><b> <i class="glyphicon glyphicon-user"></i> Connectez-vous</b></a> |

					            <a href="../../" style="text-decoration: none;"><b> <i class="glyphicon glyphicon-home"></i> Acceuil</b></a> 
					        </div>        
			            </div>

			             <?php
			              // creation compte
			              if (isset($_POST['creer'])) {

			              	require '../php/Votant.php';
			                $votant=new votant($_POST['identifiant'],$_POST['username'],$_POST['mdp1'],$_POST['mdp2']);
			                $votant->ajouter();
			              }
			            ?>
			            
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