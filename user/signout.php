<?php

session_start();
unset($_SESSION['admin_id']);

session_destroy();
header("refresh:1; url= ../home.php")

?>