<?php
require 'connexion.php';
require "constants.php";
session_start();
$id=$_SESSION["id"];
$sql="SELECT admin FROM employe WHERE id_emp=$id";
$result=$con->query($sql);
$row=$result->fetch_assoc();
$admin=$row["admin"];
$query = "SELECT date_debut,date_fin FROM pointage WHERE emp_id=$id";
$result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation du mot de passe</title>
    
    <style>
        .content
        {
            position: fixed;
            top: 50%;
            left: 0; 
            transform: translateY(-50%);
        }
        .navbar-nav .dropdown-menu
        {
            left: auto;
            right: 0;
            transform: translateX(0px);
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body style="background-image: url('Green Simple Minimalist Online Workshop Zoom Virtual Background.png');background-size:cover">
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand mx-auto" href="index.php">
        <img src="logo.jpg" alt="Logo" style="height: 40px; margin-right: 10px;">
          Bridge
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarSupportedContent">
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
    if($admin=="oui")
    {
      echo "<a class='nav-link' href='allemp.php'>Employés</a>";
    }
  ?>
        </li>
    </ul>
    </div>
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
    <div class="container col-12 d-flex justify-content-center min-vh-100 align-items-center" style="width: 100px;">
    <div class="container col-12 d-flex justify-content-center min-vh-100 align-items-center" style="width: 100px;">
            <?php
                echo "<form action='http://localhost/pfa/valresetpass.php' method='post'>";
            ?>
                <div class="container col-12 justify-content-center align-items-center" style="width: 300px;">
                    <div class="mb-3"></div>
                    <div class="d-flex justify-content-around">
                        <input type="password" class="form-control" placeholder="Nouveau mot de passe" name="pass" require>
                    </div>
                    <div class="mb-3"></div>
                    <div class="d-flex justify-content-around">
                        <input type="password" class="form-control" placeholder="Confirmer le mot de passe" name="confirm"require>
                    </div>
                    <div class="row">
                        <div class="mb-1"></div>
                    </div>
                    <div class="mb-3"></div>
                </div>
                <div class="mb-3"></div>
                <div align="center">
                    <button type="submit" class="btn btn-outline-light">Confirmer</button>
                </div>
            </form>     
        </div>  
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>