<?php
setcookie("username", "", time() - 60 * 60 * 24 * 7, "/");
setcookie("password", "", time() - 60 * 60 * 24 * 7, "/");
session_start();
session_destroy();
header("location:../admin/index.php");
?>