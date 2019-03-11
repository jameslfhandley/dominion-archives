<?php
header("Content-Type: image/jpeg");


if( isset($_GET['id']) == TRUE )
{

if(is_numeric($_GET['id']) == FALSE)
{
exit();
}
else
{
$id = $_GET['id'];
}

}
else
{
exit();
}


if( isset($_GET['method']) == TRUE )
{

if(is_numeric($_GET['method']) == FALSE)
{
exit();
}
else
{
$method = $_GET['method'];
}

}
else
{
exit();
}

require("./connect.php");

if($method == 2)
{
$sql = "SELECT subject_thumb FROM address_list WHERE subject_id = ".$id." LIMIT 1;";
$result = mysqli_query($connect0,$sql);

$array = mysqli_fetch_assoc($result);
echo $array['subject_thumb'];
exit();
}
else if($method == 1)
{
$sql = "SELECT subject_image FROM address_list WHERE subject_id = ".$id." LIMIT 1;";
$result = mysqli_query($connect0,$sql);

$array = mysqli_fetch_assoc($result);
echo $array['subject_image'];
exit();
}
?>