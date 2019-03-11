<?php
header("Content-Type: text/html");
session_start();
require("./pageconfig.php");
require("./connect.php"); // connect to the database

if ( isset($_GET['id']) == TRUE )
{

if ( is_numeric($_GET['id']) == TRUE )
   {
$id = $_GET['id'];
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
exit();
   }



$sql = "DELETE FROM address_list WHERE subject_id = ".$id." LIMIT 1;";
$result = mysqli_query($connect0,$sql);
$array = mysqli_fetch_assoc($result);

header("Location:./view_list.php");
exit();

?>