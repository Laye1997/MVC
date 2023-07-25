<?php
	session_start();

    //déconnexion
	session_destroy();
 
    header('location: vue/index.php');
?>