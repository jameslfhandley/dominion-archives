<?php
header("Content-Type: text/html");
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
exit();
}



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


require("./pageconfig.php");
require("./header.php");
require("./connect.php");

$profile_query0 = "SELECT * FROM address_list WHERE subject_id = ".$id." LIMIT 1;";
$user_output0 = mysqli_query($connect0,$profile_query0);
$user_array0 = mysqli_fetch_assoc($user_output0);



$user_name = ucfirst(strtolower($user_array0['subject_firstname']))." ".ucfirst(strtolower($user_array0['subject_lastname']));

?>

<div id='content'>

<div id='center'>

<div id='mainsection0'>
<?php

echo "<div id='blackDiv0'>";
echo "<h1>Address Profile</h1>";


echo "<p>";
echo "Full name : ".$user_name."<br />";
echo "<b>E mail</b> : ".$user_array0['subject_email'];
echo "<b>Cellphone</b> : ".$user_array0['subject_cellphone']."<br />";
echo "</p>";
echo "<p>";
echo "Address:<br />";
echo nl2br($user_array0['subject_address']);
echo "</p>";

echo "<p>";
echo "<img src='./galleryimg.php?id=".$id."&method=2' />";
echo "</p>";
echo "</div>"; // end of Black division 0



?>






<?php
echo "<div id='blackDiv1'>";

echo "<h2>Settings</h2>";
echo "<p>";
echo "<a href='./update_entry.php?id=".$id."'>Update entry</a><br />";
echo "<a href='./delete_entry.php?id=".$id."'>Delete entry</a>";
echo "</p>";

echo "<hr />";

echo "</div>"; // END of the : black div 1

?>


</div>
<div id='subsection0'>

</div><!-- right pillar END -->



</div><!-- central holder END -->


<?php
mysqli_close($connect0);
require("./endpage.php");
?>