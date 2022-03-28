<!DOCTYPE html>
<html>
  <head>
    <title>Ajouter-candidat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="../css/styles.css" rel="stylesheet">

    <script src="../bootstrap/crop/jquery.min.js"></script>  
    <script src="../bootstrap/crop/bootstrap.min.js"></script>
    <script src="../bootstrap/crop/croppie.js"></script>
    <link rel="stylesheet" href="../bootstrap/crop/bootstrap.min.css" />
    <link rel="stylesheet" href="../bootstrap/crop/croppie.css" />

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
              <h4 style="font-weight: bold;"> <i class="glyphicon glyphicon-picture"></i> Ajouter une photo</h4><hr/>
              <a href="./">
                 
              </div>
            <div class="panel-body">
              <div class="container">
                <div class="panel panel-default">
                    <input type="file" name="upload_image" accept="image/png, image/jpeg, image/jpg" id="upload_image" class="btn btn-primary btn-block" />
                      <div id="uploaded_image"></div>
                  </div>
                </div>

                <div id="uploadimageModal" class="modal" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Redimentionnentde l'image</h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                            <div class="col-md-8 text-center">
                              <div id="image_demo" style="width:350px; margin-top:30px"></div>
                            </div>
                            <div class="col-md-4" style="padding-top:30px;">
                              <br />
                              <br />
                              <br/>
                              <button class="btn btn-success btn-lg crop_image" style="margin-top: -150px;"> <i class="glyphicon glyphicon-cut"></i> Rogner</button>
                          </div>
                        </div>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
          </div>
		  </div>
		</div>
    </div>

     <?php
      // inscription des etudiants
      if (isset($_POST['inscription'])) {
        require '../php/inscription.php';
        extract($_POST);
        $inscription=new Inscription($nom,$prenom,$identifiant);
        $inscription->ajouter();
      }
    ?>

   <?php include('../include-admin/footer.php'); ?>


<script>  
$(document).ready(function(){

  $image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:200,
      type:'square' //circle
    },
    boundary:{
      width:300,
      height:300
    }
  });

  $('#upload_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $.ajax({
        url:"../php/ulpoad/photo-candidat.php",
        type: "POST",
        data:{"image": response},
        success:function(data)
        {
          $('#uploadimageModal').modal('hide');
          $('#uploaded_image').html(data);
        }
      });
    })
  });

});  
</script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="../js/custom.js"></script>
  </body>
  </body>
</html>