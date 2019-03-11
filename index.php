<?php

header("Content-Type: text/html");

header('Cache-Control: no-cache, no-store, must-revalidate'); //HTTP/1.1
header('Expires: Sun, 01 Jul 2005 00:00:00 GMT');
header('Pragma: no-cache'); // HTTP 1.0
session_start();

require("./pageconfig.php");
require("./header.php"); // summon the header ( navigation )


?>

<div id='content'>

<div id='center'>



<div id='mainsection0'>

<h1>Training Exercise</h1>
<h2>Online Address Book</h2>

<h3>The Incentive</h3>
<p>A Training exercise done for an outcoming job opportunity. The user is asked to create an online address book.
</p>
<br />

<p>The viewer can log in with either of these accounts:</p>
<p>User : <font color='orange'>test@mail.com</font><br />Password : <font color='orange'>origin123</font><br /><br />
User : <font color='green'>towens@mail.com</font><br />Password : <font color='green'>test123</font>
<br />
<h3>Features</h3>
<ul><li>Multiple user accounts</li>
<li>Create new Address entry</li>
<li>List all existing entries</li>
<li>Update an address entry</li>
</ul>

</p>

</div> <!-- end of the main section division -->

<div id='subsection0'>
<p>
This is the home page covering key details about the demo site</p>

</div> <!-- end of the SUB SECTION 0 -->

</div> 



<?php
require("./endpage.php");
?>