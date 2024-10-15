<?php
require 'connexion.php';
require "fonctions.php";
require "constants.php";
session_start();
$id=$_SESSION["id"];
$nom=isset($_POST["nom"]) ? $_POST["nom"]:'';
$prenom=isset($_POST["prenom"]) ? $_POST["prenom"]:'';
$email=isset($_POST["email"]) ? $_POST["email"]:'';
$ecivil=isset($_POST["ecivil"]) ? $_POST["ecivil"]:'';
if(!empty($nom))
{
    $sql6="update employe set nom='$nom' where id_emp=$id";
}
if(!empty($prenom))
{
    $sql7="update employe set prenom='$prenom' where id_emp=$id";
}
if(!empty($email))
{
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        echo"<script>alert('Veuillez saisir un E-mail valide!')</script>";
        sleep(0.1);
        echo "<script>window.location.href='http://localhost/pfa/profile.php';</script>";
        die();
    }
    $sql8="update employe set email='$email' where id_emp=$id";
}
if(!empty($ecivil))
{
    $sql9="update employe set etat_civil='$ecivil' where id_emp=$id";
}
if(!empty($sql6))
{
    $con->query($sql6);
}
if(!empty($sql7))
{
    $con->query($sql7);
}
if(!empty($sql8))
{
    $sql="select email from employe where id_emp=$idm";
    $result=$con->query($sql);
    $row=$result->fetch_assoc();
    $old_email=$row["email"];
    $con->query($sql8);
    mail($old_email,"Changement d'E-mail","Vous avez changé votre adresse E-mail vers l'adresse suivante: $email");
    $con->query($sql8);
}
if(!empty($sql9))
{
    $con->query($sql9);
}
echo"<script>alert('Modifications appliquées')</script>";
sleep(0.1);
echo "<script>window.location.href='http://localhost/pfa/profile.php';</script>";
die();
?>