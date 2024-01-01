<?php 
session_start();


if ($_SESSION['user_id'] === 'utilisateur') {
   
    $_SESSION = array();
    session_destroy();
}

header("Location: login.php");
exit();

?>