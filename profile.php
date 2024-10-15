<?php
require 'connexion.php';
require "constants.php";
session_start();
$id=$_SESSION["id"];
$sql = "SELECT admin FROM employe WHERE id_emp=$id";
$result = $con->query($sql);
$row = $result->fetch_assoc();
$admin = $row["admin"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profil</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
  body, html {
    height: 100%;
    margin: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    padding-top: 56px;
  }

  .container {
    width: 80%;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  table {
    width: 100%;
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

  .navbar-nav .dropdown-menu {
    left: auto;
    right: 0;
    transform: translateX(0px);
  }

  .center-buttons td {
    text-align: center;
  }

  .transparent-background {
    background-color: transparent !important;
  }

  .no-border td {
    border: none !important;
  }
  .center-content {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
  }

  .center-content-horizontal {
      text-align: center;
      padding: 0px; 
  }
</style>
</head>
<body style="background-image: url('Green Simple Minimalist Online Workshop Zoom Virtual Background.png');background-size:cover">
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <a class="navbar-brand" href="index.php">
  <img src="logo.jpg" alt="Logo" style="height: 40px; margin-right: 10px;">
    Bridge
  </a>
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
        <a class="nav-link" href="hispoint.php">Historique de pointage</a>
      </li>
      <li class="nav-item">
      <?php 
        if($admin=="oui") {
          echo "<a class='nav-link' href='allemp.php'>Employés</a>";
          echo "</li>";
          echo "<li class='nav-item'>";
          echo "<a class='nav-link' href='Addemp.php'>Ajout d'employés</a>";
        }
        ?>
      </li>
    </ul>
  </div>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <b>Profil</b>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="profile.php">View Profile</a>
          <a class="dropdown-item" href="resetpass.php">Changer le mot de passe</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Déconnexion</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<div class="container center-content center-content-horizontal">
  <div>
    <?php
    echo "
    <table style='width: 950px;'>
    <thead>
    <tr>
        <th colspan='6' style='text-align:center;'><b>Heures de travail</b></th>
    </tr>
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
        $query = "SELECT heure_debut,heure_fin FROM etat WHERE id_emp=$id";
        $result = mysqli_query($con, $query);
        $planning = $result->fetch_assoc();
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
    </table>";
    ?>
  </div>
  <div>
    <?php
    echo "
    <table>
    <thead>
    <tr>
        <th colspan='7' style='text-align:center'><b>Informations personnelles</b></th>
    </tr>
    <tr>
        <th>Identifiant</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>E-mail</th>
        <th>sexe</th>
        <th>État civil</th>
        <th>Date d'embauche</th>
    </tr>
    </thead>
    <tbody>";
        $query = "SELECT * FROM employe WHERE id_emp=$id";
        $result = mysqli_query($con, $query);
        $employe = $result->fetch_assoc();
        echo 
          "<tr>
            <td>" . $employe['id_emp'] . "</td>
            <td>" . $employe['nom'] . "</td>
            <td>" . $employe['prenom'] . "</td>
            <td>" . $employe['email'] . "</td>
            <td>" . $employe['sexe'] . "</td>
            <td>" . $employe['etat_civil'] . "</td>
            <td>" . $employe['date_embauche'] . "</td>
          </tr>
          <form action='http://localhost/pfa/modify1.php' method='post'>
          <tr class='center-buttons transparent-background no-border'>
            <td></td>
            <td><input class='form-control' type='text' name='nom'></td>
            <td><input class='form-control' type='text' name='prenom'></td>
            <td><input class='form-control' type='text' name='email'></td>
            <td></td>
            <td>
              <select class='form-control' name='ecivil'>
              <option name='default' value=''>Selectionez un choix</option>
              <option name='celibataire'>Célibataire</option>
              <option name='marie'>Marié(e)</option>
              <option name='divorce'>Divorcé(e)</option>
              <option name='voeuf'>Voeuf(ve)</option></td>
            <td>
            </td>
          </tr>
          </tbody>
          </table>
          <div align='center'>
              <button type='submit' class='btn btn-outline-light'>Modifier</button>
          </div>
          <div class='mb-3'></div>
          </form>
    ";
    ?>
  </div>
  <div class="center-content-horizontal">
    <?php
    $query = "SELECT taux_horaire,cotisations_sociales,salaire_brut,jours_conge,jours_conge_restants FROM etat WHERE id_emp=$id";
    $result = $con->query($query);
    echo "
    <table style='width: 600px;'>
    <thead>
    <tr>
        <th colspan='6' style='text-align:center'><b>Informations supplémentaires</b></th>
    </tr>
    <tr>
        <th>Taux horaire</th>
        <th>Salaire Brut</th>
        <th>Salaire net</th>
        <th>Cotisations sociales</th>
        <th>Jours congé donnés</th>
        <th>Jours congé restants</th>
    </tr>
    </thead>
    <tbody>";
    while($etat=$result->fetch_assoc()) {
      echo 
      "<tr>
      <td>" . $etat['taux_horaire'] ."</td>
      <td>" . $etat['salaire_brut'] . "</td>
      <td>" . $etat['salaire_brut']*(1-$etat['cotisations_sociales']) . "</td>
      <td>" . $etat['cotisations_sociales'] . "</td>
      <td>" . $etat['jours_conge'] . "</td>
      <td>" . $etat['jours_conge_restants'] . "</td>
      </tr>";
    }
    echo "
    </tbody>
    </table>";
    ?>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
