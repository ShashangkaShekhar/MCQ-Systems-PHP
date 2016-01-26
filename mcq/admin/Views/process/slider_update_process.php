<?php
$id = $_GET["id"];
$query = "SELECT * FROM tbl_slider WHERE slider_id = $id";
$result= $dbObj->doQuery($query);
$row = $dbObj->fetchObject($result);

if( isset($_POST['sub']))
{
	if(!empty($_FILES["file"]["name"]))
	{
		$image_path = $_FILES["file"]["name"];
		$old_image =$_POST["old_image"];
		/*$name = $old_image;*/
		if(!empty($image_path))
		{
			$path = "../sliderengine/images/$old_image";
			unlink($path);
			$target_path = "../sliderengine/images/";
			/*$name = rand(5,5468).basename( $_FILES['file']['name']);*/
			$target_path = $target_path .$image_path;
			move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
		}		
		$query = "UPDATE tbl_slider SET image_path ='$image_path' WHERE slider_id = $id";		
		$dbObj->doQuery($query);
    }
	echo ("<script>window.location='index.php?route=slider&option=list';</script>");
}
?>