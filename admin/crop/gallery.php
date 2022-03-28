
<!DOCTYPE html>
<html lang="en">
<?php include('../php/Photo.php'); ?>
<head>
  <title>Gallery</title>
  <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />


    <script src="../assets/crop/jquery.min.js"></script>  
    <script src="../assets/crop/bootstrap.min.js"></script>
    <script src="../assets/crop/croppie.js"></script>
    <link rel="stylesheet" href="../assets/crop/croppie.css" />


    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="../assets/css/jquery-ui.custom.min.css" />
    <link rel="stylesheet" href="../assets/css/jquery.gritter.min.css" />


    <!-- ace styles -->
    <link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
    <![endif]-->
    <link rel="stylesheet" href="../assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />
    <link rel="stylesheet" href="../assets/css/parsley.css" />
    

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>
  
  <!-- Fin -->
  <body class="no-skin">
    <!-- insertion de la page Block d'entete -->
    <?php include("../includes/header.php"); ?>
    <!-- Fin -->
    <div class="main-container ace-save-state" id="main-container">
      <script type="text/javascript">
        try{ace.settings.loadState('main-container')}catch(e){}
      </script>
      <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
        <script type="text/javascript">
          try{ace.settings.loadState('sidebar')}catch(e){}
        </script>
        </br></br>
        <!-- insertion de la page menu -->
        <?php   
          include("../includes/menu.php");
        ?>

      </div>
      <div class="main-content">
        <div class="main-content-inner">
          <?php include("../includes/parametre_nom.php");  ?>
          <div class="page-content">
            <div class="widget-header">
                <h4 class="widget-title" style="font-weight: bold; color: black;" > 
                  <center>
                     <img src="../assets/images/icon/icons8_Picture_26px.png"> Gallery
                  </center>
                </h4>
              </div></br>
              <?php  include('../includes/flash.php'); ?>

              <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <div class="widget-box">
                  <div class="widget-header widget-header-blue widget-header-flat">
                    <h4 class="widget-title lighter">Step 2</h4>
                  </div>


                  <div class="widget-body">
                    <div class="widget-main">
                      <div id="fuelux-wizard-container">

                        <div class="step-content pos-rel">


                          <div class="step-pane active" data-step="2">
                            

                            <div id="user-profile-1" class="user-profile row">
                              <div class="col-xs-12 col-sm-12 center">
                                <div>

                                  <?php 
                                    if (isset($_GET['id_projet'])) {
                                       $projet= Query::affiche('projet',$_GET['id_projet'],'id');
                                     } 
                                    
                                   ?>
                                 

                                  <div class="space-4"></div>

                                  <div class="profile-contact-info">
                                    <div class="col-md-8">
                                      <h3 class="widget-title blue large">
                                        <i class="ace-icon fa fa-photo"></i>
                                        Add a Picture
                                      </h3>
                                      <?php if(isset($_GET['id_projet'])): ?>
                                         <div class="well">
                                          <h4 class="green smaller lighter" style="font-weight: bold; line-height: 27px;"><?= $projet->titre; ?></h4>
                                        </div>
                                      <?php endif; ?>

                                     

                                      <form action="" method="POST" data-parsley-validate role="form">
                                        <div class="form-group">
                                        <div class="form-group">
                                          <h4 class="header smaller lighter blue">Title of Project</h4>
                                          <textarea name="nom" data-parsley-maxlength="200" class="form-control" maxlength="200" rows="3" id="form-field-8" placeholder="Title of picture" required=""><?php if(isset($_POST['nom'])){echo $_POST['nom'];} ?></textarea>
                                        </div>

                                        <div class="form-group">
                                          <h4 class="header smaller lighter blue">Choose the picture</h4>
                                          <input type="file" name="upload_image" id="upload_image" accept="image/png, image/jpeg, image/jpg"  required="" class="btn btn-info btn-round col-xs-12" />
                                        </div></hr>
                                        
                                          <br />
                                          <div id="uploaded_image" ></div></br></br></br>
                                      </div>
                                      <button type="submit" name="ajouter" class="btn btn-primary btn-round btn-block"> <i class="fa fa-plus"></i> Add Picture </button>
                                    </form>
                                  </div>

                                   <div class="col-xs-12 col-sm-4">
                                      <?php if (!empty($article->photo)): ?>
                                         <img src="../assets/gallery/<?= $article->photo ?>" class="col-xs-12">
                                      <?php endif; ?>
                                     

                                      <div class="profile-user-info profile-user-info-striped">

                                      <div class="profile-user-info profile-user-info-striped"></br>

                                        <div class="profile-info-row">
                                          <div class="profile-info-name"> Author </div>

                                          <div class="profile-info-value">
                                            <span class="editable" id="username"> </span>
                                          </div>
                                        </div>

                                        <div class="profile-info-row">
                                          <div class="profile-info-name"> Publish </div>

                                          <div class="profile-info-value">
                                            <span class="editable" id="username"></span>
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

                    </div><!-- /.widget-main -->
                  </div><!-- /.widget-body -->
                </div>

              </div><!-- /.col -->
            </div><!-- /.row -->

            <?php
              if (isset($_POST['ajouter'])) {

                if (isset($_GET['id_projet'])) {
                  $photo =new Photo($_POST['nom'],$_GET['id_projet'],$_SESSION['nom'].".png");
                  $photo->ajouter_photo();
                }else
                {
                  $photo =new Photo($_POST['nom'],0,$_SESSION['nom'].".png");
                  $photo->ajouter_photo();
                }

                 
              }
            ?>


        <div id="uploadimageModal" class="modal" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Upload & Crop Image</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <center>
                      <div class="col-xs-12 text-center">
                        <div id="image_demo" style="overflow: auto;"></div>
                      </div>
                    </center>
                      <br />
                      <br />
                      
                  </div>
                </div>
                  </div>
                  <div class="modal-footer">
                     <button class="btn btn-primary btn-round crop_image"> <i class="fa fa-crop"></i> Crop & Upload Image</button>
                    <button type="button" class="btn btn-danger btn-round" data-dismiss="modal"> <i class="fa fa-close"></i> Close</button>
                  </div>
              </div>
            </div>
        </div>
<!-- 
<script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script> -->

  <script src="../assets/js/ace-elements.min.js"></script>
    <script src="../assets/js/ace.min.js"></script>
<!--     <script src="../assets/librairie/parsley.min.js"></script> -->


  <script>  
    $(document).ready(function(){

      $image_crop = $('#image_demo').croppie({
        enableExif: true,
        viewport: {
          width:550,
          height:350,
          type:'square' //circle
        },
        boundary:{
          width:550,
          height:350
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
            url:"../php/upload/Gallery.php",
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




    <?php
    include("../includes/footer.php");
    ?>
      <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
      </a>
    </div><!-- /.main-container -->

    <!-- basic scripts -->

    <!--[if !IE]> -->

    
  </body>
</html>
