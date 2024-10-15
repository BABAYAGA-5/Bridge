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
<title>Ajout d'employé</title>
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
          echo "<a class='nav-link' href='Addemp.php'><b>Ajout d'employés</b></a>";
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
<div class="container col-12 d-flex justify-content-center min-vh-100 align-items-center text-white" style="width: 548px;">
    <div class="container col-12 d-flex justify-content-center align-items-center" style="width: 548px;">
        <form action="valAddEmp.php" method="post">
            <div class="mb-3"></div>
            <div class="row d-flex justify-content-left">
                <div class="col-sm-6">
                    <label for="prenom" class="form-label">Prénom:</label>
                    <input type="text" class="form-control" placeholder="Entrez le prénom" name="prenom" required>
                </div>
                <div class="col-sm-6">
                    <label for="nom" class="form-label">Nom:</label>
                    <input type="text" class="form-control" placeholder="Entrez le nom" name="nom" required>
                </div> 
            </div>
            <div class="mb-3"></div>
            <div>
                <label for="email" class="form-label">E-mail:</label>
                <input type="text" class="form-control col-lg" placeholder="Entrez l'E-mail" name="email" required>
            </div>
            <div class="mb-3"></div>
            <div class="mb-3"></div>
            <div class="row d-flex justify-content-left">
                <div class="col-sm-6">
                    <label for="fday" class="form-label">Date d'embauche:</label>
                    <input type="date" class="form-control" name="fday" required>
                </div>
                <div class="col-sm-6">
                    <label for="ecivil" class="form-label">État civil:</label>
                    <select class="form-control" name="ecivil" required>
                        <option name="default" value="">Selectionez un choix</option>
                        <option name="celibataire">Célibataire</option>
                        <option name="marie">Marié(e)</option>
                        <option name="divorce">Divorcé(e)</option>
                        <option name="voeuf">Voeuf(ve)</option>
                    </select>
                </div>
            </div>
            <div class="mb-3"></div>
            <div class="row">
                <div class="col-sm-6">
                    <label for="sexe" class="form-label">Sexe:</label>
                    <select class="form-control" name="sexe" required>
                        <option name="default">Selectionez un choix</option>
                        <option name="Male">M</option>
                        <option name="Female">F</option>
                    </select>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
            <div class="mb-4"></div>
            <div class="col" align="center">
                <button type="submit" class="btn btn-outline-light" style="border-radius: 10px;">Ajouter</button>
            </div>
            <div class="mb-4"></div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
