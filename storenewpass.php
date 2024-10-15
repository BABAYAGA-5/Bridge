<?php
require "fonctions.php";
require "connexion.php";
require "constants.php";
$token=$_GET["token"];
$token_hash=md5($token);
$sql="select token,token_validity from employe where token='$token_hash'";
$result=$con->query($sql);
if($result->num_rows==0)
{
    echo"<script>alert('Non existant token!')</script>";
    sleep(0.1);
    echo "<script>window.location.href='login.php';</script>";
    die();
}
$row=$result->fetch_assoc();
if($row["token"]!=$token_hash)
{
    echo"<script>alert('Token invalid!')</script>";
    sleep(0.1);
    echo "<script>window.location.href='login.php';</script>";
    die();
}
else if($row["token_validity"]<date("Y-m-d H:i:s", time()))
{
    echo"<script>alert('Token invalid!')</script>";
    sleep(0.1);
    echo "<script>window.location.href='http://localhost/pfa/login.php';</script>";
    die();
}
else
{
    $pass=$_POST["pass"];
    $confirm=$_POST["confirm"];
    if($pass!=$confirm)
    {
        echo"<script>alert('Le contenu des deux champs ne sont pas identique!')</script>";
        sleep(0.1);
        echo "<script>window.location.href='http://localhost/pfa/createnewpass.php?token=$token';</script>";
        die();
    }
    $pass_hash=md5($pass);
    $sql="update employe set mdp='$pass_hash' where token='$token_hash'";
    if(!$con->query($sql))
    {
        echo"<script>alert('Error while updating password')</script>";
        sleep(0.1);
        echo "<script>window.location.href='http://localhost/pfa/createnewpass.php?token=$token';</script>";
        die();
    }
    else 
    {
        $sql="update employe set token=Null where token='$token_hash'";
        $con->query($sql);
        echo"<script>alert('Password updated')</script>";
        sleep(0.1);
        echo "<script>window.location.href='http://localhost/pfa/login.php';</script>";
        die();

    }
}
?>