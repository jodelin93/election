
<div id="<?= $compte->id;?>" class="modal fade" tabindex="-1" >
	<center>
	<div class="modal-dialog" style="max-width: 300px; margin-top:180px; ">
		<div class="modal-content">
			<form method="POST" action="">
			<div class="modal-body">
				<center>
					<h4 class="smaller lighter blue no-margin" style="color: #f03a00;"> <i class="glyphicon glyphicon-trash"></i> <b> Supprimer ce compte ?</b></h4>

				<input type="hidden" name="id" value="<?= $compte->id ?>">
				</center>
			</div>
			<div class="modal-footer">
				<button  class="btn btn-sm btn-danger btn-round pull-right" data-dismiss="modal">
					 Annuler
				</button>

				<button type="submit" name="supprimer" class="btn btn-sm btn-success btn-round pull-left">
				 <i class="glyphicon glyphicon-trash"></i>  Supprimer
				</button>
			</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
	</center>
</div>

	<?php
		//pour supprimer une photo
		if (isset($_POST['supprimer'])) {
			Query::supprimer('votant',$_POST['id']);
			Fonctions::set_flash("Suppression éffectuée avec succès!","success");
				header("Location:./");
		}
		
	?>