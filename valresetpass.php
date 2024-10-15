<?php
require "connexion.php";
require "fonctions.php";
require "constants.php";
session_start();
$id=$_SESSION["id"];
$pass=$_POST["pass"];
$confirm=$_POST["confirm"];
$sql="update employe set mdp=$pass where id_emp=$id";
if($pass!=$confirm)
{
    echo"<script>alert('Le contenu des deux champs n'est pas identique!')</script>";
    sleep(0.1);
    echo "<script>window.location.href='http://localhost/pfa/resetpass.php';</script>";
    die();
}
if(!$con->query($sql))
{
    echo"<script>alert('Error while updating password')</script>";
    sleep(0.1);
    echo "<script>window.location.href='http://localhost/pfa/resetpass.php';</script>";
    die();
}
else 
{
    echo"<script>alert('Password updated')</script>";
    sleep(0.1);
    echo "<script>window.location.href='http://localhost/pfa/login.php';</script>";
    die();

}
?>