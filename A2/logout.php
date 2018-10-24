<?php

//le quitamos tiempo de vida a las galletas
setcookie("type", "", time()-100000);
setcookie("type2", "", time()-100000);
session_destroy();
header("location:login.php");

?>
