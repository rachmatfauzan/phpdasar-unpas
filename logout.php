<?php  

session_start();
$_SESSION = []; // timpa array session
session_destroy();
session_unset();

header("location: login.php");
exit;

?>