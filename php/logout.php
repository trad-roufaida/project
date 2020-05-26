<?php

  session_start();
/*unset($_SESSION["e_mail"]);
unset($_SESSION["mot_de_passe"]);*/
session_destroy();
header("Location:../index.php");


?>