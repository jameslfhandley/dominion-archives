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

<h3>Log in</h3>
<form action='./login.php' method='post' class='inputForm2' >
<table>


<tr>
<td><label>USER</label></td>
<td>
<input type='text' name='username' spellcheck='false' autocomplete='off' class='inputText2' />
</td>
</tr>

<tr>
<td><label>PASSWORD</label></td>
<td>
<input type='text' name='usercode' spellcheck='false' autocomplete='off' class='inputText2' />
</td>

</tr>

<tr>
<td></td>
<td>
<input type='submit' name='submit' value='Log in' class='inputButton2' />
</td>
</tr>

</table>
</form>


<hr />




</div> <!-- END of MAIN section Division -->

<div id='subsection0'>
<p>
Login with these details:<br />
User : test@mail.com<br />
Password : origin123<br />
<br />
User : towens@mail.com<br />
Password : test123<br />
</p>

</div> <!-- end of sub section division -->

</div> <!-- end of the CENTRAL center division -->



<?php
require("./endpage.php");
?>
