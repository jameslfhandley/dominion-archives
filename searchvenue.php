<?php
header("Content-type: text/xml");
require("./connect.php");

$query=trim($_POST['msg']);

$sql = "SELECT subject_firstname,subject_lastname,subject_id FROM address_list WHERE ( subject_firstname LIKE '%" . $query . "%' ) OR ( subject_lastname LIKE '%" . $query . "%' );";
//$sql = "SELECT user_firstname,user_lastname,user_id FROM userlist0;";

$result = mysqli_query($connect0,$sql);


// Argument OR paramter received from the CLIENT browser
// ( the HTML input field )
//if ( stristr( $array['user_firstname'],$query ) ||stristr( $array['user_lastname'],$query ) )
echo "<?xml version='1.0' ?>";
echo "<names>";
while ($array = mysqli_fetch_assoc($result) )
	{
      echo "<name>".ucfirst(strtolower( $array['subject_firstname'] ) ) . " " . ucfirst(strtolower( $array['subject_lastname'] ) ) . "</name>";
		echo "<userid>".$array['subject_id']."</userid>";
    }
echo "</names>";
?>
