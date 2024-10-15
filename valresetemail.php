<?php
require "fonctions.php";
require "connexion.php";
require "constants.php";
$email = $_POST["email"];;
if ($email == "") {
    echo "<script>alert('Veuillez saisir un identifiant!')</script>";
    sleep(0.1);
    echo "<script>window.location.href='login.php';</script>";
    die();
}
$login_check = "select prenom,nom,email from employe where email='" . $email . "'";
$login_check_result = $con->query($login_check);
if ($login_check_result->num_rows==0)
{
    echo "<script>alert('E-mail introuvable!')</script>";
    sleep(0.1);
    echo "<script>window.location.href='http://localhost/pfa/resetpassemail.php';</script>";
    die();
}
$row=$login_check_result->fetch_assoc();
$prenom=$row["prenom"];
$nom=$row["nom"];
$token=bin2hex(random_bytes(16));
$token_hash=md5($token);
$token_validity=date("Y-m-d H:i:s", time() + 60 * 30);
$create_token="update employe set token='".$token_hash."',token_validity='".$token_validity."' where email='".$email."'";
if(!$con->query($create_token))
{
    echo "<script>alert('Token creation error!')</script>";
    sleep(0.1);
    echo "<script>window.location.href='http://localhost/pfa/resetpassemail.php';</script>";
    die();
}
try
{
    mail($email, "Réinitialisation du mot de passe", "Cher/Chère ".$prenom." ".$nom.",
    Clicker sur le lien ci-dessous pour réinitialiser votre mot de passe de connexion à votre compte professionnel:

    http://localhost/pfa/createnewpass.php?token=$token

    Si vous n'avez pas envoyé une demande de réinitialisation de mot de passe vous pouvez ignorer cet e-mail!");
    echo "<script>alert('E-mail envoyé!')</script>";
    sleep(0.1);
    echo "<script>window.location.href='http://localhost/pfa/login.php';</script>";
    die();
} 
catch (Exception $e) 
{
    print($e->getMessage());
}
