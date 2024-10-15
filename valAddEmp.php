<?php
require "fonctions.php";
require "connexion.php";
require "constants.php";
session_start();
$id=$_SESSION["id"];
$prenom=$_POST["prenom"];
$nom=$_POST["nom"];
$sexe=$_POST["sexe"];
$email=$_POST["email"];
$fday=$_POST["fday"];
$ecivil=$_POST["ecivil"];
if(!filter_var($email,FILTER_VALIDATE_EMAIL))
{
    echo"<script>alert('Veuillez saisir un E-mail valide!')</script>";
    sleep(0.1);
    echo "<script>window.location.href='http://localhost/pfa/AddEmp.php';</script>";
    die();
}
$mdp=randomPassword();
$mdpc=md5($mdp);
$check="select email,id_emp from employe where email='$email'";
$sql="insert INTO employe(nom, prenom, sexe, date_embauche, email, etat_civil ,mdp) VALUES ('".$nom."','".$prenom."','".$sexe."','".$fday."','".$email."','".$ecivil."','".$mdpc."')";
$result=$con->query($check);
if($result->num_rows>0)
{
    echo"<script>alert('Veuillez saisir un E-mail valide')</script>";
    sleep(0.1);
    echo "<script>window.location.href='http://localhost/pfa/AddEmp.php';</script>";
    die();
}
if ($con->query($sql))
{
    echo"<script>alert('Employé ajouté')</script>";
}
else
{
    echo"<script>alert('Employé non ajouté')</script>";
}
$result=$con->query($check);
$row=$result->fetch_assoc();
$id=$row["id_emp"];
$msg="Cher/Chère ".$prenom." ".$nom.",
Vous trouverez ci-dessous les informations de connexion à notre compte professionnel:
Utilisateur : ".$id."
Mot de passe : ".$mdp."
il est recommandé de changer ce mot de passe dès votre première connexion pour des raisons de sécurité. Assurez-vous de choisir un mot de passe robuste\n et unique pour garantir la sécurité de notre compte.Cordialement";
try
{
    mail($email,"Votre mot de passe pour accès à votre compte",$msg);
} 
catch (Exception $e) 
{
    print($e->getMessage());
    echo"<script>alert('Mailing error')</script>";
    sleep(0.1);
    echo "<script>window.location.href='http://localhost/pfa/AddEmp.php';</script>";
    die();
}
sleep(0.1);
echo "<script>window.location.href='http://localhost/pfa/AddEmp.php';</script>";
die();
?>