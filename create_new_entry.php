<?php
header("Content-Type: text/html");
session_start();
require("./pageconfig.php");
require("./header.php"); // summon the header ( navigation )
require("./connect.php"); // connect to the database

?>

<div id='content'>

<div id='center'>
<div id='mainsection0'>
<?php
echo "<div id='blackDiv0'>";
echo "<h1>Create new address entry</h1>";
?>

<table>
<form action='./add_new_entry.php' method='post' enctype='multipart/form-data'>

<tr>
<td><label>First name</label></td>
<td><input type='text' name='user_firstname' spellcheck='off' autocomplete='false' /></td>
</tr>

<tr>
<td><label>Last name</label></td>
<td><input type='text' name='user_lastname' spellcheck='off' autocomplete='false' /></td>
</tr>

<tr>
<td><label>Cell number</label></td>
<td><input type='text' name='user_cell' spellcheck='off' autocomplete='false' /></td>
</tr>

<tr>
<td><label>E-mail</label></td>
<td><input type='text' name='user_email' spellcheck='off' autocomplete='false' /></td>
</tr>


<tr>
<td><label>Address</label></td>
<td><textarea name='user_address'></textarea></td>
</tr>



<tr>
<td><label>Image</label></td>
<td><input type='file' name='image' />
</td>
</tr>

<tr>
<td></td>
<td><input type='submit' value='Add New Address' name='submit' />
</td>
</tr>


</form>
</table>


<?php

echo "</div>";
?>

</div>
<div id='subsection0'>
This page is the creation form, allowing the user to add a new address entry
</div><!-- right pillar END -->



</div><!-- central holder END -->

<?php
require("./endpage.php");
?>