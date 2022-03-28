<?php

//upload.php


if(isset($_POST["image"]))
{
	session_start();
	require'../../php/Fonctions.php';

	$data = $_POST["image"];

	$image_array_1 = explode(";", $data);

	$image_array_2 = explode(",", $image_array_1[1]);
	$data = base64_decode($image_array_2[1]);

	$name=rand(0,1000)."-".rand(0,1000);;
	
	$_SESSION['nom']=$name;

	$imageName ="../../candidat/photo/".$name.'.png';
	$photo ="../candidat/photo/".$name.'.png';

	file_put_contents($imageName, $data);
	
	echo '<img src="'.$photo.'" class="img-thumbnail col-md-4 offset-2" />';


	Fonctions::set_flash('Photo successfully registered !','success');
}

?>

<a href="../candidat/?id=<?= $_SESSION['id']; ?>&change=<?= $name ?>">
  <button class="btn btn-primary btn-round btn-block" type="submit" name="modifier"> <i class="fa fa-save"></i> <b> Sauvegarder et terminer</b> </button>
</a>




