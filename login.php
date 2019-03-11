<?php

if ( isset($_POST['submit']) == TRUE)
	{

require("./connect.php");

$user = strtolower($_POST['username']);
$code = $_POST['usercode'];

$sql = "SELECT * FROM user_list WHERE user_email = '".$user."' AND user_password = '".$code."' LIMIT 1;";
$query = mysqli_query($connect0,$sql);

if ( mysqli_num_rows($query) == 1 )
	{
session_start();
$array = mysqli_fetch_assoc($query);
$_SESSION['user_id'] = $array['user_id'];
mysqli_close($connect0);
header("Location:./view_list.php?id=".$_SESSION['user_id']);
exit();
	}
else
{
mysqli_close($connect0);
header("Location:./user_login.php?error=1");
exit();
}



   }
else
{
header("Location:./index.php?error=1");
exit();
}


?>