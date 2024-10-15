<?php
require 'connexion.php';
require "constants.php";
session_start();
$id=$_SESSION["id"];
$sql="SELECT admin FROM employe WHERE id_emp=$id";
$result=$con->query($sql);
$row=$result->fetch_assoc();
$admin=$row["admin"];
$sql="SELECT id_sanction,date,tranche FROM sanctions WHERE id_emp=$id order by date desc";
$result=$con->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sanctions</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
  body, html 
  {
    height: 100%;
    margin: 0;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    padding-top: 56px;
  }

  .container 
  {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
  }

  .square-box 
  {
    width: 300px;
    height: 50px;
    background-color: #fff;
    margin: 10px;
    text-align: center;
    line-height: 200px;
    font-size: 20px; 
    border-radius: 10px; 
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
    overflow: hidden;
  }
  .square-box a
  {
    display: block;
    width: 100%;
    height: 100%;
    text-decoration: none;
    color: inherit;
    overflow: hidden; 
    white-space: nowrap;
    text-overflow: ellipsis; 
  }
  table 
  {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    border: 2px solid #ddd;
    border-radius: 10px;
    overflow: hidden;
  }

  th, td
  {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
  }

  th
  {
    background-color: #f2f2f2;
  }

  tr:nth-child(even)
  {
    background-color: #f2f2f2;
  }

  tr:nth-child(odd)
  {
    background-color: #fff;
  }

  tr:hover
  {
    background-color: #ddd;
  }
  .navbar-nav .dropdown-menu
  {
    left: auto;
    right: 0;
    transform: translateX(0px);
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
        <a class="nav-link" href="salaire.php"><b>Salaire</b></a>
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
          Profil
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
<div class="container-fluid" style="width: 700px;">
<?php
    echo "
    <div class='mb-3'></div>
    <table>
    <thead>
    <tr>
        <th>Identifiant</th>
        <th>Date</th>
        <th>Tranche</th>
    </tr>
    </thead>
    <tbody>";
        if(mysqli_num_rows($result)==0)
        {
          echo "
            <tr>
              <td colspan='3' style='text-align: center;'>Aucune donnée</td>
            </tr>";
        }
        else
        {
          while($sanctions=$result->fetch_assoc())
          {
            echo 
            "<tr>
            <td>" . $sanctions['id_sanction'] . "</td>
            <td>" . $sanctions['date'] . "</td>
            <td>" . $sanctions['tranche'] . "</td>
            </tr>
            ";
          }
          echo "
          </tbody>
          </table>";
        }
  ?>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
