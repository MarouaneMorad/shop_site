<?php 
session_start();


if ($_SESSION['id_admin'] === 'responsable') {
   
    $_SESSION = array();
    session_destroy();
}

header("Location: login.php");
exit();

?>