<?php
require 'connexion.php';
require "fonctions.php";
require "constants.php";
session_start();
$id=$_SESSION["id"];
$idm=$_GET["idm"];
$salary=isset($_POST["salary"]) ? $_POST["salary"]:'';
$tax=isset($_POST["tax"]) ? $_POST["tax"]:'';
$conge=isset($_POST["conge"]) ? $_POST["conge"]:'';
$congeres=isset($_POST["congeres"]) ? $_POST["congeres"]:'';
$nidm=isset($_POST["nidm"]) ? $_POST["nidm"]:'';
$nom=isset($_POST["nom"]) ? $_POST["nom"]:'';
$prenom=isset($_POST["prenom"]) ? $_POST["prenom"]:'';
$email=isset($_POST["email"]) ? $_POST["email"]:'';
$ecivil=isset($_POST["ecivil"]) ? $_POST["ecivil"]:'';
if(!empty($salary))
{
    $sql1="update etat set salaire_brut=$salary,taux_horaire=$salary/160 where id_emp=$idm";
}
if(!empty($tax))
{  
    if($tax>35)
    {
        echo"<script>alert('Les cotisations sociales ne peuvent pas dépasser 35%')</script>";
        sleep(0.1);
        echo "<script>window.location.href='http://localhost/pfa/modifyinfos.php?idm=$idm';</script>";
        die();
    }
    else
    {
        $sql2="update etat set cotisations_sociales=$tax/100 where id_emp=$idm";
    }
}
if(!empty($conge))
{
    $sql3="update etat set jours_conge=$conge where id_emp=$idm";
}
if(!empty($congeres))
{
    $sql4="update etat set jours_conge_restants=$congeres where id_emp=$idm";
}
if(!empty($nidm))
{
    $sql51="update employe set id_emp=$nidm where id_emp=$idm";
    $sql52="update etat set id_emp=$nidm where id_emp=$idm";
    $sql53="update conge set emp_id=$nidm where emp_id=$idm";
    $sql54="update pointage set emp_id=$nidm where emp_id=$idm";
    $sql55="update salaire set id_emp=$nidm where id_emp=$idm";
    $sql56="update sanctions set id_emp=$nidm where id_emp=$idm;";
}
if(!empty($nom))
{
    $sql6="update employe set nom='$nom' where id_emp=$idm";
}
if(!empty($prenom))
{
    $sql7="update employe set prenom='$prenom' where id_emp=$idm";
}
if(!empty($email))
{
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        echo"<script>alert('Veuillez saisir un E-mail valide!')</script>";
        sleep(0.1);
        echo "<script>window.location.href='http://localhost/pfa/AddEmp.php';</script>";
        die();
    }
    $sql8="update employe set email='$email' where id_emp=$idm";
}
if(!empty($ecivil))
{
    $sql9="update employe set etat_civil='$ecivil' where id_emp=$idm";
}
if(!empty($sql1))
{
    $con->query($sql1);
}
if(!empty($sql2))
{
    $con->query($sql2);
}
if(!empty($sql3))
{
    $con->query($sql3);
}
if(!empty($sql4))
{
    $con->query($sql4);
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
    mail($old_email,"Changement d'E-mail","Votre adresse E-mail a été changée vers l'adresse suivante: $email");
}
if(!empty($sql9))
{
    $con->query($sql9);
}
if(!empty($nidm))
{
    if(!empty($old_email))
    {
        mail($old_email,"Changement d'identifiant","Votre identifiant a été changé.\nvotre nouvel identifiant : $nidm");
    }
    if(!empty($email))
    {
        mail($email,"Changement d'identifiant","Votre identifiant a été changé.\nvotre nouvel identifiant : $nidm");  
    }
    $con->query($sql51);
    $con->query($sql52);
    $con->query($sql53);
    $con->query($sql54);
    $con->query($sql55);
    $con->query($sql56);
    $idm=$nidm;
}
echo"<script>alert('Modifications appliquées')</script>";
sleep(0.1);
echo "<script>window.location.href='http://localhost/pfa/modifyinfos.php?idm=$idm';</script>";
die();
?>