<?php
header("Content-Type: text/html");
session_start();

require("./pageconfig.php");
require("./header.php"); // summon the header ( navigation )
require("./connect.php"); // connect to the database

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
$current_id = 0;
}

?>

<div id='content'>

<div id='center'>



<div id='mainsection0'>
<a name='intro'></a>
<h1>Address entry list</h1>

<?php

$entry_sub_sql = "SELECT * FROM address_list "
." WHERE ( subject_user_key = ".$current_id." ) ORDER BY address_list.subject_firstname;";
$entry_sub_result = mysqli_query($connect0,$entry_sub_sql);

if ( mysqli_num_rows($entry_sub_result) == 0 )
	{
echo "<p>No address entries in existence</p>";
	}
else
	{
echo "<table id='catTable0'>";
echo "<tr>";

echo "<td>";
echo "<font color='#33666e'>Thumb Image</font>";
echo "</td>";

echo "<td>";
echo "Entry Details";
echo "</td>";

echo "</tr>";
while ( $entry_sub_array = mysqli_fetch_assoc($entry_sub_result) )
{
echo "<tr>";


echo "<td>";

echo "<a href='./profile.php?id=".$entry_sub_array['subject_id']."'><img src='./galleryimg.php?method=1&id=".$entry_sub_array['subject_id']."' /></a>";


echo "</td>";

echo "<td>";
echo "<p>";

echo ucfirst(strtolower($entry_sub_array['subject_firstname']))." " . ucfirst(strtolower($entry_sub_array['subject_lastname'])). "<br />";
echo "Email : ".$entry_sub_array['subject_email']."<br />";
echo "Phone : ".$entry_sub_array['subject_cellphone']."<br />";
echo "Address :  <br />".nl2br($entry_sub_array['subject_address'])."<br />";
echo "</p>";
echo "</td>";


echo "</tr>";
}
echo "</table>";
	}



?>
<br />



<br />



</div> <!-- end of the main section division -->

<div id='subsection0'>

<h3>Find entry</h3>
<form action="./view_list.php#intro" method="post" class='inputForm0'>

<input type="text" name="search_input0" id='searchVenue0' class='inputText0' autocomplete='off' spellcheck='false' />
<br /><br />
<input type="submit" value="Search" name="submit_search0" class='inputButton0' />
<br /><br />
</form>
<?php

if ( isset($_POST['submit_search0']) == TRUE )
{
$search_criteria = $_POST['search_input0']; // Filter and re-format the entry here within the form
$search_sql = "SELECT subject_firstname,subject_lastname,subject_id FROM address_list WHERE subject_firstname LIKE '%".$search_criteria."%' OR subject_lastname LIKE '%".$search_criteria."%';";
// 
$search_query = mysqli_query($connect0,$search_sql);

if ( mysqli_num_rows($search_query) == 0 )
	{

echo "<div id='resultVenue0'>";
echo "<ul id='list'>";
echo "<li>No results</li>";
echo "</ul>";
echo "</div>";

	}
else
{
echo "<div id='resultVenue0'>";
echo "<ul id='list'>";

while ( $search_array = mysqli_fetch_assoc($search_query) )
{
echo "<li><a href='./profile.php?id=".$search_array['subject_id']."'>" . ucfirst(strtolower($search_array['subject_firstname']))." ".ucfirst(strtolower($search_array['subject_lastname']))."</a></li>";

}

echo "</ul>";
echo "</div>";


}

}
else
{
?>
<div id='resultVenue0'>
<ul id='list'>
</ul>
</div>
<?php
}
?>

<br />
<br />


<script type='text/javascript' src='searchvenue.js'>
</script>


</div>
</div>


<?php
require("./endpage.php");
?>
