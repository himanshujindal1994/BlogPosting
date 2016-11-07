<?php
require 'core.inc.php';
require 'connect.inc.php';

if(loggedin())
{
    header("Location: myprofile.php");
	//echo 'You are logged in. <a href="logout.php">Log Out</a>';
}
else{
include 'loginform.php';
}

?>