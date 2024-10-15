<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PFA</title>
    
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
<body style="background-image: url('vecteezy_minimalist-dark-gradient-wave-background-simple-design-for_7718309.jpg');">
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand mx-auto" href="home.php">Bridge</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
            </li>
        </ul>
        </div>
    </div>
</nav>
    <div class="container col-12 d-flex justify-content-center min-vh-100 align-items-center" style="width: 100px;">
        <form action='http://localhost/pfa/valresetemail.php' method='post'>
            <div class="container col-12 justify-content-center align-items-center" style="width: 300px;">
                <div class="mb-3"></div>
                <div class="d-flex justify-content-around">
                    <input type="text" class="form-control" placeholder="E-mail" name="email" require>
                </div>
                <div class="mb-3"></div>
                <div class="mb-3"></div>
            <div align="center">
                <button type="submit" class="btn btn-outline-light">Confirmer</button>
            </div>
        </form>     
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>