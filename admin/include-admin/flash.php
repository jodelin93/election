<?php

if (isset($_SESSION['notification']['message'])): ?>
<div class="col-md-12">
	<div class="alert alert-<?= $_SESSION['notification']['type'] ?>">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>

		<strong>
			<h4 style="font-weight: bold;line-height: 25px;"><?= $_SESSION['notification']['message']; ?></h4>
		</strong>
	</div>
</div>


<?php $_SESSION['notification']=[]; ?>


<?php endif;
