<?php
require "connexion.php";
require "constants.php";
session_start();
session_unset();
session_destroy();
mysqli_close($con);
echo "<script>window.location.href='http://localhost/pfa/home.php';</script>";
die();
?>