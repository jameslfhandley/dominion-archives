<p>
<a href='./index.php'>
Home
</a>
|

<?php
if ( isset($_SESSION['user_id']) == TRUE )
{
?>
<a href='./view_list.php?id=<?php echo $_SESSION['user_id'];?>'>
Address list
</a>
|

<a href='./create_new_entry.php?id=<?php echo $_SESSION['user_id'];?>'>
Create Address
</a>
|

<a href='./logout.php?id=<?php echo $_SESSION['user_id'];?>'>
Log out
</a>
|

<?php
}
else
{
?>
<a href='./user_login.php'>
User Login
</a>
|


<?php
}
?>
</p>

