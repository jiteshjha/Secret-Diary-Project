<?php
// In this file, sets us up so that when we update the diary in mainpage.php, it will automatically update the database and then we can use that to display the updated user input without having to refresh the page	
session_start();

include("connection.php");

$query = "UPDATE users SET diary ='".mysqli_real_escape_string($link, $_POST['diary'])."' WHERE id='".$_SESSION['id']."' LIMIT 1";

mysqli_query($link, $query);

?>

