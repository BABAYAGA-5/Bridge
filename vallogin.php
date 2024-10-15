<?php
require "fonctions.php";
require "connexion.php";
require "constants.php";
$login=$_POST["login"];
$pass=$_POST["pass"];
$hash_pass=md5($pass);
$login_check="select id_emp ,mdp from employe where id_emp='".$login."'";
$result=$con->query($login_check);
$row=$result->fetch_assoc();
if($result->num_rows==0)
{   
    echo "<script>swal('Login ou mot de passe invalide!')</script>";
    sleep(0.1);
    echo "<script>window.location.href='http://localhost/pfa/login.php';</script>";
    die();
}
else if($row["mdp"]==$hash_pass)
{
    session_start();
    $_SESSION["id"]=$login;
    echo "<script>window.location.href='http://localhost/pfa/index.php';</script>";
    die();
}
else 
{
    echo"<script>alert('Login ou mot de passe invalide!')</script>";
    sleep(0.1);
    echo "<script>window.location.href='http://localhost/pfa/login.php';</script>";
    die();
}
?>