<?php
session_start();
if ( isset( $_SESSION['user_id']) == TRUE)
	{

if ( is_numeric($_SESSION['user_id']) == TRUE )
   {
$current_id = $_SESSION['user_id'];
	}
else
	{
header("Location:./index.php?error=1");
exit();
	}

}
else
{
header("Location:./index.php?error=1");
}


require("./connect.php");

$entry_id = rand(100000,999999);

$ADD_IMG_WIDTH0 = 350;
$ADD_IMG_HEIGHT0 = 420;

function createImage0($uploadedfile,$ADD_IMG_WIDTH0,$ADD_IMG_HEIGHT0)
   {
list($width,$height)=getimagesize($uploadedfile);
$src = imagecreatefromjpeg($uploadedfile);
//global $ADD_IMG_WIDTH0;
//global $ADD_IMG_HEIGHT0;

if( ($width > $ADD_IMG_WIDTH0 ) || ($height > $ADD_IMG_HEIGHT0) )
{
if( ($width > $ADD_IMG_WIDTH0 ) && ($height <= $ADD_IMG_HEIGHT0) )
		{
$newwidth = $ADD_IMG_WIDTH0;
$newheight=($height/$width) * $newwidth;
		}
else if( ($width <= $ADD_IMG_WIDTH0 ) && ($height > $ADD_IMG_HEIGHT0) )
		{
$newheight = $ADD_IMG_HEIGHT0;
$newwidth=($width/$height)*$newheight;

		}
else if( ($width > $ADD_IMG_WIDTH0 ) && ($height > $ADD_IMG_HEIGHT0) )
	{
if($width > $height)
      {
$newwidth = $ADD_IMG_WIDTH0;
$newheight=($height/$width) * $newwidth;
      }
else if($height >= $width)
		{
/*
$newheight = $ADD_IMG_HEIGHT0;
$newwidth=($width/$height)*$newheight;
*/
$newwidth = $ADD_IMG_WIDTH0;
$newheight=($height/$width) * $newwidth;
		}
	}
$generate_random_name = "u".rand(100000,999999);
$tmp=imagecreatetruecolor($newwidth,$newheight);
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
imagejpeg($tmp, "./".$generate_random_name.".jpg",100);
$instr = fopen("./".$generate_random_name.".jpg","r");
$image = fread($instr,filesize("./".$generate_random_name.".jpg"));
$image = addslashes($image);
imagedestroy($tmp);
imagedestroy($src);
fclose($instr);
unlink("./".$generate_random_name.".jpg");
}
else
{
$instr = fopen($uploadedfile,"r");
$image = fread($instr,filesize($uploadedfile));
$image = addslashes($image);
fclose($instr);
}
return $image;
}


// Image section
if( (isset($_FILES['image']) == TRUE ) && ( !($_FILES['image']['name'] == "") ) )
   {
$image2 = createImage0($_FILES['image']['tmp_name'],350,420);
$image = createImage0($_FILES['image']['tmp_name'],180,200);
   }
else
{
$instr = fopen("./data/images0/thumb-none.jpg","r");
$image = fread($instr,filesize("./data/images0/thumb-none.jpg"));
$image = addslashes($image);
fclose($instr);

$instr2 = fopen("./data/images0/profile-none.jpg","r");
$image2 = fread($instr2,filesize("./data/images0/profile-none.jpg"));
$image2 = addslashes($image2);
fclose($instr2);
}




$user_firstname = $_POST['user_firstname'];
$user_lastname = $_POST['user_lastname'];
$user_email = $_POST['user_email'];
$user_cell = $_POST['user_cell'];
$user_address = $_POST['user_address'];


$user_id = rand(100000,999999);

$sql_insert =  "INSERT INTO address_list(subject_id,subject_firstname,subject_lastname,subject_email,subject_address,subject_cellphone,subject_image,subject_thumb,subject_user_key)".
								                        " VALUES(".$user_id.",'".$user_firstname."','".$user_lastname."','".$user_email."','".$user_address."','".$user_cell."','".$image."','".$image2."',".$current_id.");";

mysqli_query($connect0,$sql_insert);
//echo $connect0->error;

mysqli_close($connect0);

header("Location:./view_list.php");
exit();

?>