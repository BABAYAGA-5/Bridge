<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .content
        {
            position: fixed;
            top: 50%;
            left: 0; 
            transform: translateY(-50%);
        }
        
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body style="background-image: url('Green Simple Minimalist Online Workshop Zoom Virtual Background.png');background-size:cover">
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <a class="navbar-brand" href="index.php">
  <img src="logo.jpg" alt="Logo" style="height: 40px; margin-right: 10px;">
    Bridge
  </a>
<div></div>
</nav>
        <div class="container col-12 d-flex justify-content-center min-vh-100 align-items-center" style="width: 100px;">
            <form action='http://localhost/pfa/vallogin.php' method='post'>
                <div class="container col-12 justify-content-center align-items-center" style="width: 370px;">
                    <div class="mb-3"></div>
                    <div class="d-flex justify-content-around">
                        <input type="text" class="form-control" placeholder="Login" name="login" require>
                    </div>
                    <div class="mb-3"></div>
                    <div class="d-flex justify-content-around">
                        <input type="password" class="form-control" placeholder="Mot de passe" name="pass"require>
                    </div>
                    <div class="row">
                        <div class="mb-1"></div>
                    <?php
                        require "fonctions.php";
                        echo "<div class='col-4'>
                                  <a class='h6' style='color: white;' href='http://localhost/pfa/AddEmp.php'>S'enregistrer</a>
                              </div>
                              <div class='col-8'>
                                  <a class='h6' style='color: white;' href='http://localhost/pfa/resetpassemail.php' >Login ou mot de passe oublié</a>
                              </div>";
                    ?>
                    </div>
                    <div class="mb-3"></div>
                </div>
                <div class="mb-3"></div>
                <div align="center">
                    <button type="submit" class="btn btn-outline-light">Se connecter</button>
                </div>
            </form>     
        </div>
    </body>
</html>