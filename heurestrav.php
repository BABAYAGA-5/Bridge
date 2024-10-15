<?php
require 'connexion.php';
require "constants.php";
session_start();
$id=$_SESSION["id"];
$query = "SELECT heure_debut,heure_fin FROM etat WHERE id_emp=$id";
$result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Heures de travail</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
  body, html {
    height: 100%;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    padding-top: 56px;
  }

  .container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }

  table {
    width: 80%;
    border-collapse: collapse;
    margin-bottom: 20px;
    border: 2px solid #ddd;
    border-radius: 10px;
    overflow: hidden;
  }

  th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
  }

  th {
    background-color: #f2f2f2;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  tr:nth-child(odd) {
    background-color: #fff;
  }

  tr:hover {
    background-color: #ddd;
  }
</style>
</head>
<body style="background-image: url('vecteezy_minimalist-dark-gradient-wave-background-simple-design-for_7718309.jpg');">
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <a class="navbar-brand" href="index.php">PFA</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="salaire.php">Salaire</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="conge.php">Demande de congé</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="infos.php">Informations personnelles</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="hispoint.php">Historique de pointage</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="heurestrav.php"><b>Heures de travail</b></a>
      </li>
    </ul>
  </div>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Profil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Déconnexion</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
<?php
echo "
    <table>
    <thead>
    <tr>
        <th>Lundi</th>
        <th>Mardi</th>
        <th>Mecredi</th>
        <th>Jeudi</th>
        <th>Vendredi</th>
        <th>Samedi</th>
    </tr>
    </thead>
    <tbody>";
          $planning = mysqli_fetch_assoc($result);
          echo 
            "<tr>
            <td>" . $planning['heure_debut']." à ".$planning['heure_fin'] . "</td>
            <td>" . $planning['heure_debut']." à ".$planning['heure_fin'] . "</td>
            <td>" . $planning['heure_debut']." à ".$planning['heure_fin'] . "</td>
            <td>" . $planning['heure_debut']." à ".$planning['heure_fin'] . "</td>
            <td>" . $planning['heure_debut']." à ".$planning['heure_fin'] . "</td>
            <td>" . $planning['heure_debut']." à ".$planning['heure_fin'] . "</td>
            </tr>
          </tbody>
          </table>"
?>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
