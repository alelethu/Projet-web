<?php
session_start();
session_unset(); //supprime les variables
header("Location: accueil.php"); 
exit();
?>