<?php
require "connexion.php";
require "constants.php";
session_start();
$id=$_SESSION["id"];
$date_debut=$_POST["date_debut"];
$jours=$_POST["jours"];
$date_fin= date('Y-m-d', strtotime($date_debut . ' + ' . $jours . ' days'));
$date_debut = new DateTime($date_debut);
$date_act = new DateTime(date("y-m-d"));
if($date_debut<=$date_act)
{
    echo"<script>alert('Veuillez saisir une date valide!')</script>";
    sleep(0.1);
    echo "<script>window.location.href='http://localhost/pfa/conge.php';</script>";
    die();
}
else if($jours>20)
{
  echo"<script>alert('Vous ne pouvez pas dépasser 20 jours!')</script>";
  sleep(0.1);
  echo "<script>window.location.href='http://localhost/pfa/conge.php';</script>";
  die();
}
$sql="select jours_conge_restants from etat where id_emp=$id";
if(!$result=$con->query($sql))
{
  echo"<script>alert('Erreur interne!')</script>";
  sleep(0.1);
  echo "<script>window.location.href='http://localhost/pfa/conge.php';</script>";
  die();
}
$row=$result->fetch_assoc();
$jours_restants=$row["jours_conge_restants"];
if($jours_restants<$jours)
{
  echo"<script>alert('Vous n'avez pas assez de jours restants!')</script>";
  sleep(0.1);
  echo "<script>window.location.href='http://localhost/pfa/conge.php';</script>";
  die();
}
$date_debut=$date_debut->format('y-m-d');
$date_act=$date_act->format('y-m-d');
$sql="insert into conge values ($id,'$date_debut','$date_fin',$jours,'En attente')";
if(!$con->query($sql))
{
  echo"<script>alert('Erreur interne!')</script>";
  sleep(0.1);
  echo "<script>window.location.href='http://localhost/pfa/conge.php';</script>";
  die();
}
else
{
  echo"<script>alert('Demande enregistrée !')</script>";
  sleep(0.1);
  echo "<script>window.location.href='http://localhost/pfa/conge.php';</script>";
  die();
}
?>
